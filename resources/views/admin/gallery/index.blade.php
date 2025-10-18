@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Gallery Management</h1>
            <p class="text-gray-600 mt-1">Add, update, and delete gallery images</p>
        </div>
        <button id="openAddModal" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
            <i class="fas fa-plus mr-2"></i>Add New Image
        </button>
    </div>

    <div class="p-6">


        @forelse($galleries as $gallery)
            <div class="bg-gray-50 rounded-lg p-6 mb-6">
                <div class="flex items-start gap-6">
                    <div class="w-48 shrink-0">
                        @php($src = \Illuminate\Support\Str::startsWith($gallery->image, 'http') ? $gallery->image : asset($gallery->image))
                        <img src="{{ $src }}" alt="{{ $gallery->image_title ?? 'Gallery Image' }}" class="w-48 h-32 object-cover rounded border"/>
                    </div>
                    <div class="flex-1">
                        <form method="POST" action="{{ route('admin.gallery.update', $gallery->id) }}" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Replace Image</label>
                                    <input type="file" name="image_file" accept="image/*" class="w-full px-3 py-2 border rounded" />
                                    <p class="text-xs text-gray-500 mt-1">Max 5MB. jpeg/png/jpg/gif/webp</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <select name="status" class="w-full px-3 py-2 border rounded">
                                        <option value="active" {{ $gallery->status === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $gallery->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Image Title</label>
                                    <input type="text" name="image_title" value="{{ old('image_title', $gallery->image_title) }}" class="w-full px-3 py-2 border rounded" />
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('admin.gallery.destroy', $gallery->id) }}" onsubmit="return confirm('Delete this image?');" class="mt-2 inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-gray-600">No gallery images found.</div>
        @endforelse
    </div>
</div>

<!-- Add Image Modal -->
<div id="addModal" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg">
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold">Add New Gallery Image</h2>
            <button id="closeAddModal" class="text-gray-500 hover:text-gray-700"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Image File<span class="text-red-500">*</span></label>
                <input type="file" name="image_file" accept="image/*" required class="w-full px-3 py-2 border rounded" />
                <p class="text-xs text-gray-500 mt-1">Max 5MB. jpeg/png/jpg/gif/webp</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Image Title</label>
                    <input type="text" name="image_title" class="w-full px-3 py-2 border rounded" />
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" class="w-full px-3 py-2 border rounded">
                    <option value="active" selected>Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <button type="button" id="closeAddModalBtn" class="px-4 py-2 border rounded">Cancel</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Add</button>
            </div>
        </form>
    </div>
</div>

<script>
    const openBtn = document.getElementById('openAddModal');
    const modal = document.getElementById('addModal');
    const closeIcon = document.getElementById('closeAddModal');
    const closeBtn = document.getElementById('closeAddModalBtn');
    const closeAll = () => modal.classList.add('hidden');
    openBtn?.addEventListener('click', () => modal.classList.remove('hidden'));
    closeIcon?.addEventListener('click', closeAll);
    closeBtn?.addEventListener('click', closeAll);
    modal?.addEventListener('click', (e) => { if (e.target === modal) closeAll(); });
</script>
@endsection