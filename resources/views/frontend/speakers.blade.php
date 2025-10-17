<!-- Speakers Section -->
<section class="bg-white py-10">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-[#19506b] mb-6">Speakers</h2>
        <p class="text-xl text-center text-gray-500 mb-14 max-w-3xl mx-auto">We are honoured to have welcomed leading experts from across the world.</p>

        @php
            $hasInternational = isset($internationalSpeakers) && ($internationalSpeakers->count() > 0);
            $hasLocal = isset($localSpeakers) && ($localSpeakers->count() > 0);
        @endphp

        @if($hasInternational)
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-[#19506b] mb-6 text-center">International Speakers</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 justify-center items-stretch">
                    @foreach($internationalSpeakers as $speaker)
                        <div class="flex flex-col items-center bg-gray-50 rounded-xl shadow p-6 w-full">
                            @php
                                $img = $speaker->image ? (\Illuminate\Support\Str::startsWith($speaker->image, ['http://', 'https://']) ? $speaker->image : asset('storage/'.$speaker->image)) : 'https://ui-avatars.com/api/?name='.urlencode($speaker->full_name).'&background=b8e0fa&color=19506b';
                            @endphp
                            <img src="{{ $img }}" alt="{{ $speaker->full_title }}" class="w-28 h-28 rounded-full object-cover mb-4 border-4 border-[#b8e0fa]">
                            <div class="font-bold text-lg text-[#19506b]">{{ $speaker->full_title }}</div>
                            <div class="text-gray-500 text-sm mb-1">{{ $speaker->country }}</div>
                            <div class="text-[#3399cc] font-medium">{{ $speaker->specialization }}</div>
                            @if(!empty($speaker->institution))
                                <div class="text-xs text-gray-400 mt-1">{{ $speaker->institution }}</div>
                            @endif
                            <div class="flex gap-3 mt-3">
                                @if(!empty($speaker->linkedin))
                                    <a href="{{ $speaker->linkedin }}" target="_blank" rel="noopener" class="text-blue-600 hover:text-blue-800 text-sm">LinkedIn</a>
                                @endif
                                @if(!empty($speaker->website))
                                    <a href="{{ $speaker->website }}" target="_blank" rel="noopener" class="text-gray-600 hover:text-gray-800 text-sm">Website</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($hasLocal)
            <div>
                <h3 class="text-2xl font-bold text-[#19506b] mb-6 text-center">Local Experts</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 justify-center items-stretch">
                    @foreach($localSpeakers as $speaker)
                        <div class="flex flex-col items-center bg-gray-50 rounded-xl shadow p-6 w-full">
                            @php
                                $img = $speaker->image ? (\Illuminate\Support\Str::startsWith($speaker->image, ['http://', 'https://']) ? $speaker->image : asset('storage/'.$speaker->image)) : 'https://ui-avatars.com/api/?name='.urlencode($speaker->full_name).'&background=b8e0fa&color=19506b';
                            @endphp
                            <img src="{{ $img }}" alt="{{ $speaker->full_title }}" class="w-28 h-28 rounded-full object-cover mb-4 border-4 border-[#b8e0fa]">
                            <div class="font-bold text-lg text-[#19506b]">{{ $speaker->full_title }}</div>
                            <div class="text-gray-500 text-sm mb-1">{{ $speaker->country }}</div>
                            <div class="text-[#3399cc] font-medium">{{ $speaker->specialization }}</div>
                            @if(!empty($speaker->institution))
                                <div class="text-xs text-gray-400 mt-1">{{ $speaker->institution }}</div>
                            @endif
                            <div class="flex gap-3 mt-3">
                                @if(!empty($speaker->linkedin))
                                    <a href="{{ $speaker->linkedin }}" target="_blank" rel="noopener" class="text-blue-600 hover:text-blue-800 text-sm">LinkedIn</a>
                                @endif
                                @if(!empty($speaker->website))
                                    <a href="{{ $speaker->website }}" target="_blank" rel="noopener" class="text-gray-600 hover:text-gray-800 text-sm">Website</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if(!$hasInternational && !$hasLocal)
            <div class="text-center text-gray-500">No speakers available at the moment.</div>
        @endif
    </div>
</section>