@extends('admin.layouts.app')

@section('page_title', 'News')
@section('page_subtitle', 'Manage news articles')

@section('content')
<div class="admin-panel">
    <div class="admin-panel__head">
        <div>
            <h1>News</h1>
            <p>List view — click Edit to update in a dialog</p>
        </div>
        <button type="button" class="admin-btn admin-btn--primary" data-modal-open="createNewsModal">
            <i class="fas fa-plus"></i> Add Article
        </button>
    </div>

    <div class="admin-panel__body">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $item)
                        <tr>
                            <td>
                                @if($item->image)
                                    <img class="admin-thumb" src="{{ image_url($item->image) }}" alt="{{ $item->title }}">
                                @else
                                    <div class="admin-thumb flex items-center justify-center text-[var(--admin-muted)] text-xs">N/A</div>
                                @endif
                            </td>
                            <td>
                                <div class="font-semibold">{{ $item->title }}</div>
                                @if($item->is_featured)
                                    <span class="admin-badge">Featured</span>
                                @endif
                            </td>
                            <td>{{ $item->category ?: '—' }}</td>
                            <td>{{ $item->published_date ? \Illuminate\Support\Carbon::parse($item->published_date)->format('d M Y') : '—' }}</td>
                            <td>
                                <span class="admin-badge {{ $item->status === 'published' ? 'admin-badge--ok' : ($item->status === 'draft' ? 'admin-badge--warn' : 'admin-badge--muted') }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="admin-btn admin-btn--icon admin-btn--edit"
                                        title="Edit"
                                        data-modal-edit="editNewsModal"
                                        data-form="editNewsForm"
                                        data-update-url="{{ route('admin.news.update', $item) }}"
                                        data-payload="{{ base64_encode(json_encode([
                                            'title' => $item->title,
                                            'category' => $item->category,
                                            'author' => $item->author,
                                            'published_date' => $item->published_date ? \Illuminate\Support\Carbon::parse($item->published_date)->format('Y-m-d') : '',
                                            'status' => $item->status,
                                            'is_featured' => (string) (int) $item->is_featured,
                                            'excerpt' => $item->excerpt,
                                            'content' => $item->content,
                                            'meta_description' => $item->meta_description,
                                        ], JSON_UNESCAPED_UNICODE)) }}">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <form method="POST" action="{{ route('admin.news.destroy', $item) }}" onsubmit="return confirm('Delete this article?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn admin-btn--icon admin-btn--danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-[var(--admin-muted)] py-8">No articles found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $news->links() }}</div>
    </div>
</div>

<div id="createNewsModal" class="admin-modal" role="dialog" aria-modal="true">
    <div class="admin-modal__overlay" data-modal-close></div>
    <div class="admin-modal__dialog admin-modal__dialog--lg">
        <div class="admin-modal__head">
            <h2>Add Article</h2>
            <button type="button" class="admin-modal__close" data-modal-close><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="admin-modal__body">@include('admin.news._form')</div>
            <div class="admin-modal__foot">
                <button type="button" class="admin-btn admin-btn--ghost" data-modal-close>Cancel</button>
                <button type="submit" class="admin-btn admin-btn--primary">Create Article</button>
            </div>
        </form>
    </div>
</div>

<div id="editNewsModal" class="admin-modal" role="dialog" aria-modal="true">
    <div class="admin-modal__overlay" data-modal-close></div>
    <div class="admin-modal__dialog admin-modal__dialog--lg">
        <div class="admin-modal__head">
            <h2>Edit Article</h2>
            <button type="button" class="admin-modal__close" data-modal-close><i class="fas fa-times"></i></button>
        </div>
        <form id="editNewsForm" method="POST" action="#" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="admin-modal__body">@include('admin.news._form', ['editing' => true])</div>
            <div class="admin-modal__foot">
                <button type="button" class="admin-btn admin-btn--ghost" data-modal-close>Cancel</button>
                <button type="submit" class="admin-btn admin-btn--primary">Update Article</button>
            </div>
        </form>
    </div>
</div>
@endsection
