@extends('admin.layouts.app')

@section('page_title', 'Why Choose')
@section('page_subtitle', 'Homepage why-choose section')

@section('content')
<form method="POST" action="{{ route('admin.why-choose.update', $section->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-panel">
        <div class="admin-panel__head">
            <div>
                <h1>Why Choose Section</h1>
                <p>Update headline, cover image, and feature cards</p>
            </div>
        </div>

        <div class="admin-panel__body">
            @if($errors->any())
                <div class="admin-section" style="background:#fdecec;border-color:#f5c2c2;color:#8a1f1f;margin-bottom:1rem;">
                    <ul class="list-disc pl-5 space-y-1 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-heading"></i> Section Header</h3>
                <div class="admin-section__grid admin-section__grid--2">
                    <div class="admin-field">
                        <label>Heading Title</label>
                        <input type="text" name="heading_title" value="{{ old('heading_title', $section->heading_title) }}" required>
                    </div>
                    <div class="admin-field">
                        <label>Status</label>
                        <select name="status">
                            <option value="active" {{ old('status', $section->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $section->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="admin-field">
                        <label>Cover Image Path / URL</label>
                        <input type="text" name="cover_image" value="{{ old('cover_image', $section->cover_image) }}" placeholder="e.g. storage/why-choose/cover.jpg">
                        @error('cover_image')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Upload Cover Image</label>
                        <input type="file" name="cover_image_file" accept="image/*">
                        <div class="admin-field-hint">JPG, PNG, GIF, WEBP · Max 5MB</div>
                        @error('cover_image_file')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                </div>
                @if($section->hasCoverImage())
                    <div class="admin-preview admin-preview--wide mt-4">
                        <img src="{{ image_url($section->cover_image) }}" alt="Cover">
                    </div>
                    <div class="admin-checkbox-row">
                        <input type="checkbox" name="remove_cover_image" id="remove_cover_image" value="1">
                        <label for="remove_cover_image">Remove current image</label>
                    </div>
                @endif
            </div>

            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-star"></i> Feature Cards</h3>
                <div class="admin-section__grid admin-section__grid--2">
                    @foreach(range(1, 4) as $i)
                        <div class="admin-section" style="background:white;margin:0;">
                            <h4 class="font-semibold mb-3">Card {{ $i }}</h4>
                            <div class="admin-field mb-3">
                                <label>Title</label>
                                <input type="text" name="card_title_{{ $i }}" value="{{ old('card_title_'.$i, $section->{'card_title_'.$i}) }}">
                            </div>
                            <div class="admin-field">
                                <label>Content</label>
                                <textarea name="card_content_{{ $i }}" rows="3">{{ old('card_content_'.$i, $section->{'card_content_'.$i}) }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="admin-panel__foot">
            <a href="{{ route('admin.dashboard') }}" class="admin-btn admin-btn--ghost">Cancel</a>
            <button type="submit" class="admin-btn admin-btn--primary"><i class="fas fa-save"></i> Save Changes</button>
        </div>
    </div>
</form>
@endsection
