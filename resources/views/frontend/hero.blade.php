<!-- Hero Section -->
<section class="bg-gradient-to-br from-[#19506b] to-[#3377a3] min-h-[700px] flex items-center">
	<div class="max-w-7xl mx-auto w-full flex flex-col lg:flex-row items-center justify-between px-6 py-16 gap-12">
		<!-- Left: Text Content -->
		<div class="flex-1 text-white max-w-xl">
			<h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
				{{ $heroSection->title }}
				@if(!empty($heroSection->subtitle))<br><span class="text-[#b8d6ea]">{{ $heroSection->subtitle }}</span>@endif
			</h1>
			@if(!empty($heroSection->description))
			<p class="text-lg md:text-xl text-[#cbe5fa] mb-10">{{ $heroSection->description }}</p>
			@endif
			<div class="flex flex-col sm:flex-row gap-4">
				@if($heroSection->hasButton())
					<a href="{{ $heroSection->button_link }}" class="bg-white text-[#19506b] font-semibold px-8 py-4 rounded-lg shadow hover:bg-[#e6f0f7] transition text-lg text-center">{{ $heroSection->button_text }}</a>
				@endif
			</div>
		</div>
		<!-- Right: Image Content -->
		<div class="flex-1 flex flex-col items-center relative">
			<img src="{{ $heroSection->background_image ? asset('storage/'.$heroSection->background_image) : 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $heroSection->title }}" class="rounded-2xl shadow-2xl w-full max-w-xl object-cover">
			<!-- Badge -->
			<div class="absolute -bottom-10 left-1/2 -translate-x-1/2 bg-white rounded-xl shadow-lg flex items-center px-8 py-6 gap-4 w-[320px]">
				<div class="bg-[#e6f0f7] p-3 rounded-full">
					<i class="fas fa-certificate text-[#19506b] text-2xl"></i>
				</div>
				<div>
					<div class="font-bold text-[#19506b] text-xl">500+</div>
					<div class="text-gray-500 text-base">Certified Dentists</div>
				</div>
			</div>
        </div>
    </div>
</section>