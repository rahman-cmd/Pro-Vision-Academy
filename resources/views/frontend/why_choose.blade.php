@php
    $wc = isset($whyChoose)
        ? $whyChoose
        : (($whyChooseSections ?? collect())->first());
@endphp

@if($wc)
<section class="section section--brand">
    <div class="section__inner">
        <div class="why-layout">
            <div class="reveal">
                <span class="section__eyebrow">Why choose us</span>
                <h2 class="section__title">{{ $wc->heading_title ?? 'Pro Vision Academy' }}</h2>
                <p class="section__lede" style="margin-bottom: 1.75rem;">Clinical excellence, mentorship, and programs built for real practice.</p>

                @php
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
                    <div class="why-points">
                        @foreach($cards as $card)
                            <div class="why-point">
                                @if(!empty($card['title']))
                                    <h4>{{ $card['title'] }}</h4>
                                @endif
                                @if(!empty($card['content']))
                                    <p>{{ $card['content'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="why-visual reveal reveal-delay-2">
                <img
                    src="{{ image_url($wc->cover_image, 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=1400&q=80') }}"
                    alt="{{ $wc->heading_title ?? 'Why Choose Cover' }}"
                >
            </div>
        </div>
    </div>
</section>
@endif
