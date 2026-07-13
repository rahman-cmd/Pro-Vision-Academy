@extends('admin.layouts.app')

@section('title', 'Settings — Admin')
@section('page_title', 'Settings')
@section('page_subtitle', 'Site-wide configuration and branding')

@section('content')
<form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-panel">
        <div class="admin-panel__head">
            <div>
                <h1>General Settings</h1>
                <p>Business details, branding, and social links</p>
            </div>
            <a href="{{ route('home') }}" target="_blank" class="admin-btn admin-btn--ghost">
                <i class="fas fa-external-link-alt"></i> View Site
            </a>
        </div>

        <div class="admin-panel__body">
            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-building"></i> Basic Information</h3>
                <div class="admin-section__grid admin-section__grid--2">
                    <div class="admin-field">
                        <label>Business Name *</label>
                        <input type="text" name="business_name" value="{{ old('business_name', $setting->business_name) }}" required>
                        @error('business_name')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email', $setting->email) }}">
                        @error('email')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}">
                        @error('phone')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Status</label>
                        <select name="status">
                            <option value="active" {{ old('status', $setting->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $setting->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-map-marker-alt"></i> Organization Details</h3>
                <div class="admin-section__grid">
                    <div class="admin-field">
                        <label>Address</label>
                        <input type="text" name="address" value="{{ old('address', $setting->address) }}">
                        @error('address')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Description</label>
                        <textarea name="description" rows="4">{{ old('description', $setting->description) }}</textarea>
                        @error('description')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Copyright</label>
                        <input type="text" name="copyright" value="{{ old('copyright', $setting->copyright) }}">
                        @error('copyright')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-palette"></i> Branding</h3>
                <div class="admin-section__grid admin-section__grid--2">
                    <div class="admin-field">
                        <label>Logo</label>
                        <input type="file" name="logo" accept="image/*">
                        @error('logo')<p class="admin-error">{{ $message }}</p>@enderror
                        @if($setting->logo_url)
                            <div class="admin-preview mt-3">
                                <img src="{{ $setting->logo_url }}" alt="Logo" style="height:3rem;width:auto;object-fit:contain;">
                                <span class="text-sm text-[var(--admin-muted)]">Current logo</span>
                            </div>
                        @endif
                    </div>
                    <div class="admin-field">
                        <label>Favicon</label>
                        <input type="file" name="favicon" accept="image/x-icon,image/png,image/svg+xml">
                        @error('favicon')<p class="admin-error">{{ $message }}</p>@enderror
                        @if($setting->favicon_url)
                            <div class="admin-preview mt-3">
                                <img src="{{ $setting->favicon_url }}" alt="Favicon" style="width:2rem;height:2rem;">
                                <span class="text-sm text-[var(--admin-muted)]">Current favicon</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-share-nodes"></i> Social & Analytics</h3>
                <div class="admin-section__grid admin-section__grid--2">
                    <div class="admin-field">
                        <label>Facebook</label>
                        <input type="url" name="facebook" value="{{ old('facebook', $setting->facebook) }}" placeholder="https://facebook.com/...">
                        @error('facebook')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Twitter</label>
                        <input type="url" name="twitter" value="{{ old('twitter', $setting->twitter) }}" placeholder="https://twitter.com/...">
                        @error('twitter')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Instagram</label>
                        <input type="url" name="instagram" value="{{ old('instagram', $setting->instagram) }}" placeholder="https://instagram.com/...">
                        @error('instagram')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>LinkedIn</label>
                        <input type="url" name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}" placeholder="https://linkedin.com/...">
                        @error('linkedin')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Google Analytics ID</label>
                        <input type="text" name="google_analytics" value="{{ old('google_analytics', $setting->google_analytics) }}" placeholder="G-XXXXXXXXXX">
                        @error('google_analytics')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Google Maps URL</label>
                        <input type="url" name="google_maps" value="{{ old('google_maps', $setting->google_maps) }}" placeholder="https://maps.google.com/...">
                        @error('google_maps')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-panel__foot" style="justify-content:space-between;">
            <p class="text-sm text-[var(--admin-muted)] m-0">Last updated: {{ $setting->updated_at?->format('M d, Y H:i') ?? 'N/A' }}</p>
            <button type="submit" class="admin-btn admin-btn--primary"><i class="fas fa-save"></i> Save Changes</button>
        </div>
    </div>
</form>
@endsection
