<section id="courses" class="section section--white">
    <div class="section__inner">
        <div class="section__head reveal">
            <span class="section__eyebrow">Programs</span>
            <h2 class="section__title">Upcoming Courses</h2>
            <p class="section__lede">Hands-on dental education designed for clinicians ready to sharpen skill and confidence.</p>
        </div>

        @php
            $hasFeatured = isset($featuredCourses) && count($featuredCourses) > 0;
        @endphp

        @if($hasFeatured)
            <div class="course-grid">
                @foreach($featuredCourses as $course)
                    <article class="course-card reveal">
                        <div class="course-card__media">
                            <img
                                src="{{ image_url($course->image, 'https://images.unsplash.com/photo-1606811841689-23dfddce3e95?auto=format&fit=crop&w=800&q=80') }}"
                                alt="{{ $course->title }}"
                            >
                        </div>
                        <div class="course-card__body">
                            <div class="course-card__meta">
                                <span class="course-level">{{ ucfirst($course->level) }}</span>
                                <span class="course-price">OMR {{ number_format($course->effective_price ?? $course->price, 2) }}</span>
                            </div>
                            <h3>{{ $course->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($course->description, 110) }}</p>
                            <div class="course-card__date">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                {{ optional($course->start_date)->format('M d, Y') }}
                                @if($course->end_date)
                                    – {{ optional($course->end_date)->format('M d, Y') }}
                                @endif
                            </div>
                            <a href="{{ route('courses') }}" class="btn-primary">Learn More</a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10 text-center reveal">
                <a href="{{ route('courses') }}" class="btn-ghost">View All Courses</a>
            </div>
        @endif
    </div>
</section>
