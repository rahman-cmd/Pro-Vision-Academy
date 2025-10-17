@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Speakers Section Management</h1>
                <p class="text-gray-600 mt-1">Manage international and local speakers</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
            </a>
        </div>
    </div>

    <!-- Content -->
    <div class="p-6">
        {{-- Flash messages --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-50 text-green-700 rounded-lg border border-green-200">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-50 text-red-700 rounded-lg border border-red-200">
                <div class="font-semibold mb-2">There were validation errors:</div>
                <ul class="list-disc ml-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Filters --}}
        <form method="GET" action="{{ route('admin.speakers.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Name, specialization, country" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <select name="type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All</option>
                    <option value="international" {{ request('type') === 'international' ? 'selected' : '' }}>International</option>
                    <option value="local" {{ request('type') === 'local' ? 'selected' : '' }}>Local</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800">Apply</button>
                <a href="{{ route('admin.speakers.index') }}" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Reset</a>
            </div>
        </form>

        {{-- Create new speaker --}}
        <div class="bg-gray-50 rounded-lg p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4"><i class="fas fa-plus text-blue-600 mr-2"></i>Add New Speaker</h3>
            <form method="POST" action="{{ route('admin.speakers.store') }}" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full px-3 py-2 border rounded-lg" placeholder="Dr., Prof., etc.">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                    <input type="text" name="country" value="{{ old('country') }}" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Specialization</label>
                    <input type="text" name="specialization" value="{{ old('specialization') }}" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Institution</label>
                    <input type="text" name="institution" value="{{ old('institution') }}" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                    <textarea name="bio" rows="3" class="w-full px-3 py-2 border rounded-lg">{{ old('bio') }}</textarea>
                </div>
                <div class="lg:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Achievements</label>
                    <textarea name="achievements" rows="3" class="w-full px-3 py-2 border rounded-lg">{{ old('achievements') }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                    <select name="type" class="w-full px-3 py-2 border rounded-lg" required>
                        <option value="international" {{ old('type')==='international' ? 'selected' : '' }}>International</option>
                        <option value="local" {{ old('type')==='local' ? 'selected' : '' }}>Local</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" class="w-full px-3 py-2 border rounded-lg" required>
                        <option value="active" {{ old('status')==='active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status')==='inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full px-3 py-2 border rounded-lg" min="0">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn URL</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin') }}" class="w-full px-3 py-2 border rounded-lg" placeholder="https://linkedin.com/in/...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                    <input type="url" name="website" value="{{ old('website') }}" class="w-full px-3 py-2 border rounded-lg" placeholder="https://example.com">
                </div>
                <div class="lg:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Photo</label>
                    <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="lg:col-span-2 flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                        <i class="fas fa-save mr-2"></i>Save Speaker
                    </button>
                </div>
            </form>
        </div>

        {{-- Speakers list --}}
        <div class="bg-gray-50 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4"><i class="fas fa-users text-indigo-600 mr-2"></i>All Speakers</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Photo</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Name</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Country</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Specialization</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Type</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Status</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Sort</th>
                            <th class="px-4 py-2 text-right text-xs font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($speakers as $speaker)
                            <tr>
                                <td class="px-4 py-3">
                                    @php
                                        $img = $speaker->image ? (\Illuminate\Support\Str::startsWith($speaker->image, ['http://', 'https://']) ? $speaker->image : asset('storage/'.$speaker->image)) : 'https://ui-avatars.com/api/?name='.urlencode($speaker->full_name).'&background=b8e0fa&color=19506b';
                                    @endphp
                                    <img src="{{ $img }}" alt="{{ $speaker->full_title }}" class="w-10 h-10 rounded-full object-cover">
                                </td>
                                <td class="px-4 py-3">
                                    <div class="font-semibold text-gray-900">{{ $speaker->full_title }}</div>
                                    <div class="text-xs text-gray-500">{{ $speaker->institution }}</div>
                                </td>
                                <td class="px-4 py-3 text-gray-700">{{ $speaker->country }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $speaker->specialization }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs {{ $speaker->type === 'international' ? 'bg-green-100 text-green-700' : 'bg-purple-100 text-purple-700' }}">{{ ucfirst($speaker->type) }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs {{ $speaker->status === 'active' ? 'bg-blue-100 text-blue-700' : 'bg-gray-200 text-gray-700' }}">{{ ucfirst($speaker->status) }}</span>
                                </td>
                                <td class="px-4 py-3 text-gray-700">{{ $speaker->sort_order }}</td>
                                <td class="px-4 py-3 text-right">
                                    <button type="button" onclick="document.getElementById('edit-{{ $speaker->id }}').classList.toggle('hidden')" class="px-3 py-1 text-sm bg-indigo-600 hover:bg-indigo-700 text-white rounded">Edit</button>
                                    <form method="POST" action="{{ route('admin.speakers.destroy', $speaker) }}" class="inline-block" onsubmit="return confirm('Delete this speaker?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 text-sm bg-red-600 hover:bg-red-700 text-white rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <tr id="edit-{{ $speaker->id }}" class="hidden bg-gray-50">
                                <td colspan="8" class="px-4 py-4">
                                    <form method="POST" action="{{ route('admin.speakers.update', $speaker) }}" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                        @csrf
                                        @method('PATCH')
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                            <input type="text" name="full_name" value="{{ old('full_name', $speaker->full_name) }}" class="w-full px-3 py-2 border rounded-lg" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                            <input type="text" name="title" value="{{ old('title', $speaker->title) }}" class="w-full px-3 py-2 border rounded-lg">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                                            <input type="text" name="country" value="{{ old('country', $speaker->country) }}" class="w-full px-3 py-2 border rounded-lg" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Specialization</label>
                                            <input type="text" name="specialization" value="{{ old('specialization', $speaker->specialization) }}" class="w-full px-3 py-2 border rounded-lg" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Institution</label>
                                            <input type="text" name="institution" value="{{ old('institution', $speaker->institution) }}" class="w-full px-3 py-2 border rounded-lg">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                                            <textarea name="bio" rows="3" class="w-full px-3 py-2 border rounded-lg">{{ old('bio', $speaker->bio) }}</textarea>
                                        </div>
                                        <div class="lg:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Achievements</label>
                                            <textarea name="achievements" rows="3" class="w-full px-3 py-2 border rounded-lg">{{ old('achievements', $speaker->achievements) }}</textarea>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                                            <select name="type" class="w-full px-3 py-2 border rounded-lg" required>
                                                <option value="international" {{ old('type', $speaker->type)==='international' ? 'selected' : '' }}>International</option>
                                                <option value="local" {{ old('type', $speaker->type)==='local' ? 'selected' : '' }}>Local</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                            <select name="status" class="w-full px-3 py-2 border rounded-lg" required>
                                                <option value="active" {{ old('status', $speaker->status)==='active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ old('status', $speaker->status)==='inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                                            <input type="number" name="sort_order" value="{{ old('sort_order', $speaker->sort_order) }}" class="w-full px-3 py-2 border rounded-lg" min="0">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                                            <input type="url" name="linkedin" value="{{ old('linkedin', $speaker->linkedin) }}" class="w-full px-3 py-2 border rounded-lg">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                                            <input type="url" name="website" value="{{ old('website', $speaker->website) }}" class="w-full px-3 py-2 border rounded-lg">
                                        </div>
                                        <div class="lg:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Photo</label>
                                            <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border rounded-lg">
                                        </div>
                                        <div class="lg:col-span-2 flex justify-end gap-2">
                                            <button type="submit" class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Update</button>
                                            <button type="button" onclick="document.getElementById('edit-{{ $speaker->id }}').classList.add('hidden')" class="px-5 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Cancel</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-6 text-center text-gray-500">No speakers found. Add a new speaker above.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $speakers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection