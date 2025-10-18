<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     * Redirect to index as we manage in one page.
     */
    public function create()
    {
        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'nullable|string|max:100',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
            $dir = public_path('uploads/testimonials');
            if (!is_dir($dir)) {
                @mkdir($dir, 0755, true);
            }
            $file->move($dir, $filename);
            $imagePath = 'uploads/testimonials/' . $filename;
        }

        $testimonial = new Testimonial();
        $testimonial->name = $validated['name'];
        $testimonial->country = $validated['country'] ?? null;
        $testimonial->content = $validated['content'];
        $testimonial->image = $imagePath;
        $testimonial->rating = $validated['rating'];
        $testimonial->status = $validated['status'];
        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     * Redirect to index as we manage in one page.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Show the form for editing the specified resource.
     * Redirect to index as we manage inline edits.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'nullable|string|max:100',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = $testimonial->image;
        if ($request->hasFile('image')) {
            // Delete old local file if present
            if ($imagePath && Str::startsWith($imagePath, ['uploads/'])) {
                $fullPath = public_path($imagePath);
                if (file_exists($fullPath)) {
                    @unlink($fullPath);
                }
            } elseif ($imagePath && Str::startsWith($imagePath, ['storage/'])) {
                $storagePath = str_replace('storage/', 'public/', $imagePath);
                Storage::delete($storagePath);
            }

            $file = $request->file('image');
            $filename = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
            $dir = public_path('uploads/testimonials');
            if (!is_dir($dir)) {
                @mkdir($dir, 0755, true);
            }
            $file->move($dir, $filename);
            $imagePath = 'uploads/testimonials/' . $filename;
        }

        $testimonial->name = $validated['name'];
        $testimonial->country = $validated['country'] ?? null;
        $testimonial->content = $validated['content'];
        $testimonial->image = $imagePath;
        $testimonial->rating = $validated['rating'];
        $testimonial->status = $validated['status'];
        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->image) {
            if (Str::startsWith($testimonial->image, ['uploads/'])) {
                $fullPath = public_path($testimonial->image);
                if (file_exists($fullPath)) {
                    @unlink($fullPath);
                }
            } elseif (Str::startsWith($testimonial->image, ['storage/'])) {
                $storagePath = str_replace('storage/', 'public/', $testimonial->image);
                Storage::delete($storagePath);
            }
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
