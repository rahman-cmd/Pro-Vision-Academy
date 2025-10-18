@extends('admin.layouts.app')

@section('content')
<div class="p-6">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">News Management</h1>
    <button id="openCreateModal" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">Add New Article</button>
  </div>

  <div class="bg-white shadow rounded p-6">
    <h2 class="text-lg font-medium mb-4">All Articles</h2>

    @if(isset($news) && $news->count())
      <div class="space-y-4">
        @foreach($news as $item)

          <div class="border rounded p-4 flex items-start justify-between">
            <div class="flex items-start gap-4">
              <div class="w-20 h-20 flex-shrink-0 overflow-hidden rounded bg-gray-100">
                <!-- News Item image -->
                @if($item->image)
                  <img src="{{ asset('storage/' . ltrim($item->image, '/')) }}" alt="{{ $item->title }}" class="w-full h-full object-cover" />
                @else
                  <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">No Image</div>
                @endif
              </div>
              <div>
                <h3 class="text-lg font-medium text-gray-900">{{ $item->title }}</h3>
                <div class="flex flex-wrap items-center gap-2 text-sm mb-2">
                  @if(!empty($item->category))
                    <span class="px-2 py-0.5 rounded bg-gray-100 text-gray-700">{{ $item->category }}</span>
                  @endif
                  @if(!empty($item->author))
                    <span class="px-2 py-0.5 rounded bg-gray-100 text-gray-700">By {{ $item->author }}</span>
                  @endif
                  @if(!empty($item->published_date))
                    <span class="px-2 py-0.5 rounded bg-gray-100 text-gray-700">{{ \Illuminate\Support\Carbon::parse($item->published_date)->format('Y-m-d') }}</span>
                  @endif
                  <!-- status -->
                   <span class="px-2 py-0.5 rounded {{ $item->status == 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">{{ ucfirst($item->status) }}</span>
                  @if($item->is_featured)
                    <span class="px-2 py-0.5 rounded bg-purple-100 text-purple-700">Featured</span>
                  @endif
                </div>
                @php $excerpt = \Illuminate\Support\Str::limit($item->excerpt ?? $item->content, 120); @endphp
                <p class="text-gray-600 text-sm">{{ $excerpt }}</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <!-- View -->
              <button aria-label="View article" class="btn-view p-2 rounded-full bg-teal-50 text-teal-700 hover:bg-teal-100 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500" title="View"
                      data-title="{{ $item->title }}"
                      data-category="{{ $item->category }}"
                      data-author="{{ $item->author }}"
                      data-date="{{ $item->published_date ? \Illuminate\Support\Carbon::parse($item->published_date)->format('Y-m-d') : '' }}"
                      data-status="{{ $item->status }}"
                      data-featured="{{ (int) $item->is_featured }}"
                      data-image="{{ $item->image ? asset('storage/' . ltrim($item->image, '/')) : '' }}"
                      data-excerpt="{{ $item->excerpt }}"
                      data-content="{{ $item->content }}"
                      data-meta="{{ $item->meta_description }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7 11-7 11-7-3.367-7-11-7Zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10Z"/></svg>
              </button>
              <!-- Edit -->
              <button aria-label="Edit article" class="btn-edit p-2 rounded-full bg-blue-50 text-blue-700 hover:bg-blue-100 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" title="Edit"
                      data-update-url="{{ route('admin.news.update', $item->id) }}"
                      data-id="{{ $item->id }}"
                      data-title="{{ $item->title }}"
                      data-category="{{ $item->category }}"
                      data-author="{{ $item->author }}"
                      data-date="{{ $item->published_date ? \Illuminate\Support\Carbon::parse($item->published_date)->format('Y-m-d') : '' }}"
                      data-status="{{ $item->status }}"
                      data-featured="{{ (int) $item->is_featured }}"
                      data-excerpt="{{ $item->excerpt }}"
                      data-content="{{ $item->content }}"
                      data-meta="{{ $item->meta_description }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="M3 17.25V21h3.75l11-11-3.75-3.75-11 11ZM20.71 7.04a1 1 0 0 0 0-1.41l-2.34-2.34a1 1 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83Z"/></svg>
              </button>
              <!-- Delete -->
              <form id="deleteForm-{{ $item->id }}" action="{{ route('admin.news.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" aria-label="Delete article" data-id="{{ $item->id }}" class="btn-delete p-2 rounded-full bg-red-50 text-red-700 hover:bg-red-100 shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500" title="Delete">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="M9 3h6v2h5v2h-1v13a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7H4V5h5V3Zm2 6h2v9h-2V9Z"/></svg>
                </button>
              </form>
            </div>
          </div>
        @endforeach
      </div>

      <div class="mt-6">
        {{ $news->links() }}
      </div>
    @else
      <p class="text-gray-500">No articles found.</p>
    @endif
  </div>
