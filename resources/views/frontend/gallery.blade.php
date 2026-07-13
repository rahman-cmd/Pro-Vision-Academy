<section id="gallery" class="section section--white">
    <div class="section__inner">
        <div class="section__head reveal">
            <span class="section__eyebrow">Moments</span>
            <h2 class="section__title">Gallery</h2>
            <p class="section__lede">Workshops, lectures, and clinical training captured from the academy floor.</p>
        </div>

        @if(isset($galleryItems) && $galleryItems->count())
            <div class="gallery-grid">
                @foreach($galleryItems as $item)
                    <figure class="gallery-item reveal">
                        <img src="{{ image_url($item->image) }}" alt="{{ $item->image_title ?? 'Gallery Image' }}">
                        <figcaption>{{ $item->image_title ?? 'Gallery Image' }}</figcaption>
                    </figure>
                @endforeach
            </div>
        @else
            <p class="text-center text-[var(--muted)]">No gallery items available right now.</p>
        @endif
    </div>
</section>
