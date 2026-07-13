@php($setting = $setting ?? \App\Models\Setting::current())
<footer class="site-footer">
    <div class="section__inner">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ $setting?->logo_url ?? asset('images/logo.png') }}" alt="{{ $setting->business_name ?? 'Pro Vision Academy' }} Logo" class="h-12 w-12 object-contain">
                    <span class="site-footer__brand-name">{{ $setting->business_name ?? 'Pro Vision Academy' }}</span>
                </div>
                <p class="leading-relaxed mb-5">{{ $setting->description ?? 'Advancing dental careers through world-class education and clinical training.' }}</p>
                <div class="flex gap-4 text-lg">
                    @if(!empty($setting?->facebook))
                        <a href="{{ $setting->facebook }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(!empty($setting?->twitter))
                        <a href="{{ $setting->twitter }}" target="_blank" rel="noopener noreferrer" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if(!empty($setting?->linkedin))
                        <a href="{{ $setting->linkedin }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if(!empty($setting?->instagram))
                        <a href="{{ $setting->instagram }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    @endif
                </div>
            </div>

            <div>
                <h4>Quick Links</h4>
                <ul class="space-y-2.5">
                    <li><a href="{{ route('home') }}#about">About Us</a></li>
                    <li><a href="{{ route('home') }}#courses">Courses</a></li>
                    <li><a href="{{ route('home') }}#speakers">Speakers</a></li>
                    <li><a href="{{ route('home') }}#testimonials">Testimonials</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4>Contact</h4>
                <ul class="space-y-3">
                    <li class="flex gap-2 items-start">
                        <i class="fas fa-phone-alt mt-1 text-[var(--mint)]"></i>
                        <a href="tel:{{ preg_replace('/[^\d\+]/', '', $setting->phone ?? '') }}">{{ $setting->phone ?? '+968 22 555313' }}</a>
                    </li>
                    <li class="flex gap-2 items-start">
                        <i class="fas fa-envelope mt-1 text-[var(--mint)]"></i>
                        <a href="mailto:{{ $setting->email ?? 'info@dentalcourse.om' }}">{{ $setting->email ?? 'info@dentalcourse.om' }}</a>
                    </li>
                    <li class="flex gap-2 items-start">
                        <i class="fas fa-map-marker-alt mt-1 text-[var(--mint)]"></i>
                        <span>{{ $setting->address ?? 'London Dental Center, North Mawaleh, Near Al Mouj Roundabout, Oman.' }}</span>
                    </li>
                </ul>
            </div>

            <div>
                <h4>Ready to Start?</h4>
                <p class="mb-5 leading-relaxed">Join dental professionals advancing their clinical careers with us.</p>
                <a href="{{ route('register') }}" class="btn-primary w-full">Register Now</a>
            </div>
        </div>

        <hr class="my-10 border-white/10">
        <div class="text-center text-sm text-white/50">
            © {{ now()->year }} {{ $setting->business_name ?? 'Pro Vision Academy' }}. {{ $setting->copyright ?? 'All rights reserved.' }}
        </div>
    </div>
</footer>

<script src="{{ asset('js/main.js') }}?v=3"></script>
</body>
</html>
