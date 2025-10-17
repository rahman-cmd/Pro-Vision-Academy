<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutSectionRequest;
use App\Models\AboutSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutSectionController extends Controller
{
    /**
     * Display the About Section management form (single-record focus).
     */
    public function index(): View
    {
        // Prefer active record, otherwise fallback to first if available
        $about = AboutSection::active()->first() ?? AboutSection::first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new about section.
     */
    public function create(): View
    {
        return view('admin.about.index', ['about' => null]);
    }

    /**
     * Store a newly created about section.
     */
    public function store(AboutSectionRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $about = AboutSection::create($data);

        return redirect()
            ->route('admin.about.index')
            ->with('success', 'About section created successfully.');
    }

    /**
     * Show the form for editing the specified about section.
     */
    public function edit(AboutSection $about): View
    {
        return view('admin.about.index', compact('about'));
    }

    /**
     * Update the specified about section.
     */
    public function update(AboutSectionRequest $request, AboutSection $about): RedirectResponse
    {
        $data = $request->validated();
        $about->update($data);

        return redirect()
            ->route('admin.about.index')
            ->with('success', 'About section updated successfully.');
    }

    /**
     * Remove the specified about section.
     */
    public function destroy(AboutSection $about): RedirectResponse
    {
        $about->delete();
        return redirect()
            ->route('admin.about.index')
            ->with('success', 'About section deleted successfully.');
    }
}