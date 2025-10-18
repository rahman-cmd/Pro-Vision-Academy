@include('frontend.layouts.header')

<section class="bg-gray-50 py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 text-center">
      <h1 class="text-3xl font-extrabold text-[#19506b]">Contact Us</h1>
      <p class="mt-2 text-gray-600">Have questions? Send us a message and we’ll get back to you.</p>
    </div>

    @if(session('success'))
      <div role="alert" aria-live="polite" class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 shadow-sm">
        {{ session('success') }}
      </div>
    @endif

    @if ($errors->any())
      <div role="alert" aria-live="assertive" class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 shadow-sm">
        <ul class="list-disc ml-5 space-y-1">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Contact Form -->
      <div class="bg-white shadow rounded-2xl p-6 md:p-8 border border-gray-100">
        <form method="POST" action="{{ route('contact.submit') }}" novalidate>
          @csrf
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <!-- Name -->
            <div class="md:col-span-1">
              <label for="name" class="block text-sm font-medium text-gray-700">Name<span class="text-red-500">*</span></label>
              <div class="mt-1 relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                  <i class="fas fa-user text-gray-400"></i>
                </span>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autocomplete="name" aria-required="true" aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}" aria-describedby="name-help @error('name') name-error @enderror" placeholder="Your full name" class="block w-full rounded-lg border {{ $errors->has('name') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-[#19506b] focus:ring-[#19506b]' }} bg-white pl-10 py-2.5 text-gray-900 placeholder-gray-400 shadow-sm focus:outline-none transition" />
              </div>
              <p id="name-help" class="mt-1 text-xs text-gray-500">Enter your first and last name.</p>
              @error('name')
                <p id="name-error" class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Email -->
            <div class="md:col-span-1">
              <label for="email" class="block text-sm font-medium text-gray-700">Email<span class="text-red-500">*</span></label>
              <div class="mt-1 relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                  <i class="fas fa-envelope text-gray-400"></i>
                </span>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" aria-required="true" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" aria-describedby="email-help @error('email') email-error @enderror" placeholder="you@example.com" class="block w-full rounded-lg border {{ $errors->has('email') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-[#19506b] focus:ring-[#19506b]' }} bg-white pl-10 py-2.5 text-gray-900 placeholder-gray-400 shadow-sm focus:outline-none transition" />
              </div>
              <p id="email-help" class="mt-1 text-xs text-gray-500">We’ll never share your email.</p>
              @error('email')
                <p id="email-error" class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Phone -->
            <div class="md:col-span-1">
              <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
              <div class="mt-1 relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                  <i class="fas fa-phone text-gray-400"></i>
                </span>
                <input id="phone" name="phone" type="text" value="{{ old('phone') }}" autocomplete="tel" aria-invalid="{{ $errors->has('phone') ? 'true' : 'false' }}" aria-describedby="phone-help @error('phone') phone-error @enderror" placeholder="e.g. +968XXXXXXXXX (optional)" class="block w-full rounded-lg border {{ $errors->has('phone') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-[#19506b] focus:ring-[#19506b]' }} bg-white pl-10 py-2.5 text-gray-900 placeholder-gray-400 shadow-sm focus:outline-none transition" />
              </div>
              <p id="phone-help" class="mt-1 text-xs text-gray-500">Optional — include country code.</p>
              @error('phone')
                <p id="phone-error" class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Subject -->
            <div class="md:col-span-1">
              <label for="subject" class="block text-sm font-medium text-gray-700">Subject<span class="text-red-500">*</span></label>
              <div class="mt-1 relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                  <i class="fas fa-tag text-gray-400"></i>
                </span>
                <input id="subject" name="subject" type="text" value="{{ old('subject') }}" required autocomplete="off" aria-required="true" aria-invalid="{{ $errors->has('subject') ? 'true' : 'false' }}" aria-describedby="subject-help @error('subject') subject-error @enderror" placeholder="How can we help?" class="block w-full rounded-lg border {{ $errors->has('subject') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-[#19506b] focus:ring-[#19506b]' }} bg-white pl-10 py-2.5 text-gray-900 placeholder-gray-400 shadow-sm focus:outline-none transition" />
              </div>
              <p id="subject-help" class="mt-1 text-xs text-gray-500">A short summary of your request.</p>
              @error('subject')
                <p id="subject-error" class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Message -->
            <div class="md:col-span-2">
              <label for="message" class="block text-sm font-medium text-gray-700">Message<span class="text-red-500">*</span></label>
              <div class="mt-1 relative">
                <span class="pointer-events-none absolute left-0 top-0 pl-3 pt-3 text-gray-400">
                  <i class="fas fa-comment-dots"></i>
                </span>
                <textarea id="message" name="message" rows="5" required aria-required="true" aria-invalid="{{ $errors->has('message') ? 'true' : 'false' }}" aria-describedby="message-help @error('message') message-error @enderror" placeholder="Write your message here..." class="block w-full rounded-lg border {{ $errors->has('message') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-[#19506b] focus:ring-[#19506b]' }} bg-white pl-10 py-2.5 text-gray-900 placeholder-gray-400 shadow-sm focus:outline-none transition resize-y">{{ old('message') }}</textarea>
              </div>
              <p id="message-help" class="mt-1 text-xs text-gray-500">Provide as many details as possible. We typically respond within 24 hours.</p>
              @error('message')
                <p id="message-error" class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="mt-6">
            <button type="submit" class="inline-flex items-center gap-2 bg-[#19506b] text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-[#163e54] active:scale-[0.99] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-[#19506b] transition w-full md:w-auto">
              <i class="fas fa-paper-plane"></i>
              Send Message
            </button>
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