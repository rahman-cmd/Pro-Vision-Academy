<!-- Why Choose Pro Vision Academy Section (dynamic) -->
@php
    // Support both single-record ($whyChoose) and collection ($whyChooseSections)
    $wc = isset($whyChoose)
        ? $whyChoose
        : (($whyChooseSections ?? collect())->first());
@endphp

@if($wc)
<section class="relative py-20">
    <div class="absolute inset-0 bg-gradient-to-r from-[#19506b]/80 via-[#19506b]/50 to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <!-- Left: Heading + Cards -->
            <div class="text-white">
                <p class="text-sm uppercase text-[#cbe5fa] mb-3">Why Choose</p>
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-8">{{ $wc->heading_title ?? 'Pro Vision Academy' }}</h2>

                @php
                    // Build cards from available pairs, skip empty ones
                    $cards = [];
                    for ($i = 1; $i <= 4; $i++) {
                        $title = $wc->{"card_title_{$i}"} ?? null;
                        $content = $wc->{"card_content_{$i}"} ?? null;
                        if (!empty($title) || !empty($content)) {
                            $cards[] = ['title' => $title, 'content' => $content];
                        }
                    }
                @endphp

                @if(count($cards) > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach($cards as $card)
                            <div class="bg-white rounded-lg shadow-lg p-6">
                                @if(!empty($card['title']))
                                    <h4 class="font-bold text-lg text-[#1a2a3a] mb-2">{{ $card['title'] }}</h4>
                                @endif
                                @if(!empty($card['content']))
                                    <p class="text-gray-500">{{ $card['content'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Right: Large image -->
            <div class="w-full h-[520px] rounded-xl overflow-hidden">
                @php
                    $img = $wc->cover_image ?? null;
                    $imgSrc = $img ? (filter_var($img, FILTER_VALIDATE_URL) ? $img : asset($img)) : 'https://images.unsplash.com/photo-1685022036567-0b91b29276e1?q=80&w=2231&auto=format&fit=crop&ixlib=rb-4.1.0';
                @endphp
                <img src="{{ $imgSrc }}" alt="Why Choose Cover" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>
@else
<section class="relative py-20">
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center text-gray-600">No Why Choose content available yet.</div>
    </div>
</section>
@endif