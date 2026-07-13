@extends('admin.layouts.app')

@section('page_title', 'Gallery')
@section('page_subtitle', 'Manage gallery images')

@section('content')
<div class="admin-panel">
    <div class="admin-panel__head">
        <div>
            <h1>Gallery <span class="admin-count">{{ method_exists($galleries, 'total') ? $galleries->total() : $galleries->count() }}</span></h1>
            <p>Manage website gallery images</p>
        </div>
        <button type="button" class="admin-btn admin-btn--primary" data-modal-open="createGalleryModal">
            <i class="fas fa-plus"></i> Add Image
        </button>
    </div>

    <div class="admin-panel__body">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleries as $gallery)
                        <tr>
                            <td>
                                <img class="admin-thumb" src="{{ image_url($gallery->image) }}" alt="{{ $gallery->image_title ?? 'Gallery' }}">
                            </td>
                            <td class="font-semibold">{{ $gallery->image_title ?: 'Untitled' }}</td>
                            <td>
                                <span class="admin-badge {{ $gallery->status === 'active' ? 'admin-badge--ok' : 'admin-badge--muted' }}">
                                    {{ ucfirst($gallery->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="admin-btn admin-btn--icon admin-btn--edit btn-edit-gallery"
                                        title="Edit"
                                        data-update-url="{{ route('admin.gallery.update', $gallery) }}"
                                        data-title="{{ $gallery->image_title }}"
                                        data-status="{{ $gallery->status }}"
                                        data-preview="{{ image_url($gallery->image) }}">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <form method="POST" action="{{ route('admin.gallery.destroy', $gallery) }}" onsubmit="return confirm('Delete this image?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn admin-btn--icon admin-btn--danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="admin-empty">
                                    <div class="admin-empty__icon"><i class="fas fa-images"></i></div>
                                    <h3>No gallery images</h3>
                                    <p>Upload photos to showcase academy moments.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="createGalleryModal" class="admin-modal" role="dialog" aria-modal="true">
    <div class="admin-modal__overlay" data-modal-close></div>
    <div class="admin-modal__dialog">
        <div class="admin-modal__head">
            <h2>Add Gallery Image</h2>
            <button type="button" class="admin-modal__close" data-modal-close><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="admin-modal__body space-y-4">
                <div class="admin-field">
                    <label>Image File *</label>
                    <input type="file" name="image_file" accept="image/*" required>
                    <div class="admin-field-hint">Max 5MB. jpeg/png/jpg/gif/webp</div>
                </div>
                <div class="admin-field">
                    <label>Image Title</label>
                    <input type="text" name="image_title">
                </div>
                <div class="admin-field">
                    <label>Status</label>
                    <select name="status">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="admin-modal__foot">
                <button type="button" class="admin-btn admin-btn--ghost" data-modal-close>Cancel</button>
                <button type="submit" class="admin-btn admin-btn--primary">Add</button>
            </div>
        </form>
    </div>
</div>

<div id="editGalleryModal" class="admin-modal" role="dialog" aria-modal="true">
    <div class="admin-modal__overlay" data-modal-close></div>
    <div class="admin-modal__dialog">
        <div class="admin-modal__head">
            <h2>Edit Gallery Image</h2>
            <button type="button" class="admin-modal__close" data-modal-close><i class="fas fa-times"></i></button>
        </div>
        <form id="editGalleryForm" method="POST" action="#" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="admin-modal__body space-y-4">
                <div class="flex items-center gap-3">
                    <img id="editGalleryPreview" class="admin-thumb" src="" alt="">
                    <div class="text-sm text-[var(--admin-muted)]">Current image</div>
                </div>
                <div class="admin-field">
                    <label>Replace Image</label>
                    <input type="file" name="image_file" accept="image/*">
                    <div class="admin-field-hint">Leave empty to keep current image.</div>
                </div>
                <div class="admin-field">
                    <label>Image Title</label>
                    <input type="text" name="image_title">
                </div>
                <div class="admin-field">
                    <label>Status</label>
                    <select name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="admin-modal__foot">
                <button type="button" class="admin-btn admin-btn--ghost" data-modal-close>Cancel</button>
                <button type="submit" class="admin-btn admin-btn--primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-edit-gallery').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var form = document.getElementById('editGalleryForm');
            form.action = btn.dataset.updateUrl;
            form.querySelector('[name="image_title"]').value = btn.dataset.title || '';
            form.querySelector('[name="status"]').value = btn.dataset.status || 'active';
            form.querySelector('[name="image_file"]').value = '';
            document.getElementById('editGalleryPreview').src = btn.dataset.preview || '';
            AdminModal.open('editGalleryModal');
        });
    });
});
</script>
@endpush
