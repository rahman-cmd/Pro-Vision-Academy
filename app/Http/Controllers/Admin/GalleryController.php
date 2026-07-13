<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $galleries = Gallery::orderByDesc('id')->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Disable create route for now; manage via index modal.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'heading_title' => ['nullable','string','max:255'],
            'image_title'   => ['nullable','string','max:255'],
            'status'        => ['required','in:active,inactive'],
            'image_file'    => ['required','image','mimes:jpeg,png,jpg,gif,webp','max:5120'],
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            if (!$file->isValid()) {
                return back()->with('error', 'Image upload failed.')->withInput();
            }

            try {
                $validated['image'] = store_public_upload($file, 'gallery');
            } catch (\Throwable $e) {
                return back()->with('error', 'Could not save image: ' . $e->getMessage())->withInput();
            }
        }

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'New gallery image added successfully.');
    }

    /**
     * Disable show route.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Disable edit route; update inline from index.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'image_title'   => ['nullable','string','max:255'],
            'status'        => ['required','in:active,inactive'],
            'image_file'    => ['nullable','image','mimes:jpeg,png,jpg,gif,webp','max:5120'],
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            if (!$file->isValid()) {
                return back()->with('error', 'Image upload failed.')->withInput();
            }

            try {
                delete_public_upload($gallery->image);
                $validated['image'] = store_public_upload($file, 'gallery');
            } catch (\Throwable $e) {
                return back()->with('error', 'Could not save image: ' . $e->getMessage())->withInput();
            }
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery): RedirectResponse
    {
        delete_public_upload($gallery->image);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item deleted successfully.');
    }
}
