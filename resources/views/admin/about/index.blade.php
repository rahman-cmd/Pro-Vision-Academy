@extends('admin.layouts.app')

@section('page_title', 'About')
@section('page_subtitle', 'Homepage about section content')

@section('content')
@php($isEdit = isset($about) && $about)
<form method="POST" action="{{ $isEdit ? route('admin.about.update', $about->id) : route('admin.about.store') }}">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="admin-panel">
        <div class="admin-panel__head">
            <div>
                <h1>About Section</h1>
                <p>Edit the story and feature cards shown on the website</p>
            </div>
        </div>

        <div class="admin-panel__body">
            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-align-left"></i> Main Content</h3>
                <div class="admin-section__grid">
                    <div class="admin-field">
                        <label>Section Title</label>
                        <input type="text" name="title" value="{{ old('title', $about->title ?? '') }}" placeholder="Enter section title">
                        @error('title')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="admin-field">
                        <label>Description</label>
                        <textarea name="content" rows="4" placeholder="Enter description">{{ old('content', $about->content ?? '') }}</textarea>
                        @error('content')<p class="admin-error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-th-large"></i> Feature Cards</h3>
                @foreach([1 => 'one', 2 => 'two', 3 => 'three'] as $n => $key)
                    <div class="admin-section" style="background:white;margin-bottom:0.85rem;">
                        <h4 class="font-semibold mb-3 text-[var(--admin-ink)]">Card {{ $n }}</h4>
                        <div class="admin-section__grid admin-section__grid--2">
                            <div class="admin-field">
                                <label>Title</label>
                                <input type="text" name="item_{{ $key }}_title" value="{{ old('item_'.$key.'_title', $about->{'item_'.$key.'_title'} ?? '') }}">
                                @error('item_'.$key.'_title')<p class="admin-error">{{ $message }}</p>@enderror
                            </div>
                            <div class="admin-field">
                                <label>Description</label>
                                <textarea name="item_{{ $key }}_content" rows="3">{{ old('item_'.$key.'_content', $about->{'item_'.$key.'_content'} ?? '') }}</textarea>
                                @error('item_'.$key.'_content')<p class="admin-error">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="admin-section">
                <h3 class="admin-section__title"><i class="fas fa-toggle-on"></i> Visibility</h3>
                <div class="admin-field" style="max-width:16rem;">
                    <label>Status</label>
                    <select name="status">
                        <option value="active" {{ old('status', $about->status ?? 'active') === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $about->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')<p class="admin-error">{{ $message }}</p>@enderror
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
