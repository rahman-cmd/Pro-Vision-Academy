<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Enforce single-record management: redirect to edit of the first hero,
        // creating a default one if none exists.
        $hero = HeroSection::orderBy('sort_order')->first();

        if (!$hero) {
            $hero = HeroSection::create([
                'title' => 'Hero Title',
                'subtitle' => 'Subtitle',
                'description' => null,
                'background_image' => null,
                'button_text' => null,
                'button_link' => null,
                'status' => 'active',
                'sort_order' => 0,
            ]);
        }

        return redirect()->route('admin.hero.edit', $hero);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|url',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->only(['title','subtitle','description','button_text','button_link','sort_order','status']);

        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            if (!$file->isValid()) {
                return back()->with('error', 'The background image failed to upload.')->withInput();
            }
            $data['background_image'] = store_public_upload($file, 'hero-sections');
        }

        $hero = HeroSection::create($data);

        return redirect()->route('admin.hero.edit', $hero)->with('success', 'Hero section created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroSection $hero)
    {
        return view('admin.hero.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSection $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroSection $hero)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|url',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->only(['title','subtitle','description','button_text','button_link','sort_order','status']);

        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            if (!$file->isValid()) {
                return back()->with('error', 'The background image failed to upload.')->withInput();
            }
            delete_public_upload($hero->background_image);
            $data['background_image'] = store_public_upload($file, 'hero-sections');
        }

        $hero->update($data);

        return redirect()->route('admin.hero.edit', $hero)->with('success', 'Hero section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSection $hero)
    {
        delete_public_upload($hero->background_image);
        $hero->delete();
        return redirect()->route('admin.hero.index')->with('success', 'Hero section deleted successfully!');
    }
}
