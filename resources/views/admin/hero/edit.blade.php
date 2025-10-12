@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Hero Section</h1>
            <p class="text-gray-600 mt-1">Update hero section details</p>
        </div>
        <a href="{{ route('admin.hero.index') }}" class="text-sm text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i>Back to list
        </a>
    </div>

    <div class="p-6">
        <form method="POST" action="{{ route('admin.hero.update', $hero) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" value="{{ old('title', $hero->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                        @error('title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $hero->subtitle) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                        @error('subtitle')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg">{{ old('description', $hero->description) }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Background Image</label>
                        <input type="file" name="background_image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                        @error('background_image')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @if($hero->background_image)
                            <div class="mt-3">
                                <img src="{{ asset('storage/'.$hero->background_image) }}" alt="Current Background" class="h-32 rounded-lg border">
                            </div>
                        @endif
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                        <input type="text" name="button_text" value="{{ old('button_text', $hero->button_text) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                        @error('button_text')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                        <input type="url" name="button_link" value="{{ old('button_link', $hero->button_link) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                        @error('button_link')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                        <option value="active" {{ old('status', $hero->status)==='active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $hero->status)==='inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $hero->sort_order) }}" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    @error('sort_order')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.hero.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    <i class="fas fa-save mr-2"></i>Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection