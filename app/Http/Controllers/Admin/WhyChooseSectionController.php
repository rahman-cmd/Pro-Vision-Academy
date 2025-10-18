<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseSection;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WhyChooseSectionController extends Controller
{
    /**
     * Show single-record update form for Why Choose Section.
     */
    public function index(): View
    {
        $section = WhyChooseSection::active()->first() ?? WhyChooseSection::first();

        // Ensure a record exists so admin can update
        if (!$section) {
            $section = WhyChooseSection::create([
                'heading_title' => 'Why Choose Us',
                'cover_image' => null,
                'card_title_1' => null,
                'card_content_1' => null,
                'card_title_2' => null,
                'card_content_2' => null,
                'card_title_3' => null,
                'card_content_3' => null,
                'card_title_4' => null,
                'card_content_4' => null,
                'status' => 'active',
            ]);
        }

        return view('admin.why_choose.index', compact('section'));
    }

    /**
     * Disable create route; only update via index form.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Disable store route; only update existing record.
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Disable show route.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Disable edit route; use index for editing.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update Why Choose Section.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $this->validateSection($request);

        $section = WhyChooseSection::findOrFail($id);
        $section->update($validated);

        return redirect()->route('admin.why-choose.index')
            ->with('success', 'Why Choose section updated successfully.');
    }

    /**
     * Disable destroy route.
     */
    public function destroy(string $id)
    {
        abort(404);
    }

    /**
     * Validation rules centralization.
     */
    protected function validateSection(Request $request): array
    {
        return $request->validate([
            'heading_title' => 'required|string|max:255',
            'cover_image' => 'nullable|string|max:255',
            'card_title_1' => 'nullable|string|max:255',
            'card_content_1' => 'nullable|string',
            'card_title_2' => 'nullable|string|max:255',
            'card_content_2' => 'nullable|string',
            'card_title_3' => 'nullable|string|max:255',
            'card_content_3' => 'nullable|string',
            'card_title_4' => 'nullable|string|max:255',
            'card_content_4' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);
    }
}
