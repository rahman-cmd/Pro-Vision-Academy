<!-- Home Courses Section -->
<section class="bg-[#fff] py-10">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl md:text-4xl font-bold text-[#232b36]" style="color:#232b36;">Upcoming Courses</h2>
            <a href="{{ route('courses') }}" class="hidden md:inline-block bg-[#19506b] text-white font-semibold py-2 px-4 rounded-lg hover:bg-[#163e54] transition">View All</a>
        </div>
        <p class="text-lg text-gray-400 mb-8">Discover our comprehensive range of dental education programs</p>

        @php
            $hasFeatured = isset($featuredCourses) && count($featuredCourses) > 0;
            $hasUpcoming = isset($upcomingCourses) && count($upcomingCourses) > 0;
        @endphp

        @if($hasFeatured)
            <h3 class="text-2xl font-semibold text-[#232b36] mb-4">Featured Courses</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @foreach($featuredCourses as $course)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                        @if($course->image)
                            <img src="{{ asset('storage/'.$course->image) }}" alt="{{ $course->title }}" class="w-full h-48 object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=600&q=80" alt="{{ $course->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-5 flex flex-col flex-1">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-xs font-semibold px-3 py-1 rounded-full 
                                    @switch($course->level)
                                        @case('advanced') bg-[#19506b] text-white @break
                                        @case('intermediate') bg-[#3399cc] text-white @break
                                        @default bg-[#b8e0fa] text-[#19506b]
                                    @endswitch">
                                    {{ ucfirst($course->level) }}
                                </span>
                                <span class="text-[#19506b] text-base font-bold">OMR {{ number_format($course->effective_price ?? $course->price, 2) }}</span>
                            </div>
                            <h4 class="text-lg font-bold text-[#232b36] mb-1">{{ $course->title }}</h4>
                            <p class="text-gray-500 text-sm mb-3">{{ Str::limit($course->description, 90) }}</p>
                            <div class="flex items-center text-gray-400 text-xs mb-4">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                {{ optional($course->start_date)->format('M d, Y') }}
                                @if($course->end_date)
                                    - {{ optional($course->end_date)->format('M d, Y') }}
                                @endif
                            </div>
                            <a href="{{ route('courses') }}" class="mt-auto bg-[#19506b] text-white font-semibold py-2 rounded-lg text-center hover:bg-[#163e54] transition">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if($hasUpcoming)
            <h3 class="text-2xl font-semibold text-[#232b36] mb-4">Upcoming Courses</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($upcomingCourses as $course)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                        @if($course->image)
                            <img src="{{ asset('storage/'.$course->image) }}" alt="{{ $course->title }}" class="w-full h-48 object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1520880867055-1e30d1cb001c?auto=format&fit=crop&w=600&q=80" alt="{{ $course->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-5 flex flex-col flex-1">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-xs font-semibold px-3 py-1 rounded-full 
                                    @switch($course->level)
                                        @case('advanced') bg-[#19506b] text-white @break
                                        @case('intermediate') bg-[#3399cc] text-white @break
                                        @default bg-[#b8e0fa] text-[#19506b]
                                    @endswitch">
                                    {{ ucfirst($course->level) }}
                                </span>
                                <span class="text-[#19506b] text-base font-bold">OMR {{ number_format($course->effective_price ?? $course->price, 2) }}</span>
                            </div>
                            <h4 class="text-lg font-bold text-[#232b36] mb-1">{{ $course->title }}</h4>
                            <p class="text-gray-500 text-sm mb-3">{{ Str::limit($course->description, 90) }}</p>
                            <div class="flex items-center text-gray-400 text-xs mb-4">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                {{ optional($course->start_date)->format('M d, Y') }}
                                @if($course->end_date)
                                    - {{ optional($course->end_date)->format('M d, Y') }}
                                @endif
                            </div>
                            <a href="{{ route('courses') }}" class="mt-auto bg-[#19506b] text-white font-semibold py-2 rounded-lg text-center hover:bg-[#163e54] transition">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-8 md:hidden">
            <a href="{{ route('courses') }}" class="w-full inline-block bg-[#19506b] text-white font-semibold py-3 px-4 rounded-lg text-center hover:bg-[#163e54] transition">View All Courses</a>
        </div>
    </div>
</section>