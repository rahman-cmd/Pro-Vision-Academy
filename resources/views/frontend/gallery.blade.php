<!-- Gallery Section -->
<section class="bg-gray-50 py-10">
	<div class="max-w-7xl mx-auto px-4">
		<h2 class="text-4xl md:text-5xl font-bold text-center text-[#19506b] mb-6">Gallery</h2>
		<p class="text-xl text-center text-gray-500 mb-14 max-w-3xl mx-auto">A showcase of our events, workshops, and lectures.</p>

		@if(isset($galleryItems) && $galleryItems->count())
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
				@foreach($galleryItems as $item)
					<div class="bg-white rounded-xl shadow overflow-hidden flex flex-col">
						<img src="{{ $item->image }}" alt="{{ $item->image_title ?? 'Gallery Image' }}" class="w-full h-56 object-cover">
						<div class="p-4 flex-1 flex items-center justify-center">
							<span class="text-[#19506b] font-semibold text-center">{{ $item->image_title ?? 'Gallery Image' }}</span>
						</div>
					</div>
				@endforeach
			</div>
		@else
			<p class="text-center text-gray-500">No gallery items available right now.</p>
		@endif
	</div>
</section>