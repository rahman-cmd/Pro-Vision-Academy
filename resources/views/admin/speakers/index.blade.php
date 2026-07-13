@extends('admin.layouts.app')

@section('page_title', 'Speakers')
@section('page_subtitle', 'Manage international and local speakers')

@section('content')
<div class="admin-panel">
    <div class="admin-panel__head">
        <div>
            <h1>Speakers <span class="admin-count">{{ $speakers->total() }}</span></h1>
            <p>International and local faculty profiles</p>
        </div>
        <button type="button" class="admin-btn admin-btn--primary" data-modal-open="createSpeakerModal">
            <i class="fas fa-plus"></i> Add Speaker
        </button>
    </div>

    <div class="admin-panel__body space-y-4">
        <form method="GET" action="{{ route('admin.speakers.index') }}" class="admin-toolbar">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, country, specialization">
            <select name="type">
                <option value="">All Types</option>
                <option value="international" {{ request('type') === 'international' ? 'selected' : '' }}>International</option>
                <option value="local" {{ request('type') === 'local' ? 'selected' : '' }}>Local</option>
            </select>
            <select name="status">
                <option value="">All Status</option>
                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            <button type="submit" class="admin-btn admin-btn--ghost"><i class="fas fa-filter"></i> Filter</button>
        </form>

        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Specialization</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($speakers as $speaker)
                        <tr>
                            <td>
                                <img class="admin-thumb admin-thumb--round"
                                     src="{{ image_url($speaker->image, 'https://ui-avatars.com/api/?name='.urlencode($speaker->full_name).'&background=b8e0fa&color=19506b') }}"
                                     alt="{{ $speaker->full_title }}">
                            </td>
                            <td>
                                <div class="font-semibold">{{ $speaker->full_title }}</div>
                                <div class="text-xs text-[var(--admin-muted)]">{{ $speaker->institution }}</div>
                            </td>
                            <td>{{ $speaker->country }}</td>
                            <td>{{ $speaker->specialization }}</td>
                            <td><span class="admin-badge">{{ ucfirst($speaker->type) }}</span></td>
                            <td>
                                <span class="admin-badge {{ $speaker->status === 'active' ? 'admin-badge--ok' : 'admin-badge--muted' }}">
                                    {{ ucfirst($speaker->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                            class="admin-btn admin-btn--icon admin-btn--edit"
                                            title="Edit"
                                            data-modal-edit="editSpeakerModal"
                                            data-form="editSpeakerForm"
                                            data-update-url="{{ route('admin.speakers.update', $speaker) }}"
                                            data-payload="{{ base64_encode(json_encode([
                                                'full_name' => $speaker->full_name,
                                                'title' => $speaker->title,
                                                'country' => $speaker->country,
                                                'specialization' => $speaker->specialization,
                                                'institution' => $speaker->institution,
                                                'bio' => $speaker->bio,
                                                'achievements' => $speaker->achievements,
                                                'type' => $speaker->type,
                                                'status' => $speaker->status,
                                                'sort_order' => $speaker->sort_order,
                                                'linkedin' => $speaker->linkedin,
                                                'website' => $speaker->website,
                                            ], JSON_UNESCAPED_UNICODE)) }}">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <form method="POST" action="{{ route('admin.speakers.destroy', $speaker) }}" onsubmit="return confirm('Delete this speaker?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn admin-btn--icon admin-btn--danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="admin-empty">
                                    <div class="admin-empty__icon"><i class="fas fa-microphone-lines"></i></div>
                                    <h3>No speakers found</h3>
                                    <p>Add your first speaker to feature them on the site.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $speakers->links() }}</div>
    </div>
</div>

{{-- Create Modal --}}
<div id="createSpeakerModal" class="admin-modal" role="dialog" aria-modal="true">
    <div class="admin-modal__overlay" data-modal-close></div>
    <div class="admin-modal__dialog admin-modal__dialog--lg">
        <div class="admin-modal__head">
            <h2>Add Speaker</h2>
            <button type="button" class="admin-modal__close" data-modal-close><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.speakers.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="admin-modal__body">
                @include('admin.speakers._form')
            </div>
            <div class="admin-modal__foot">
                <button type="button" class="admin-btn admin-btn--ghost" data-modal-close>Cancel</button>
                <button type="submit" class="admin-btn admin-btn--primary">Save Speaker</button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Modal --}}
<div id="editSpeakerModal" class="admin-modal" role="dialog" aria-modal="true">
    <div class="admin-modal__overlay" data-modal-close></div>
    <div class="admin-modal__dialog admin-modal__dialog--lg">
        <div class="admin-modal__head">
            <h2>Edit Speaker</h2>
            <button type="button" class="admin-modal__close" data-modal-close><i class="fas fa-times"></i></button>
        </div>
        <form id="editSpeakerForm" method="POST" action="#" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="admin-modal__body">
                @include('admin.speakers._form', ['editing' => true])
            </div>
            <div class="admin-modal__foot">
                <button type="button" class="admin-btn admin-btn--ghost" data-modal-close>Cancel</button>
                <button type="submit" class="admin-btn admin-btn--primary">Update Speaker</button>
            </div>
        </form>
    </div>
</div>
@endsection
