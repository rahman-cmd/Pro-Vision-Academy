@extends('admin.layouts.app')

@section('page_title', 'Hero')
@section('page_subtitle', 'Homepage hero banner')

@section('content')
<form method="POST" action="{{ route('admin.hero.update', $hero) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-panel">
        <div class="admin-panel__head">
            <div>
                <h1>Hero Section</h1>
                <p>Update the full-bleed homepage banner</p>
            </div>
        </div>

        <div class="admin-panel__body">
            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-font"></i> Copy</h3>
                <div class="admin-section__grid admin-section__grid--2">
                    <div class="admin-field">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ old('title', $hero->title) }}" required>
                        @error('title')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $hero->subtitle) }}">
                        @error('subtitle')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field md:col-span-2" style="grid-column:1/-1;">
                        <label>Description</label>
                        <textarea name="description" rows="4">{{ old('description', $hero->description) }}</textarea>
                        @error('description')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-image"></i> Media & CTA</h3>
                <div class="admin-section__grid admin-section__grid--2">
                    <div class="admin-field">
                        <label>Background Image</label>
                        <input type="file" name="background_image" accept="image/*">
                        @error('background_image')<p class="admin-error">{{ $message }}</p>@enderror
                        @if($hero->background_image)
                            <div class="admin-preview admin-preview--wide mt-3">
                                <img src="{{ image_url($hero->background_image) }}" alt="Current Background">
                            </div>
                        @endif
                    </div>
                    <div>
                        <div class="admin-field mb-4">
                            <label>Button Text</label>
                            <input type="text" name="button_text" value="{{ old('button_text', $hero->button_text) }}">
                            @error('button_text')<p class="admin-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="admin-field">
                            <label>Button Link</label>
                            <input type="url" name="button_link" value="{{ old('button_link', $hero->button_link) }}">
                            @error('button_link')<p class="admin-error">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-sliders"></i> Display</h3>
                <div class="admin-section__grid admin-section__grid--3">
                    <div class="admin-field">
                        <label>Status</label>
                        <select name="status">
                            <option value="active" {{ old('status', $hero->status)==='active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $hero->status)==='inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $hero->sort_order) }}" min="0">
                        @error('sort_order')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-panel__foot">
            <a href="{{ route('admin.dashboard') }}" class="admin-btn admin-btn--ghost">Cancel</a>
            <button type="submit" class="admin-btn admin-btn--primary"><i class="fas fa-save"></i> Update Hero</button>
        </div>
    </div>
</form>
@endsection
