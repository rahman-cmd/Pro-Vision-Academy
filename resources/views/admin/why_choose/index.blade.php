@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Why Choose Section</h1>
                <p class="text-gray-600 mt-1">Update content shown on the homepage</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="p-6">
        @if(session('success'))
            <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-800 px-4 py-3">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.why-choose.update', $section->id) }}" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Section Header -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-heading text-blue-600 mr-2"></i>Section Header
                </h3>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Heading Title</label>
                            <input type="text" name="heading_title" value="{{ old('heading_title', $section->heading_title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter section heading" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="active" {{ old('status', $section->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $section->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cover Image (path or URL)</label>
                        <input type="text" name="cover_image" value="{{ old('cover_image', $section->cover_image) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. storage/why-choose/cover.jpg">
                        @if($section->hasCoverImage())
                            <div class="mt-4">
                                <img src="{{ $section->cover_image_url ?? $section->cover_image }}" alt="Cover" class="w-full max-w-md rounded-lg border border-gray-200">
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Feature Cards -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-star text-yellow-600 mr-2"></i>Feature Cards
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg p-6 border border-gray-200">
                        <h4 class="font-semibold text-gray-800 mb-4">Card 1</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                <input type="text" name="card_title_1" value="{{ old('card_title_1', $section->card_title_1) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                                <textarea name="card_content_1" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('card_content_1', $section->card_content_1) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 border border-gray-200">
                        <h4 class="font-semibold text-gray-800 mb-4">Card 2</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                <input type="text" name="card_title_2" value="{{ old('card_title_2', $section->card_title_2) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                                <textarea name="card_content_2" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('card_content_2', $section->card_content_2) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 border border-gray-200">
                        <h4 class="font-semibold text-gray-800 mb-4">Card 3</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                <input type="text" name="card_title_3" value="{{ old('card_title_3', $section->card_title_3) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                                <textarea name="card_content_3" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('card_content_3', $section->card_content_3) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 border border-gray-200">
                        <h4 class="font-semibold text-gray-800 mb-4">Card 4</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                <input type="text" name="card_title_4" value="{{ old('card_title_4', $section->card_title_4) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                                <textarea name="card_content_4" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('card_content_4', $section->card_content_4) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.dashboard') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                    <i class="fas fa-save mr-2"></i>Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection