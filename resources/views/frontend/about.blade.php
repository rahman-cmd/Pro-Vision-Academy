<section id="about" class="section section--fog">
    <div class="section__inner">
        <div class="section__head reveal">
            <span class="section__eyebrow">Who we are</span>
            <h2 class="section__title">{{ $aboutSection->title ?? 'About Pro Vision Academy' }}</h2>
            <p class="section__lede">{{ $aboutSection->content ?? 'We advance dental education through expert-led training, modern clinical practice, and internationally recognized programs.' }}</p>
        </div>

        <div class="about-grid">
            <article class="about-item reveal reveal-delay-1">
                <div class="about-item__icon"><i class="fas fa-microscope"></i></div>
                <h3>{{ $aboutSection->item_one_title ?? 'Advanced Technology' }}</h3>
                <p>{{ $aboutSection->item_one_content ?? 'Train with contemporary dental technology and clinical workflows used in leading practices.' }}</p>
            </article>
            <article class="about-item reveal reveal-delay-2">
                <div class="about-item__icon"><i class="fas fa-user-md"></i></div>
                <h3>{{ $aboutSection->item_two_title ?? 'Expert Instructors' }}</h3>
                <p>{{ $aboutSection->item_two_content ?? 'Learn directly from experienced clinicians and educators shaping modern dentistry.' }}</p>
            </article>
            <article class="about-item reveal reveal-delay-3">
                <div class="about-item__icon"><i class="fas fa-certificate"></i></div>
                <h3>{{ $aboutSection->item_three_title ?? 'Accredited Programs' }}</h3>
                <p>{{ $aboutSection->item_three_content ?? 'Programs designed for professional growth with clear, career-ready outcomes.' }}</p>
            </article>
        </div>
    </div>
</section>
