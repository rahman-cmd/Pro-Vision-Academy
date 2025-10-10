<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display student's registered courses.
     */
    public function index(Request $request)
    {
        $query = CourseRegistration::with(['course'])
            ->where('user_id', Auth::id());

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by payment status
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // Search by course title
        if ($request->filled('search')) {
            $query->whereHas('course', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%');
            });
        }

        $registrations = $query->orderBy('registered_at', 'desc')->paginate(10);

        // Get statistics
        $stats = [
            'total' => CourseRegistration::where('user_id', Auth::id())->count(),
            'confirmed' => CourseRegistration::where('user_id', Auth::id())->where('status', 'confirmed')->count(),
            'pending' => CourseRegistration::where('user_id', Auth::id())->where('status', 'pending')->count(),
            'cancelled' => CourseRegistration::where('user_id', Auth::id())->where('status', 'cancelled')->count(),
        ];

        return view('student.courses.index', compact('registrations', 'stats'));
    }

    /**
     * Display course registration details.
     */
    public function show($id)
    {
        $registration = CourseRegistration::with(['course', 'user'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('student.courses.show', compact('registration'));
    }

    /**
     * Show available courses for registration.
     */
    public function available(Request $request)
    {
        $query = Course::where('status', 'active');

        // Exclude already registered courses
        $registeredCourseIds = CourseRegistration::where('user_id', Auth::id())
            ->pluck('course_id')
            ->toArray();

        if (!empty($registeredCourseIds)) {
            $query->whereNotIn('id', $registeredCourseIds);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by level
        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Search by title or description
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Sort
        $sortBy = $request->get('sort', 'start_date');
        $sortOrder = $request->get('order', 'asc');
        
        if (in_array($sortBy, ['title', 'price', 'start_date', 'created_at'])) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $courses = $query->paginate(12);

        // Get filter options
        $categories = Course::where('status', 'active')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->sort()
            ->values();

        $levels = Course::where('status', 'active')
            ->distinct()
            ->pluck('level')
            ->filter()
            ->sort()
            ->values();

        return view('student.courses.available', compact('courses', 'categories', 'levels'));
    }

    /**
     * Show course details for potential registration.
     */
    public function detail($id)
    {
        $course = Course::where('id', $id)
            ->where('status', 'active')
            ->firstOrFail();

        // Check if already registered
        $isRegistered = CourseRegistration::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->exists();

        // Get related courses
        $relatedCourses = Course::where('category', $course->category)
            ->where('id', '!=', $course->id)
            ->where('status', 'active')
            ->whereNotIn('id', CourseRegistration::where('user_id', Auth::id())->pluck('course_id'))
            ->limit(3)
            ->get();

        return view('student.courses.detail', compact('course', 'isRegistered', 'relatedCourses'));
    }

    /**
     * Cancel a course registration.
     */
    public function cancel($id)
    {
        $registration = CourseRegistration::with('course')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Check if cancellation is allowed
        if ($registration->status === 'cancelled') {
            return redirect()->back()->with('error', 'Registration is already cancelled.');
        }

        // Check if course has started (you might want to add cancellation policy)
        if ($registration->course->start_date <= now()) {
            return redirect()->back()->with('error', 'Cannot cancel registration after course has started.');
        }

        // Cancel the registration
        $registration->cancel();

        return redirect()->route('student.courses.index')
            ->with('success', 'Course registration cancelled successfully.');
    }

    /**
     * Download registration certificate.
     */
    public function certificate($id)
    {
        $registration = CourseRegistration::with(['course', 'user'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'confirmed')
            ->firstOrFail();

        // Check if course has ended
        if ($registration->course->end_date > now()) {
            return redirect()->back()
                ->with('error', 'Certificate will be available after course completion.');
        }

        // Generate PDF certificate (implement PDF generation)
        // For now, return success message
        return redirect()->back()
            ->with('success', 'Certificate download feature will be available soon.');
    }

    /**
     * Update registration details.
     */
    public function updateRegistration(Request $request, $id)
    {
        $registration = CourseRegistration::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Only allow updates for pending registrations
        if ($registration->status !== 'pending') {
            return redirect()->back()->with('error', 'Cannot update confirmed registration.');
        }

        $validated = $request->validate([
            'special_requirements' => 'nullable|string|max:1000',
            'dietary_restrictions' => 'nullable|string|max:500',
            'accommodation_needed' => 'boolean',
            'notes' => 'nullable|string|max:1000',
        ]);

        $registration->update([
            'special_requirements' => $validated['special_requirements'],
            'dietary_restrictions' => $validated['dietary_restrictions'],
            'accommodation_needed' => $request->has('accommodation_needed'),
            'notes' => $validated['notes'],
        ]);

        return redirect()->back()->with('success', 'Registration details updated successfully.');
    }

    /**
     * Get upcoming courses for dashboard.
     */
    public function upcoming()
    {
        $upcomingCourses = CourseRegistration::with(['course'])
            ->where('user_id', Auth::id())
            ->where('status', 'confirmed')
            ->whereHas('course', function ($query) {
                $query->where('start_date', '>', now())
                      ->where('status', 'active');
            })
            ->orderBy('course.start_date', 'asc')
            ->limit(5)
            ->get();

        return response()->json($upcomingCourses);
    }

    /**
     * Get course history for dashboard.
     */
    public function history()
    {
        $completedCourses = CourseRegistration::with(['course'])
            ->where('user_id', Auth::id())
            ->where('status', 'confirmed')
            ->whereHas('course', function ($query) {
                $query->where('end_date', '<', now());
            })
            ->orderBy('course.end_date', 'desc')
            ->limit(5)
            ->get();

        return response()->json($completedCourses);
    }
}
