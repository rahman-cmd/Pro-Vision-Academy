@extends('admin.layouts.app')

@section('page_title', 'Courses')
@section('page_subtitle', 'Manage academy courses')

@section('content')
<div class="admin-panel">
    <div class="admin-panel__head">
        <div>
            <h1>Courses <span class="admin-count">{{ $courses->total() }}</span></h1>
            <p>Browse, filter, and edit courses in a dialog</p>
        </div>
        <button type="button" class="admin-btn admin-btn--primary" data-modal-open="createCourseModal">
            <i class="fas fa-plus"></i> Add Course
        </button>
    </div>

    <div class="admin-panel__body space-y-4">
        <form method="GET" action="{{ route('admin.courses.index') }}" class="admin-toolbar">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search title or description">
            <select name="status">
                <option value="">All Status</option>
                @foreach(['active','inactive','completed','cancelled'] as $status)
                    <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
            <input type="text" name="category" value="{{ request('category') }}" placeholder="Category">
            <button type="submit" class="admin-btn admin-btn--ghost"><i class="fas fa-filter"></i> Filter</button>
        </form>

        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Level</th>
                        <th>Price</th>
                        <th>Start</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td>
                                @if($course->image)
                                    <img class="admin-thumb" src="{{ image_url($course->image) }}" alt="{{ $course->title }}">
                                @else
                                    <div class="admin-thumb flex items-center justify-center text-[var(--admin-brand)]"><i class="fas fa-book"></i></div>
                                @endif
                            </td>
                            <td>
                                <div class="font-semibold">{{ $course->title }}</div>
                                <div class="text-xs text-[var(--admin-muted)]">{{ $course->category }}</div>
                            </td>
                            <td><span class="admin-badge">{{ ucfirst($course->level) }}</span></td>
                            <td class="font-semibold">OMR {{ number_format($course->price, 2) }}</td>
                            <td>{{ optional($course->start_date)->format('d M Y') }}</td>
                            <td>
                                <span class="admin-badge {{ $course->status === 'active' ? 'admin-badge--ok' : ($course->status === 'cancelled' ? 'admin-badge--danger' : 'admin-badge--muted') }}">
                                    {{ ucfirst($course->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="admin-btn admin-btn--icon admin-btn--edit"
                                        title="Edit"
                                        data-modal-edit="editCourseModal"
                                        data-form="editCourseForm"
                                        data-update-url="{{ route('admin.courses.update', $course) }}"
                                        data-payload="{{ base64_encode(json_encode([
                                            'title' => $course->title,
                                            'category' => $course->category,
                                            'level' => $course->level,
                                            'location' => $course->location,
                                            'description' => $course->description,
                                            'price' => $course->price,
                                            'early_bird_price' => $course->early_bird_price,
                                            'early_bird_deadline' => optional($course->early_bird_deadline)->format('Y-m-d'),
                                            'start_date' => optional($course->start_date)->format('Y-m-d'),
                                            'end_date' => optional($course->end_date)->format('Y-m-d'),
                                            'duration' => $course->duration,
                                            'max_participants' => $course->max_participants,
                                            'status' => $course->status,
                                            'is_featured' => $course->is_featured ? '1' : '0',
                                            'objectives' => $course->objectives,
                                            'requirements' => $course->requirements,
                                        ], JSON_UNESCAPED_UNICODE)) }}">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <form method="POST" action="{{ route('admin.courses.destroy', $course) }}" onsubmit="return confirm('Delete this course?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn admin-btn--icon admin-btn--danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="admin-empty">
                                    <div class="admin-empty__icon"><i class="fas fa-book-open"></i></div>
                                    <h3>No courses found</h3>
                                    <p>Try adjusting filters or add a new course.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $courses->withQueryString()->links() }}</div>
    </div>
</div>

{{-- Create Modal --}}
<div id="createCourseModal" class="admin-modal" role="dialog" aria-modal="true">
    <div class="admin-modal__overlay" data-modal-close></div>
    <div class="admin-modal__dialog admin-modal__dialog--lg">
        <div class="admin-modal__head">
            <h2>Add Course</h2>
            <button type="button" class="admin-modal__close" data-modal-close><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="admin-modal__body">@include('admin.courses._form')</div>
            <div class="admin-modal__foot">
                <button type="button" class="admin-btn admin-btn--ghost" data-modal-close>Cancel</button>
                <button type="submit" class="admin-btn admin-btn--primary">Save Course</button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Modal --}}
<div id="editCourseModal" class="admin-modal" role="dialog" aria-modal="true">
    <div class="admin-modal__overlay" data-modal-close></div>
    <div class="admin-modal__dialog admin-modal__dialog--lg">
        <div class="admin-modal__head">
            <h2>Edit Course</h2>
            <button type="button" class="admin-modal__close" data-modal-close><i class="fas fa-times"></i></button>
        </div>
        <form id="editCourseForm" method="POST" action="#" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="admin-modal__body">@include('admin.courses._form', ['editing' => true])</div>
            <div class="admin-modal__foot">
                <button type="button" class="admin-btn admin-btn--ghost" data-modal-close>Cancel</button>
                <button type="submit" class="admin-btn admin-btn--primary">Update Course</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
@if(request('create') == '1')
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (window.AdminModal) AdminModal.open('createCourseModal');
});
</script>
@endif
@endpush
