@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Testimonials Management</h1>
                <p class="text-gray-600 mt-1">Create, update and delete student testimonials</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="text-sm text-blue-600 hover:underline">Back to Dashboard</a>
        </div>
    </div>
    <div class="px-6 py-4">

        <!-- Add New Testimonial (Modal Trigger) -->
        <div class="bg-gray-50 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-plus-circle text-blue-600 mr-2"></i>Add New Testimonial
                </h3>
                <button type="button" id="openAddTestimonialModal" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
                    Add Testimonial
                </button>
            </div>
        </div>

        <!-- Modal: Add Testimonial -->
        <div id="addTestimonialModal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-labelledby="addTestimonialTitle">
            <div class="flex items-center justify-center min-h-screen p-4">
                <!-- Overlay -->
                <div id="addTestimonialOverlay" class="fixed inset-0 bg-gray-900/50"></div>

                <!-- Dialog -->
                <div class="relative bg-white rounded-lg shadow-xl w-full max-w-3xl mx-auto">
                    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                        <h3 id="addTestimonialTitle" class="text-lg font-semibold text-gray-900">
                            <i class="fas fa-plus-circle text-blue-600 mr-2"></i>Add New Testimonial
                        </h3>
                        <button type="button" id="closeAddTestimonialModal" class="text-gray-500 hover:text-gray-700" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="px-6 py-4">
                        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input name="name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required placeholder="Enter full name">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                                <input name="country" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter country">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                <select name="rating" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    @for($i=1;$i<=5;$i++)
                                        <option value="{{ $i }}">{{ $i }} Star{{ $i>1 ? 's':'' }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Quote</label>
                                <textarea name="content" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required placeholder="Enter testimonial"></textarea>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
                                <input name="image" type="file" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <p class="text-xs text-gray-500 mt-1">Max 2MB. JPG/PNG.</p>
                            </div>
                            <div class="md:col-span-2 flex gap-3">
                                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">Create Testimonial</button>
                                <button type="button" id="closeAddTestimonialModal2" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
        (function(){
            const openBtn = document.getElementById('openAddTestimonialModal');
            const modal = document.getElementById('addTestimonialModal');
            const overlay = document.getElementById('addTestimonialOverlay');
            const closeBtn = document.getElementById('closeAddTestimonialModal');
            const closeBtn2 = document.getElementById('closeAddTestimonialModal2');

            function openModal(){
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
                const firstInput = modal.querySelector('input[name="name"]');
                if(firstInput) setTimeout(()=>firstInput.focus(), 50);
            }
            function closeModal(){
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            if(openBtn) openBtn.addEventListener('click', openModal);
            if(closeBtn) closeBtn.addEventListener('click', closeModal);
            if(closeBtn2) closeBtn2.addEventListener('click', closeModal);
            if(overlay) overlay.addEventListener('click', closeModal);

            document.addEventListener('keydown', (e)=>{
                if(e.key === 'Escape'){
                    closeModal();
                }
            });
        })();
        </script>

        <!-- Testimonials List -->
        <div class="bg-gray-50 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                <i class="fas fa-quote-left text-green-600 mr-2"></i>Existing Testimonials
            </h3>

            @if(isset($testimonials) && $testimonials->count())
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                    @foreach ($testimonials as $t)
                        <div class="bg-white rounded-lg p-6 border border-gray-200">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center">
                                    
                                    <!-- Display testimonial image if available -->
                                    @if($t->image)
                                        <img src="{{ $t->image }}" alt="{{ $t->name }}" class="w-12 h-12 rounded-full object-cover mr-4">
                                    @else
                                        <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                                            <i class="fas fa-user text-gray-500"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-semibold text-gray-800">{{ $t->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $t->country ?? 'Unknown' }} • Rating: {{ $t->rating }}/5 • {{ ucfirst($t->status) }}</div>
                                    </div>
                                </div>
                                <form action="{{ route('admin.testimonials.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Delete this testimonial?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>

                            <form action="{{ route('admin.testimonials.update', $t->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                    <input name="name" value="{{ old('name', $t->name) }}" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                                    <input name="country" value="{{ old('country', $t->country) }}" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                    <select name="rating" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{ $i }}" {{ $i == $t->rating ? 'selected' : '' }}>{{ $i }} Star{{ $i>1 ? 's':'' }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                    <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="active" {{ $t->status === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $t->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Quote</label>
                                    <textarea name="content" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>{{ old('content', $t->content) }}</textarea>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Update Photo</label>
                                    <input name="image" type="file" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <p class="text-xs text-gray-500 mt-1">Leave empty to keep current photo.</p>
                                </div>
                                <div class="md:col-span-2">
                                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">Update</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6">{{ $testimonials->links() }}</div>
            @else
                <div class="text-gray-500">No testimonials found.</div>
            @endif
        </div>
    </div>

</div>
@endsection