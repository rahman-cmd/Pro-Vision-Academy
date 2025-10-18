<!-- News & Updates Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-[#1a2a3a] mb-4">News & Updates</h2>
        <p class="text-xl text-center text-gray-500 mb-14">Stay informed with the latest developments in dental education</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($newsItems as $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    @if(!empty($item['image_url']))
                        <img src="{{ $item['image_url'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">No Image</div>
                    @endif
                    <div class="p-6">
                        @if(!empty($item['published_date']))
                            <div class="text-sm text-blue-600 mb-2">{{ $item['published_date'] }}</div>
                        @endif
                        <h3 class="text-xl font-bold text-[#1a2a3a] mb-2">{{ $item['title'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $item['excerpt'] }}</p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800 transition">Read more →</a>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-3">
                    <p class="text-center text-gray-500">No news found.</p>
                </div>
            @endforelse
        </div>

        @isset($news)
            <div class="mt-10">
                {{ $news->links() }}
            </div>
        @endisset
    </div>
</section>