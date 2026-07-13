<section id="testimonials" class="section section--fog">
    <div class="section__inner">
        <div class="section__head reveal">
            <span class="section__eyebrow">Student stories</span>
            <h2 class="section__title">What Our Students Say</h2>
            <p class="section__lede">Real experiences from dentists who trained with Pro Vision Academy.</p>
        </div>

        @if(isset($testimonials) && $testimonials->count())
            <div class="testimonial-grid">
                @foreach ($testimonials as $t)
                    <blockquote class="testimonial reveal">
                        <p class="testimonial__quote">“{{ $t->content }}”</p>
                        <footer class="testimonial__person">
                            @if($t->image)
                                <img src="{{ image_url($t->image) }}" alt="{{ $t->name }}">
                            @else
                                <div class="testimonial__avatar"><i class="fas fa-user"></i></div>
                            @endif
                            <div>
                                <div class="testimonial__name">{{ $t->name }}</div>
                                @if($t->country)
                                    <div class="testimonial__country">{{ $t->country }}</div>
                                @endif
                                <div class="testimonial__stars" aria-label="Rating {{ $t->rating }} of 5">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= ($t->rating ?? 0) ? '' : 'opacity-30' }}"></i>
                                    @endfor
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                @endforeach
            </div>
        @else
            <p class="text-center text-[var(--muted)]">No testimonials yet.</p>
        @endif
    </div>
</section>
