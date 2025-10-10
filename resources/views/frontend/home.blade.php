@include('frontend.layouts.header')

{{-- Hero Section --}}
@if($heroSections->count() > 0)
    @include('frontend.hero', ['heroSections' => $heroSections])
@endif

{{-- About Section --}}
@if($aboutSection)
    @include('frontend.about', ['aboutSection' => $aboutSection])
@endif

{{-- Courses Section --}}
@if($featuredCourses->count() > 0 || $upcomingCourses->count() > 0)
    @include('frontend.courses', [
        'featuredCourses' => $featuredCourses,
        'upcomingCourses' => $upcomingCourses
    ])
@endif

{{-- Speakers Section --}}
@if($internationalSpeakers->count() > 0 || $localSpeakers->count() > 0)
    @include('frontend.speakers', [
        'internationalSpeakers' => $internationalSpeakers,
        'localSpeakers' => $localSpeakers
    ])
@endif

{{-- Why Choose Section --}}
@if($whyChooseSections->count() > 0)
    @include('frontend.why_choose', ['whyChooseSections' => $whyChooseSections])
@endif

{{-- Gallery Section --}}
@if($galleryItems->count() > 0)
    @include('frontend.gallery', ['galleryItems' => $galleryItems])
@endif

{{-- Testimonials Section --}}
@if($testimonials->count() > 0)
    @include('frontend.testimonials', ['testimonials' => $testimonials])
@endif

{{-- News Section --}}
@if($recentNews->count() > 0)
    @include('frontend.news', ['recentNews' => $recentNews])
@endif

{{-- Tabs Section --}}
@include('frontend.tabs')

@include('frontend.layouts.footer')