<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    /**
     * Display course details.
     */
    public function show($id)
    {
        $course = Course::where('id', $id)
            ->where('status', 'active')
            ->firstOrFail();

        // Check if user is already registered
        $isRegistered = false;
        if (Auth::check()) {
            $isRegistered = CourseRegistration::where('user_id', Auth::id())
                ->where('course_id', $course->id)
                ->exists();
        }

        // Get related courses
        $relatedCourses = Course::where('category', $course->category)
            ->where('id', '!=', $course->id)
            ->where('status', 'active')
            ->limit(3)
            ->get();

        return view('frontend.course-detail', compact('course', 'isRegistered', 'relatedCourses'));
    }

    /**
     * Show course registration form.
     */
    public function register($id)
    {
        $course = Course::where('id', $id)
            ->where('status', 'active')
            ->firstOrFail();

        // Check if course has available spots
        if (!$course->hasAvailableSpots()) {
            return redirect()->route('course.show', $course->id)
                ->with('error', 'This course is fully booked.');
        }

        // Check if user is already registered
        if (Auth::check()) {
            $existingRegistration = CourseRegistration::where('user_id', Auth::id())
                ->where('course_id', $course->id)
                ->first();

            if ($existingRegistration) {
                return redirect()->route('course.show', $course->id)
                    ->with('info', 'You are already registered for this course.');
            }
        }

        return view('frontend.course-register', compact('course'));
    }

    /**
     * Process course registration.
     */
    public function processRegistration(Request $request, $id)
    {
        $course = Course::where('id', $id)
            ->where('status', 'active')
            ->firstOrFail();

        // Check if course has available spots
        if (!$course->hasAvailableSpots()) {
            return redirect()->route('course.show', $course->id)
                ->with('error', 'This course is fully booked.');
        }

        // Validate registration data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:male,female,other',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_relationship' => 'required|string|max:100',
            'emergency_contact_phone' => 'required|string|max:20',
            'special_requirements' => 'nullable|string|max:1000',
            'dietary_restrictions' => 'nullable|string|max:500',
            'accommodation_needed' => 'boolean',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = null;

        // Check if user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            
            // Check if already registered
            $existingRegistration = CourseRegistration::where('user_id', $user->id)
                ->where('course_id', $course->id)
                ->first();

            if ($existingRegistration) {
                return redirect()->route('course.show', $course->id)
                    ->with('info', 'You are already registered for this course.');
            }
        } else {
            // Check if user exists with this email
            $user = User::where('email', $validated['email'])->first();

            if (!$user) {
                // Create new user
                $validated['password'] = Hash::make($validated['password'] ?? 'password123');
                $validated['role'] = 'student';
                $user = User::create($validated);
            } else {
                // Update existing user with new information
                $user->update(array_except($validated, ['password', 'email']));
            }

            // Log in the user
            Auth::login($user);
        }

        // Calculate amount to pay
        $amountToPay = $course->getEffectivePriceAttribute();

        // Create registration
        $registration = CourseRegistration::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'amount_paid' => $amountToPay,
            'payment_method' => 'pending',
            'payment_status' => 'pending',
            'status' => 'pending',
            'special_requirements' => $validated['special_requirements'],
            'dietary_restrictions' => $validated['dietary_restrictions'],
            'accommodation_needed' => $request->has('accommodation_needed'),
            'registered_at' => now(),
        ]);

        // Redirect to payment page
        return redirect()->route('course.payment', $registration->id)
            ->with('success', 'Registration submitted successfully. Please complete the payment.');
    }

    /**
     * Show payment page.
     */
    public function payment($registrationId)
    {
        $registration = CourseRegistration::with(['course', 'user'])
            ->where('id', $registrationId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // If already paid, redirect to confirmation
        if ($registration->payment_status === 'paid') {
            return redirect()->route('course.confirmation', $registration->id);
        }

        return view('frontend.course-payment', compact('registration'));
    }

    /**
     * Process payment.
     */
    public function processPayment(Request $request, $registrationId)
    {
        $registration = CourseRegistration::with('course')
            ->where('id', $registrationId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $validated = $request->validate([
            'payment_method' => 'required|in:bank_transfer,credit_card,paypal',
            'payment_reference' => 'nullable|string|max:255',
        ]);

        // Update registration with payment information
        $registration->update([
            'payment_method' => $validated['payment_method'],
            'payment_reference' => $validated['payment_reference'],
            'payment_status' => 'paid', // In real app, this would be set after payment verification
            'status' => 'confirmed',
        ]);

        // Confirm the registration (this will increment course participants)
        $registration->confirm();

        return redirect()->route('course.confirmation', $registration->id)
            ->with('success', 'Payment completed successfully. Your registration is confirmed.');
    }

    /**
     * Show registration confirmation.
     */
    public function confirmation($registrationId)
    {
        $registration = CourseRegistration::with(['course', 'user'])
            ->where('id', $registrationId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('frontend.course-confirmation', compact('registration'));
    }

    /**
     * Download registration certificate/receipt.
     */
    public function downloadCertificate($registrationId)
    {
        $registration = CourseRegistration::with(['course', 'user'])
            ->where('id', $registrationId)
            ->where('user_id', Auth::id())
            ->where('status', 'confirmed')
            ->firstOrFail();

        // Generate PDF certificate (you would implement PDF generation here)
        // For now, just return a success message
        return redirect()->back()
            ->with('success', 'Certificate download feature will be available soon.');
    }
}
