<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Speaker::query();

        // Search
        if ($request->filled('search')) {
            $search = trim($request->get('search'));
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('specialization', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('institution', 'like', "%{$search}%");
            });
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->get('type'));
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        $speakers = $query->orderBy('sort_order')
                          ->orderBy('created_at', 'desc')
                          ->paginate(15)
                          ->withQueryString();

        return view('admin.speakers.index', compact('speakers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validateSpeaker($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads/speakers', 'public');
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Speaker::create($validated);

        return redirect()->back()->with('success', 'Speaker created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Speaker $speaker)
    {
        $validated = $this->validateSpeaker($request, true);

        if ($request->hasFile('image')) {
            $newPath = $request->file('image')->store('uploads/speakers', 'public');

            // Delete old image if locally stored
            if ($speaker->image && !$this->isExternalUrl($speaker->image)) {
                Storage::disk('public')->delete($speaker->image);
            }

            $validated['image'] = $newPath;
        }

        $speaker->update($validated);

        return redirect()->back()->with('success', 'Speaker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speaker $speaker)
    {
        if ($speaker->image && !$this->isExternalUrl($speaker->image)) {
            Storage::disk('public')->delete($speaker->image);
        }

        $speaker->delete();

        return redirect()->back()->with('success', 'Speaker deleted successfully.');
    }

    /**
     * Validate request payload for store/update.
     */
    protected function validateSpeaker(Request $request, bool $updating = false): array
    {
        $rules = [
            'full_name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'image' => [$updating ? 'nullable' : 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'title' => ['nullable', 'string', 'max:255'],
            'institution' => ['nullable', 'string', 'max:255'],
            'achievements' => ['nullable', 'string'],
            'type' => ['required', Rule::in(['international', 'local'])],
            'linkedin' => ['nullable', 'url', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];

        return $request->validate($rules);
    }

    /**
     * Determine if a path is an external URL.
     */
    protected function isExternalUrl(?string $path): bool
    {
        if (!$path) return false;
        return str_starts_with($path, 'http://') || str_starts_with($path, 'https://');
    }
}
