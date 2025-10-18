<div id="testimonials" class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold text-center mb-6">What Our Students Say</h2>

    @if(isset($testimonials) && $testimonials->count())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-center">
            @foreach ($testimonials as $t)
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center mb-4">

                        <!-- Display testimonial image if available -->
                        @if($t->image)
                            <img src="{{ $t->image }}" alt="{{ $t->name }}" class="w-14 h-14 rounded-full object-cover mr-4">
                        @else
                            <div class="w-14 h-14 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                                <i class="fas fa-user text-gray-500"></i>
                            </div>
                        @endif
                       
                        <div>
                            <div class="font-bold text-gray-800">{{ $t->name }}</div>
                            @if($t->country)
                                <div class="text-gray-500 text-sm">{{ $t->country }}</div>
                            @endif
                            <div class="flex items-center mt-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= ($t->rating ?? 0) ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 text-base mb-0">“{{ $t->content }}”</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-gray-500">কোন টেস্টিমোনিয়াল পাওয়া যায়নি।</div>
    @endif
</div>