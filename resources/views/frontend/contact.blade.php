@include('frontend.layouts.header')

<section class="bg-gray-50 py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 text-center">
      <h1 class="text-3xl font-extrabold text-[#19506b]">Contact Us</h1>
      <p class="mt-2 text-gray-600">Have questions? Send us a message and we’ll get back to you.</p>
    </div>

    @if(session('success'))
      <div class="mb-6 p-4 rounded-md bg-green-50 border border-green-200 text-green-700">
        {{ session('success') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="mb-6 p-4 rounded-md bg-red-50 border border-red-200 text-red-700">
        <ul class="list-disc ml-5 space-y-1">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Contact Form -->
      <div class="bg-white shadow rounded-lg p-6">
        <form method="POST" action="{{ route('contact.submit') }}" novalidate>
          @csrf
          <div class="grid grid-cols-1 gap-4">
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700">Name<span class="text-red-500">*</span></label>
              <input id="name" name="name" type="text" value="{{ old('name') }}" required class="mt-1 block w-full rounded-md border-gray-300 focus:border-[#19506b] focus:ring-[#19506b]" placeholder="Your full name">
              @error('name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">Email<span class="text-red-500">*</span></label>
              <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-md border-gray-300 focus:border-[#19506b] focus:ring-[#19506b]" placeholder="you@example.com">
              @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
              <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="mt-1 block w-full rounded-md border-gray-300 focus:border-[#19506b] focus:ring-[#19506b]" placeholder="Optional">
              @error('phone')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="subject" class="block text-sm font-medium text-gray-700">Subject<span class="text-red-500">*</span></label>
              <input id="subject" name="subject" type="text" value="{{ old('subject') }}" required class="mt-1 block w-full rounded-md border-gray-300 focus:border-[#19506b] focus:ring-[#19506b]" placeholder="How can we help?">
              @error('subject')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="message" class="block text-sm font-medium text-gray-700">Message<span class="text-red-500">*</span></label>
              <textarea id="message" name="message" rows="5" required class="mt-1 block w-full rounded-md border-gray-300 focus:border-[#19506b] focus:ring-[#19506b]" placeholder="Write your message here...">{{ old('message') }}</textarea>
              @error('message')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="mt-6">
            <button type="submit" class="bg-[#19506b] text-white px-6 py-3 rounded-md font-semibold shadow hover:bg-[#163e54] transition">Send Message</button>
          </div>
        </form>
      </div>

      <!-- Contact Info / Map -->
      <div class="space-y-6">
        <div class="bg-white shadow rounded-lg p-6">
          <h2 class="text-xl font-semibold text-[#19506b] mb-4">Get in touch</h2>
          <ul class="space-y-3 text-gray-700">
            <li>
              <i class="fas fa-phone mr-2 text-[#19506b]"></i>
              {{ $setting->phone ?? '+8801XXXXXXXXX' }}
            </li>
            <li>
              <i class="fas fa-envelope mr-2 text-[#19506b]"></i>
              {{ $setting->email ?? 'info@example.com' }}
            </li>
            <li>
              <i class="fas fa-location-dot mr-2 text-[#19506b]"></i>
              {{ $setting->address ?? 'Address not set' }}
            </li>
          </ul>
        </div>

        @if(!empty($setting->google_maps))
          <div class="bg-white shadow rounded-lg overflow-hidden">
            <iframe src="{{ $setting->google_maps }}" class="w-full h-72 border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

@include('frontend.layouts.footer')