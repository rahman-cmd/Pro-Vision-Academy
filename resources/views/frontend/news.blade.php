<section id="news" class="section section--white">
    <div class="section__inner">
        <div class="section__head reveal">
            <span class="section__eyebrow">Updates</span>
            <h2 class="section__title">News & Insights</h2>
            <p class="section__lede">Stay current with dental education news, events, and academy announcements.</p>
        </div>

        <div class="news-grid">
            @forelse($newsItems as $item)
                <article class="news-item reveal">
                    <div class="news-item__media">
                        @if(!empty($item['image_url']))
                            <img src="{{ $item['image_url'] }}" alt="{{ $item['title'] }}">
                        @endif
                    </div>
                    @if(!empty($item['published_date']))
                        <div class="news-item__date">{{ $item['published_date'] }}</div>
                    @endif
                    <h3>{{ $item['title'] }}</h3>
                    <p>{{ $item['excerpt'] }}</p>
                    <a href="{{ route('news') }}">Read more →</a>
                </article>
            @empty
                <p class="text-center text-[var(--muted)]" style="grid-column: 1 / -1;">No news found.</p>
            @endforelse
        </div>

        @isset($news)
            <div class="mt-10">
                {{ $news->links() }}
            </div>
        @endisset
    </div>
</section>