</div>

<!-- Create Modal -->
<div id="createModal" class="fixed inset-0 hidden items-center justify-center z-50" role="dialog" aria-modal="true" aria-labelledby="createModalTitle">
  <div class="absolute inset-0 bg-black/50" data-close="overlay"></div>
  <div class="relative bg-white w-full max-w-3xl mx-4 rounded-xl shadow-2xl border border-gray-200">
    <div class="flex justify-between items-center px-5 py-3 bg-indigo-600 text-white rounded-t-xl">
      <h3 id="createModalTitle" class="text-lg font-semibold flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2h6Z"/></svg>
        Add New Article
      </h3>
      <button class="text-white/80 hover:text-white focus:outline-none" data-close aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="2"/></svg>
      </button>
    </div>
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="px-5 py-4 space-y-4 max-h-[70vh] overflow-y-auto">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Title</label>
          <input type="text" name="title" value="{{ old('title') }}" required class="mt-1 ui-input" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Category</label>
          <input type="text" name="category" value="{{ old('category') }}" class="mt-1 ui-input" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Author</label>
          <input type="text" name="author" value="{{ old('author') }}" class="mt-1 ui-input" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Published Date</label>
          <input type="date" name="published_date" value="{{ old('published_date') }}" class="mt-1 ui-input" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Status</label>
          <select name="status" class="mt-1 w-full rounded-md bg-gray-50 border-0 outline-none focus:ring-0 focus:border-transparent px-3 py-2 appearance-none">
            <option value="published" {{ old('status')==='published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ old('status')==='draft' ? 'selected' : '' }}>Draft</option>
            <option value="scheduled" {{ old('status')==='scheduled' ? 'selected' : '' }}>Scheduled</option>
          </select>
        </div>
        <div class="flex items-center">
          <input type="checkbox" id="create_is_featured" name="is_featured" value="1" class="accent-indigo-600 outline-none" {{ old('is_featured') ? 'checked' : '' }} />
          <label for="create_is_featured" class="ml-2 text-sm text-gray-700">Featured</label>
        </div>
        <div class="md:col-span-2">
          <label class="block text-sm font-medium text-gray-700">Image</label>
          <input type="file" name="image" accept="image/*" class="mt-1 w-full rounded-md bg-gray-50 border-0 outline-none focus:ring-0 focus:border-transparent px-3 py-2" />
        </div>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Excerpt</label>
        <textarea name="excerpt" rows="2" class="mt-1 w-full rounded-md bg-gray-50 border-0 outline-none focus:ring-0 focus:border-transparent px-3 py-2">{{ old('excerpt') }}</textarea>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Content</label>
        <textarea name="content" rows="6" required class="mt-1 w-full rounded-md bg-gray-50 border-0 outline-none focus:ring-0 focus:border-transparent px-3 py-2">{{ old('content') }}</textarea>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Meta Description</label>
        <input type="text" name="meta_description" value="{{ old('meta_description') }}" class="mt-1 w-full rounded-md bg-gray-50 border-0 outline-none focus:ring-0 focus:border-transparent px-3 py-2" />
      </div>
    </form>
    <div class="px-5 py-3 bg-gray-50 border-t rounded-b-xl flex justify-end gap-3">
      <button type="button" class="px-5 py-2.5 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none" data-close>
        <span class="inline-flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="2"/></svg>
          Cancel
        </span>
      </button>
      <button form="" onclick="document.querySelector('#createModal form')?.submit()" class="px-5 py-2.5 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 shadow-sm focus:outline-none">
        <span class="inline-flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 fill-current"><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2h6Z"/></svg>
          Create Article
        </span>
      </button>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 hidden items-center justify-center z-50" role="dialog" aria-modal="true" aria-labelledby="editModalTitle">
  <div class="absolute inset-0 bg-black/50" data-close="overlay"></div>
  <div class="relative bg-white w-full max-w-3xl mx-4 rounded-xl shadow-2xl border border-gray-200">
    <div class="flex justify-between items-center px-5 py-3 bg-blue-600 text-white rounded-t-xl">
      <h3 id="editModalTitle" class="text-lg font-semibold flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="M3 17.25V21h3.75l11-11-3.75-3.75-11 11ZM20.71 7.04a1 1 0 0 0 0-1.41l-2.34-2.34a1 1 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83Z"/></svg>
        Edit Article
      </h3>
      <button class="text-white/80 hover:text-white focus:outline-none" data-close aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="2"/></svg>
      </button>
    </div>
    <form id="editForm" action="#" method="POST" enctype="multipart/form-data" class="px-5 py-4 space-y-4 max-h-[70vh] overflow-y-auto">
      @csrf
      <input type="hidden" name="_method" value="PUT">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Title</label>
          <input id="edit_title" type="text" name="title" required class="mt-1 ui-input" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Category</label>
          <input id="edit_category" type="text" name="category" class="mt-1 ui-input" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Author</label>
          <input id="edit_author" type="text" name="author" class="mt-1 ui-input" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Published Date</label>
          <input id="edit_date" type="date" name="published_date" class="mt-1 ui-input" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Status</label>
          <select id="edit_status" name="status" class="mt-1 ui-select">
            <option value="published">Published</option>
            <option value="draft">Draft</option>
            <option value="scheduled">Scheduled</option>
          </select>
        </div>
        <div class="flex items-center">
          <input id="edit_featured" type="checkbox" name="is_featured" value="1" class="accent-blue-600 outline-none" />
          <label for="edit_featured" class="ml-2 text-sm text-gray-700">Featured</label>
        </div>
        <div class="md:col-span-2">
          <label class="block text-sm font-medium text-gray-700">Replace Image</label>
          <input id="edit_image" type="file" name="image" accept="image/*" class="mt-1 ui-file" />
        </div>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Excerpt</label>
        <textarea id="edit_excerpt" name="excerpt" rows="2" class="mt-1 ui-textarea"></textarea>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Content</label>
        <textarea id="edit_content" name="content" rows="6" required class="mt-1 ui-textarea"></textarea>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Meta Description</label>
        <input id="edit_meta" type="text" name="meta_description" class="mt-1 ui-input" />
      </div>
    </form>
    <div class="px-5 py-3 bg-gray-50 border-t rounded-b-xl flex justify-end gap-3">
      <button type="button" class="px-5 py-2.5 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none" data-close>
        <span class="inline-flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="2"/></svg>
          Cancel
        </span>
      </button>
      <button form="editForm" class="px-5 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 shadow-sm focus:outline-none">
        <span class="inline-flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 fill-current"><path d="M3 17.25V21h3.75l11-11-3.75-3.75-11 11Z"/></svg>
          Update Article
        </span>
      </button>
    </div>
  </div>
</div>

<!-- View Modal -->
<div id="viewModal" class="fixed inset-0 hidden items-center justify-center z-50" role="dialog" aria-modal="true" aria-labelledby="viewModalTitle">
  <div class="absolute inset-0 bg-black/50" data-close="overlay"></div>
  <div class="relative bg-white w-full max-w-3xl mx-4 rounded-xl shadow-2xl border border-gray-200">
    <div class="flex justify-between items-center px-5 py-3 bg-teal-600 text-white rounded-t-xl">
      <h3 id="viewModalTitle" class="text-lg font-semibold flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7 11-7 11-7-3.367-7-11-7Z"/></svg>
        Article
      </h3>
      <button class="text-white/80 hover:text-white focus:outline-none" data-close aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="2"/></svg>
      </button>
    </div>
    <div class="px-5 py-4 space-y-3 max-h-[70vh] overflow-y-auto">
      <div class="flex items-start gap-4">
        <div class="w-24 h-24 overflow-hidden rounded bg-gray-100">
          <img id="view_image" src="" alt="" class="w-full h-full object-cover hidden" />
          <div id="view_no_image" class="w-full h-full flex items-center justify-center text-gray-400 text-sm">No Image</div>
        </div>
        <div class="flex-1">
          <div class="flex flex-wrap gap-2 text-sm">
            <span id="view_category" class="px-2 py-0.5 rounded bg-gray-100 text-gray-700 hidden"></span>
            <span id="view_author" class="px-2 py-0.5 rounded bg-gray-100 text-gray-700 hidden"></span>
            <span id="view_date" class="px-2 py-0.5 rounded bg-gray-100 text-gray-700 hidden"></span>
            <span id="view_status" class="px-2 py-0.5 rounded bg-gray-100 text-gray-700"></span>
            <span id="view_featured" class="px-2 py-0.5 rounded bg-purple-100 text-purple-700 hidden">Featured</span>
          </div>
          <p id="view_excerpt" class="text-gray-700 text-sm mt-2"></p>
        </div>
      </div>
      <div>
        <h4 class="font-medium text-gray-900">Content</h4>
        <div id="view_content" class="prose prose-sm max-w-none text-gray-800"></div>
      </div>
      <div>
        <h4 class="font-medium text-gray-900">Meta Description</h4>
        <p id="view_meta" class="text-gray-700 text-sm"></p>
      </div>
    </div>
    <div class="px-5 py-3 bg-gray-50 border-t rounded-b-xl flex justify-end">
      <button class="px-5 py-2.5 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none" data-close>
        <span class="inline-flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="2"/></svg>
          Close
        </span>
      </button>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const modals = ['createModal','editModal','viewModal'];
    const openModal = (id) => {
      const m = document.getElementById(id);
      if (!m) return;
      m.classList.remove('hidden');
      m.classList.add('flex');
    };
    const closeModal = (id) => {
      const m = document.getElementById(id);
      if (!m) return;
      m.classList.add('hidden');
      m.classList.remove('flex');
    };
    const bindClose = (modalId) => {
      const m = document.getElementById(modalId);
      if (!m) return;
      m.querySelectorAll('[data-close]').forEach(btn => btn.addEventListener('click', () => closeModal(modalId)));
      m.querySelectorAll('[data-close="overlay"]').forEach(btn => btn.addEventListener('click', () => closeModal(modalId)));
    };
    modals.forEach(bindClose);

    // Global ESC to close
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') modals.forEach(closeModal);
    });

    // Create Modal
    const openCreateBtn = document.getElementById('openCreateModal');
    if (openCreateBtn) openCreateBtn.addEventListener('click', () => openModal('createModal'));

    // Delete actions
    document.querySelectorAll('.btn-delete').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-id');
        if (confirm('Delete this article?')) {
          const form = document.getElementById('deleteForm-' + id);
          if (form) form.submit();
        }
      });
    });

    // View actions
    const statusClass = (status) => {
      switch (status) {
        case 'published': return 'bg-green-100 text-green-700';
        case 'draft': return 'bg-yellow-100 text-yellow-700';
        case 'scheduled': return 'bg-blue-100 text-blue-700';
        default: return 'bg-gray-100 text-gray-700';
      }
    };
    document.querySelectorAll('.btn-view').forEach(btn => {
      btn.addEventListener('click', () => {
        document.getElementById('viewModalTitle').textContent = btn.dataset.title || 'Article';
        const img = btn.dataset.image;
        const imgEl = document.getElementById('view_image');
        const noImgEl = document.getElementById('view_no_image');
        if (img) {
          imgEl.src = img; imgEl.classList.remove('hidden'); noImgEl.classList.add('hidden');
        } else {
          imgEl.classList.add('hidden'); noImgEl.classList.remove('hidden');
        }
        const catEl = document.getElementById('view_category');
        catEl.textContent = btn.dataset.category || ''; catEl.classList.toggle('hidden', !btn.dataset.category);
        const authorEl = document.getElementById('view_author');
        authorEl.textContent = btn.dataset.author ? ('By ' + btn.dataset.author) : ''; authorEl.classList.toggle('hidden', !btn.dataset.author);
        const dateEl = document.getElementById('view_date');
        dateEl.textContent = btn.dataset.date || ''; dateEl.classList.toggle('hidden', !btn.dataset.date);
        const statusEl = document.getElementById('view_status');
        statusEl.textContent = (btn.dataset.status || '').charAt(0).toUpperCase() + (btn.dataset.status || '').slice(1);
        statusEl.className = 'px-2 py-0.5 rounded ' + statusClass(btn.dataset.status);
        const featuredEl = document.getElementById('view_featured');
        featuredEl.classList.toggle('hidden', btn.dataset.featured !== '1');
        document.getElementById('view_excerpt').textContent = btn.dataset.excerpt || '';
        document.getElementById('view_content').textContent = btn.dataset.content || '';
        document.getElementById('view_meta').textContent = btn.dataset.meta || '';
        openModal('viewModal');
      });
    });

    // Edit actions
    document.querySelectorAll('.btn-edit').forEach(btn => {
      btn.addEventListener('click', () => {
        const form = document.getElementById('editForm');
        form.setAttribute('action', btn.dataset.updateUrl);
        document.getElementById('edit_title').value = btn.dataset.title || '';
        document.getElementById('edit_category').value = btn.dataset.category || '';
        document.getElementById('edit_author').value = btn.dataset.author || '';
        document.getElementById('edit_date').value = btn.dataset.date || '';
        document.getElementById('edit_status').value = btn.dataset.status || 'draft';
        document.getElementById('edit_featured').checked = btn.dataset.featured === '1';
        document.getElementById('edit_excerpt').value = btn.dataset.excerpt || '';
        document.getElementById('edit_content').value = btn.dataset.content || '';
        document.getElementById('edit_meta').value = btn.dataset.meta || '';
        document.getElementById('edit_image').value = '';
        openModal('editModal');
      });
    });
  });
</script>
@endsection

<style>
  /* Screenshot-matched minimal input style */
  .ui-input, .ui-select, .ui-textarea, .ui-file {
    width: 100%;
    background-color: #ffffff;
    border: 1px solid #d9dee4; /* very light gray like screenshot */
    border-radius: 16px; /* soft rounded corners */
    color: #111827; /* near-black text */
    padding: 12px 16px; /* tall comfortable field height */
    font-size: 16px; /* clean readable size */
    line-height: 24px;
    outline: none;
    box-shadow: 0 1px 1px rgba(17,24,39,0.04) inset; /* subtle inner depth */
    transition: border-color .12s ease, box-shadow .12s ease;
  }
  .ui-input:focus, .ui-select:focus, .ui-textarea:focus, .ui-file:focus {
    border-color: #cbd5e1; /* a touch darker on focus, still gray */
    box-shadow: 0 1px 2px rgba(17,24,39,0.06) inset;
  }
  .ui-input::placeholder, .ui-textarea::placeholder { color: #9ca3af; }
  .ui-select { appearance: none; }
  input[type="file"].ui-file { padding: 12px 16px; }
</style>