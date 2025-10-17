<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Course::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $courses = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'early_bird_price' => 'nullable|numeric|min:0',
            'early_bird_deadline' => 'nullable|date|after:today',
            'start_date' => 'required|date|after:today',
            'end_date' => 'nullable|date|after:start_date',
            'duration' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'max_participants' => 'nullable|integer|min:1',
            'level' => 'required|in:beginner,intermediate,advanced',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'objectives' => 'nullable|string',
            'requirements' => 'nullable|string',
            'status' => 'required|in:active,inactive,completed,cancelled',
            'is_featured' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }

        $validated['current_participants'] = 0;
        $validated['is_featured'] = $request->has('is_featured');

        Course::create($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load('registrations.user');
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'early_bird_price' => 'nullable|numeric|min:0',
            'early_bird_deadline' => 'nullable|date',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'duration' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'max_participants' => 'nullable|integer|min:1',
            'level' => 'required|in:beginner,intermediate,advanced',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'objectives' => 'nullable|string',
            'requirements' => 'nullable|string',
            'status' => 'required|in:active,inactive,completed,cancelled',
            'is_featured' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');

        $course->update($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // Check if course has registrations
        if ($course->registrations()->count() > 0) {
            return redirect()->route('admin.courses.index')
                ->with('error', 'Cannot delete course with existing registrations.');
        }

        // Delete image
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course deleted successfully.');
    }

    /**
     * Toggle course featured status.
     */
    public function toggleFeatured(Course $course)
    {
        $course->update(['is_featured' => !$course->is_featured]);

        return response()->json([
            'success' => true,
            'is_featured' => $course->is_featured,
            'message' => 'Course featured status updated successfully.'
        ]);
    }

    /**
     * Bulk actions for courses.
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,activate,deactivate,feature,unfeature',
            'course_ids' => 'required|array',
            'course_ids.*' => 'exists:courses,id'
        ]);

        $courses = Course::whereIn('id', $request->course_ids);

        switch ($request->action) {
            case 'delete':
                // Check for registrations before deleting
                $coursesWithRegistrations = $courses->whereHas('registrations')->count();
                if ($coursesWithRegistrations > 0) {
                    return redirect()->back()
                        ->with('error', 'Cannot delete courses with existing registrations.');
                }
                $courses->delete();
                $message = 'Selected courses deleted successfully.';
                break;

            case 'activate':
                $courses->update(['status' => 'active']);
                $message = 'Selected courses activated successfully.';
                break;

            case 'deactivate':
                $courses->update(['status' => 'inactive']);
                $message = 'Selected courses deactivated successfully.';
                break;

            case 'feature':
                $courses->update(['is_featured' => true]);
                $message = 'Selected courses featured successfully.';
                break;

            case 'unfeature':
                $courses->update(['is_featured' => false]);
                $message = 'Selected courses unfeatured successfully.';
                break;
        }

        return redirect()->back()->with('success', $message);
    }
}
