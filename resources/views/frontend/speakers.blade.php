<section id="speakers" class="section section--fog">
    <div class="section__inner">
        <div class="section__head reveal">
            <span class="section__eyebrow">Faculty</span>
            <h2 class="section__title">Speakers</h2>
            <p class="section__lede">Learn from leading dental experts shaping practice across the region and beyond.</p>
        </div>

        @php
            $hasInternational = isset($internationalSpeakers) && ($internationalSpeakers->count() > 0);
            $hasLocal = isset($localSpeakers) && ($localSpeakers->count() > 0);
        @endphp

        @if($hasInternational)
            <div class="speaker-block reveal">
                <h3>International Speakers</h3>
                <div class="speaker-grid">
                    @foreach($internationalSpeakers as $speaker)
                        <article class="speaker-item">
                            <img
                                src="{{ image_url($speaker->image, 'https://ui-avatars.com/api/?name='.urlencode($speaker->full_name).'&background=b8e0fa&color=19506b') }}"
                                alt="{{ $speaker->full_title }}"
                            >
                            <div class="speaker-item__name">{{ $speaker->full_title }}</div>
                            <div class="speaker-item__meta">{{ $speaker->country }}</div>
                            <div class="speaker-item__spec">{{ $speaker->specialization }}</div>
                            @if(!empty($speaker->institution))
                                <div class="speaker-item__meta">{{ $speaker->institution }}</div>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        @endif

        @if($hasLocal)
            <div class="speaker-block reveal">
                <h3>Local Experts</h3>
                <div class="speaker-grid">
                    @foreach($localSpeakers as $speaker)
                        <article class="speaker-item">
                            <img
                                src="{{ image_url($speaker->image, 'https://ui-avatars.com/api/?name='.urlencode($speaker->full_name).'&background=b8e0fa&color=19506b') }}"
                                alt="{{ $speaker->full_title }}"
                            >
                            <div class="speaker-item__name">{{ $speaker->full_title }}</div>
                            <div class="speaker-item__meta">{{ $speaker->country }}</div>
                            <div class="speaker-item__spec">{{ $speaker->specialization }}</div>
                            @if(!empty($speaker->institution))
                                <div class="speaker-item__meta">{{ $speaker->institution }}</div>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        @endif

        @if(!$hasInternational && !$hasLocal)
            <p class="text-center text-[var(--muted)]">No speakers available at the moment.</p>
        @endif
    </div>
</section>
