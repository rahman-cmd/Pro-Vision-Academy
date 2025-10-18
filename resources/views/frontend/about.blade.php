<!-- About Section -->
<section id="about" class="bg-gray-50 py-10">
	<div class="max-w-7xl mx-auto px-4">
		<h2 class="text-4xl md:text-5xl font-bold text-center text-[#1a2a3a] mb-6">{{ $aboutSection->title ?? 'About Pro Vision Academy' }}</h2>
		<p class="text-xl text-center text-gray-500 mb-16 max-w-3xl mx-auto">{{ $aboutSection->content ?? 'We are dedicated to advancing dental education through innovative training programs, expert instruction, and state-of-the-art facilities.' }}</p>
		<div class="flex flex-col md:flex-row justify-center items-start md:items-stretch gap-12 md:gap-8">
			<!-- Card 1 -->
			<div class="flex-1 flex flex-col items-center text-center">
				<div class="bg-[#19506b] rounded-full w-20 h-20 flex items-center justify-center mb-6">
					<i class="fas fa-microscope text-white text-4xl"></i>
				</div>
				<h3 class="text-2xl font-bold text-[#1a2a3a] mb-2">{{ $aboutSection->item_one_title ?? 'Advanced Technology' }}</h3>
				<p class="text-gray-500 text-lg">{{ $aboutSection->item_one_content ?? 'Learn with the latest dental technology and equipment used in modern practices worldwide.' }}</p>
			</div>
			<!-- Card 2 -->
			<div class="flex-1 flex flex-col items-center text-center">
				<div class="bg-[#3399cc] rounded-full w-20 h-20 flex items-center justify-center mb-6">
					<i class="fas fa-user-md text-white text-4xl"></i>
				</div>
				<h3 class="text-2xl font-bold text-[#1a2a3a] mb-2">{{ $aboutSection->item_two_title ?? 'Expert Instructors' }}</h3>
				<p class="text-gray-500 text-lg">{{ $aboutSection->item_two_content ?? 'Learn from renowned dental professionals with decades of experience and expertise.' }}</p>
			</div>
			<!-- Card 3 -->
			<div class="flex-1 flex flex-col items-center text-center">
				<div class="bg-[#b8e0fa] rounded-full w-20 h-20 flex items-center justify-center mb-6">
					<i class="fas fa-certificate text-[#19506b] text-4xl"></i>
				</div>
				<h3 class="text-2xl font-bold text-[#1a2a3a] mb-2">{{ $aboutSection->item_three_title ?? 'Accredited Programs' }}</h3>
				<p class="text-gray-500 text-lg">{{ $aboutSection->item_three_content ?? 'All our courses are fully accredited and recognized by international dental boards.' }}</p>
			</div>
		</div>
	</div>
</section>