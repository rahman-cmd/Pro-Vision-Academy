@php($brandName = optional($setting ?? null)->business_name ?: 'Pro Vision Academy')
<section class="hero">
    <div class="hero__media" aria-hidden="true">
        <img
            src="{{ image_url($heroSection->background_image, 'https://images.unsplash.com/photo-1606811841689-23dfddce3e95?auto=format&fit=crop&w=2000&q=80') }}"
            alt=""
        >
        <div class="hero__shade"></div>
    </div>

    <div class="hero__content">
        <p class="hero__brand">{{ $brandName }}</p>
        <h1 class="hero__title">
            {{ $heroSection->title }}
            @if(!empty($heroSection->subtitle))
                <span> — {{ $heroSection->subtitle }}</span>
            @endif
        </h1>
        @if(!empty($heroSection->description))
            <p class="hero__text">{{ $heroSection->description }}</p>
        @endif
        <div class="hero__actions">
            @if($heroSection->hasButton())
                <a href="{{ $heroSection->button_link }}" class="btn-light">{{ $heroSection->button_text }}</a>
                <a href="{{ route('register') }}" class="btn-outline-light">Register Now</a>
            @else
                <a href="{{ route('home') }}#courses" class="btn-light">Explore Courses</a>
                <a href="{{ route('register') }}" class="btn-outline-light">Register Now</a>
            @endif
        </div>
    </div>
</section>
