@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Courses Section Management</h1>
                <p class="text-gray-600 mt-1">Manage upcoming courses and section content</p>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="p-6">
        <form method="GET" action="{{ route('admin.courses.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title/description/category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <div>
                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Status</option>
                    @foreach(['active','inactive','completed','cancelled'] as $status)
                        <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="text" name="category" value="{{ request('category') }}" placeholder="Category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    <i class="fas fa-filter mr-2"></i>Apply Filters
                </button>
            </div>
        </form>

        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-900">
                <i class="fas fa-graduation-cap text-green-600 mr-2"></i>Course Listings
            </h3>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-600">Total Courses: <span class="font-semibold text-blue-600">{{ $courses->total() }}</span></span>
                <a href="{{ route('admin.courses.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center">
                    <i class="fas fa-plus mr-2"></i>Add New Course
                </a>
            </div>
        </div>
        
        <!-- Courses Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-6">
            @forelse($courses as $course)
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                    @if($course->image)
                                        <img src="{{ asset('storage/'.$course->image) }}" alt="{{ $course->title }}" class="w-12 h-12 object-cover rounded-lg" />
                                    @else
                                        <i class="fas fa-tooth text-blue-600 text-xl"></i>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ $course->title }}</h4>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        @switch($course->level)
                                            @case('advanced') bg-red-100 text-red-800 @break
                                            @case('intermediate') bg-yellow-100 text-yellow-800 @break
                                            @default bg-green-100 text-green-800
                                        @endswitch">
                                        {{ ucfirst($course->level ?? 'beginner') }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.courses.edit', $course->id) }}" class="text-blue-600 hover:text-blue-800 p-1" title="Edit Course">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.courses.destroy', $course->id) }}" onsubmit="return confirm('Are you sure you want to delete this course?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 p-1" title="Delete Course">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Price:</span>
                                <span class="font-semibold text-green-600">OMR {{ number_format($course->price, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Date:</span>
                                <span class="text-sm text-gray-900">{{ optional($course->start_date)->format('M d, Y') }}{{ $course->end_date ? ' - '.optional($course->end_date)->format('M d, Y') : '' }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Status:</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                    @switch($course->status)
                                        @case('active') bg-green-100 text-green-800 @break
                                        @case('inactive') bg-gray-100 text-gray-800 @break
                                        @case('completed') bg-blue-100 text-blue-800 @break
                                        @case('cancelled') bg-red-100 text-red-800 @break
                                        @default bg-gray-100 text-gray-800
                                    @endswitch">
                                    {{ ucfirst($course->status) }}
                                </span>
                            </div>
                        </div>
                        
                        <p class="text-sm text-gray-600 mt-4 line-clamp-2">
                            {{ Str::limit($course->description, 140) }}
                        </p>
                        
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="w-full bg-blue-50 hover:bg-blue-100 text-blue-700 py-2 px-4 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-cog mr-2"></i>Manage Course
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2">
                    <div class="bg-white rounded-lg border border-gray-200 p-6 text-center">
                        <p class="text-gray-600">No courses found. Click "Add New Course" to create one.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $courses->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection