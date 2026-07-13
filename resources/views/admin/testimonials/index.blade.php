@extends('admin.layouts.app')

@section('page_title', 'Testimonials')
@section('page_subtitle', 'Manage student testimonials')

@section('content')
<div class="admin-panel">
    <div class="admin-panel__head">
        <div>
            <h1>Testimonials</h1>
            <p>List view — click Edit to update in a dialog</p>
        </div>
        <button type="button" class="admin-btn admin-btn--primary" data-modal-open="createTestimonialModal">
            <i class="fas fa-plus"></i> Add Testimonial
        </button>
    </div>

    <div class="admin-panel__body">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Quote</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $t)
                        <tr>
                            <td>
                                @if($t->image)
                                    <img class="admin-thumb admin-thumb--round" src="{{ image_url($t->image) }}" alt="{{ $t->name }}">
                                @else
                                    <div class="admin-thumb admin-thumb--round flex items-center justify-center"><i class="fas fa-user text-[var(--admin-muted)]"></i></div>
                                @endif
                            </td>
                            <td class="font-semibold">{{ $t->name }}</td>
                            <td>{{ $t->country ?? '—' }}</td>
                            <td>{{ $t->rating }}/5</td>
                            <td>
                                <span class="admin-badge {{ $t->status === 'active' ? 'admin-badge--ok' : 'admin-badge--muted' }}">
                                    {{ ucfirst($t->status) }}
                                </span>
                            </td>
                            <td class="max-w-[220px] truncate text-[var(--admin-muted)]">{{ \Illuminate\Support\Str::limit($t->content, 60) }}</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="admin-btn admin-btn--icon admin-btn--edit"
                                        title="Edit"
                                        data-modal-edit="editTestimonialModal"
                                        data-form="editTestimonialForm"
                                        data-update-url="{{ route('admin.testimonials.update', $t) }}"
                                        data-payload="{{ base64_encode(json_encode([
                                            'name' => $t->name,
                                            'country' => $t->country,
                                            'rating' => $t->rating,
                                            'status' => $t->status,
                                            'content' => $t->content,
                                        ], JSON_UNESCAPED_UNICODE)) }}">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Delete this testimonial?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn admin-btn--icon admin-btn--danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-[var(--admin-muted)] py-8">No testimonials found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $testimonials->links() }}</div>
    </div>
</div>

<div id="createTestimonialModal" class="admin-modal" role="dialog" aria-modal="true">
    <div class="admin-modal__overlay" data-modal-close></div>
    <div class="admin-modal__dialog">
        <div class="admin-modal__head">
            <h2>Add Testimonial</h2>
            <button type="button" class="admin-modal__close" data-modal-close><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="admin-modal__body">@include('admin.testimonials._form')</div>
            <div class="admin-modal__foot">
                <button type="button" class="admin-btn admin-btn--ghost" data-modal-close>Cancel</button>
                <button type="submit" class="admin-btn admin-btn--primary">Create</button>
            </div>
        </form>
    </div>
</div>

<div id="editTestimonialModal" class="admin-modal" role="dialog" aria-modal="true">
    <div class="admin-modal__overlay" data-modal-close></div>
    <div class="admin-modal__dialog">
        <div class="admin-modal__head">
            <h2>Edit Testimonial</h2>
            <button type="button" class="admin-modal__close" data-modal-close><i class="fas fa-times"></i></button>
        </div>
        <form id="editTestimonialForm" method="POST" action="#" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="admin-modal__body">@include('admin.testimonials._form', ['editing' => true])</div>
            <div class="admin-modal__foot">
                <button type="button" class="admin-btn admin-btn--ghost" data-modal-close>Cancel</button>
                <button type="submit" class="admin-btn admin-btn--primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
