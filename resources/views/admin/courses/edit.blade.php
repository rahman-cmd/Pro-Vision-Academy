@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Course</h1>
            <p class="text-gray-600 mt-1">Update course details and settings</p>
        </div>
        <a href="{{ route('admin.courses.index') }}" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">Back to List</a>
    </div>

    <div class="p-6">
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                <h2 class="font-semibold text-red-700 mb-2">Please fix the following errors:</h2>
                <ul class="list-disc list-inside text-red-600 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.courses.update', $course->id) }}" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title', $course->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <input type="text" name="category" value="{{ old('category', $course->category) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., Implantology, Cosmetic Dentistry">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Level</label>
                    <select name="level" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        @foreach(['beginner','intermediate','advanced'] as $level)
                            <option value="{{ $level }}" {{ old('level', $course->level)===$level ? 'selected' : '' }}>{{ ucfirst($level) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                    <input type="text" name="location" value="{{ old('location', $course->location) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="City / Venue">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>{{ old('description', $course->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price (OMR)</label>
                    <input type="number" name="price" value="{{ old('price', $course->price) }}" step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Early Bird Price (OMR)</label>
                    <input type="number" name="early_bird_price" value="{{ old('early_bird_price', $course->early_bird_price) }}" step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Early Bird Deadline</label>
                    <input type="date" name="early_bird_deadline" value="{{ old('early_bird_deadline', optional($course->early_bird_deadline)->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                    <input type="date" name="start_date" value="{{ old('start_date', optional($course->start_date)->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                    <input type="date" name="end_date" value="{{ old('end_date', optional($course->end_date)->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
                    <input type="text" name="duration" value="{{ old('duration', $course->duration) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., 3 days">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Max Participants</label>
                    <input type="number" name="max_participants" value="{{ old('max_participants', $course->max_participants) }}" min="1" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Leave empty for unlimited">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        @foreach(['active','inactive','completed','cancelled'] as $status)
                            <option value="{{ $status }}" {{ old('status', $course->status)===$status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center mt-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_featured" class="rounded" {{ old('is_featured', $course->is_featured) ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-700">Feature this course</span>
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Objectives</label>
                    <textarea name="objectives" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Key learning outcomes">{{ old('objectives', $course->objectives) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Requirements</label>
                    <textarea name="requirements" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Prerequisites or required materials">{{ old('requirements', $course->requirements) }}</textarea>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Course Image</label>
                <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @if($course->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$course->image) }}" alt="{{ $course->title }}" class="w-40 h-28 object-cover rounded">
                    </div>
                @endif
                <p class="text-xs text-gray-500 mt-1">Accepted: jpeg, png, jpg, gif. Max 2MB.</p>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.courses.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium transition-colors">
                    <i class="fas fa-save mr-2"></i>Update Course
                </button>
            </div>
        </form>
    </div>
</div>
@endsection