<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display the settings form.
     */
    public function index()
    {
        // Ensure a single settings record exists
        $setting = Setting::query()->orderBy('id')->first();
        if (!$setting) {
            $setting = Setting::create([
                'business_name' => 'Pro Vision Academy',
                'status' => Setting::STATUS_ACTIVE,
            ]);
        }

        return view('admin.settings.index', compact('setting'));
    }

    /**
     * Update the settings in storage.
     */
    public function update(Request $request, string $id)
    {
        $setting = Setting::findOrFail($id);

        $validated = $request->validate([
            'business_name'    => ['required', 'string', 'max:255'],
            'email'            => ['nullable', 'email', 'max:255'],
            'phone'            => ['nullable', 'string', 'max:50'],
            'address'          => ['nullable', 'string', 'max:500'],
            'description'      => ['nullable', 'string'],
            'copyright'        => ['nullable', 'string', 'max:255'],
            'google_analytics' => ['nullable', 'string', 'max:255'],
            'google_maps'      => ['nullable', 'url', 'max:2048'],
            'facebook'         => ['nullable', 'url', 'max:255'],
            'twitter'          => ['nullable', 'url', 'max:255'],
            'instagram'        => ['nullable', 'url', 'max:255'],
            'linkedin'         => ['nullable', 'url', 'max:255'],
            'status'           => ['required', 'in:'.Setting::STATUS_ACTIVE.','.Setting::STATUS_INACTIVE],
            'logo'             => ['nullable', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'favicon'          => ['nullable', 'mimes:ico,png,svg', 'max:1024'],
        ]);

        if ($request->hasFile('logo')) {
            delete_public_upload($setting->logo);
            $validated['logo'] = store_public_upload($request->file('logo'), 'settings');
        }

        if ($request->hasFile('favicon')) {
            delete_public_upload($setting->favicon);
            $validated['favicon'] = store_public_upload($request->file('favicon'), 'settings');
        }

        $setting->fill($validated);
        $setting->save();

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
