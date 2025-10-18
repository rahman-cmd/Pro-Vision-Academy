@extends('admin.layouts.app')

@section('title', 'Settings')

@section('content')
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">General Settings</h2>
            <p class="text-sm text-gray-500">Manage your site-wide configuration</p>
        </div>
        <div>
            <a href="/" target="_blank" class="inline-flex items-center px-3 py-2 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-md">
                <i class="fas fa-external-link-alt mr-2"></i> View Site
            </a>
        </div>
    </div>

    <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-8">
        @csrf
        @method('PUT')

        {{-- Basic Information --}}
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Business Name <span class="text-red-500">*</span></label>
                    <input type="text" name="business_name" value="{{ old('business_name', $setting->business_name) }}" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    @error('business_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $setting->email) }}" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('phone')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="active" {{ old('status', $setting->status) === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $setting->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Address & Description --}}
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-4">Organization Details</h3>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <input type="text" name="address" value="{{ old('address', $setting->address) }}" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('address')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="4" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $setting->description) }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Copyright</label>
                    <input type="text" name="copyright" value="{{ old('copyright', $setting->copyright) }}" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('copyright')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Branding --}}
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-4">Branding</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                    <input type="file" name="logo" accept="image/*" class="w-full text-sm border rounded-lg p-2">
                    @error('logo')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                    @if($setting->logo_url)
                        <div class="mt-3">
                            <p class="text-xs text-gray-500 mb-1">Current Logo</p>
                            <img src="{{ $setting->logo_url }}" alt="Logo" class="h-12 object-contain bg-white border rounded p-2">
                        </div>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Favicon</label>
                    <input type="file" name="favicon" accept="image/x-icon,image/png,image/svg+xml" class="w-full text-sm border rounded-lg p-2">
                    @error('favicon')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                    @if($setting->favicon_url)
                        <div class="mt-3">
                            <p class="text-xs text-gray-500 mb-1">Current Favicon</p>
                            <img src="{{ $setting->favicon_url }}" alt="Favicon" class="h-8 w-8 object-contain bg-white border rounded p-1">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Social & Analytics --}}
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-4">Social & Analytics</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                    <input type="url" name="facebook" value="{{ old('facebook', $setting->facebook) }}" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://facebook.com/..."><!-- -->
                    @error('facebook')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Twitter</label>
                    <input type="url" name="twitter" value="{{ old('twitter', $setting->twitter) }}" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://twitter.com/...">
                    @error('twitter')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                    <input type="url" name="instagram" value="{{ old('instagram', $setting->instagram) }}" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://instagram.com/...">
                    @error('instagram')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://linkedin.com/...">
                    @error('linkedin')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Google Analytics ID</label>
                    <input type="text" name="google_analytics" value="{{ old('google_analytics', $setting->google_analytics) }}" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="G-XXXXXXXXXX or UA-XXXXXX-X">
                    @error('google_analytics')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Google Maps URL</label>
                    <input type="url" name="google_maps" value="{{ old('google_maps', $setting->google_maps) }}" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://maps.google.com/...">
                    @error('google_maps')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="pt-4 border-t flex items-center justify-between">
            <p class="text-sm text-gray-500">Last updated: {{ $setting->updated_at?->format('M d, Y H:i') ?? 'N/A' }}</p>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md">
                <i class="fas fa-save mr-2"></i> Save Changes
            </button>
        </div>
    </form>
</div>
@endsection