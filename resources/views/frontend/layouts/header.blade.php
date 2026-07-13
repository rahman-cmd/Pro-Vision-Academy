@php($setting = $setting ?? \App\Models\Setting::current())
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting->business_name ?? 'Pro Vision Academy' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=3">
    <link rel="icon" href="{{ $setting?->favicon_url ?? asset('images/favicon.ico') }}" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</head>
<body class="site-body">
    <nav class="site-nav" id="site-nav">
        <div class="site-nav__inner">
            <a href="{{ route('home') }}" class="site-brand">
                <img src="{{ $setting?->logo_url ?? asset('images/logo.png') }}" alt="{{ $setting->business_name ?? 'Pro Vision Academy' }} Logo" class="site-brand__logo">
                <span class="site-brand__text">
                    <span class="site-brand__name">{{ $setting->business_name ?? 'Pro Vision Academy' }}</span>
                    <span class="site-brand__tag">Dental Excellence</span>
                </span>
            </a>

            <div class="desktop-nav site-nav__links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('home') }}#about">About</a>
                <a href="{{ route('home') }}#courses">Courses</a>
                <a href="{{ route('home') }}#speakers">Speakers</a>
                <a href="{{ route('home') }}#testimonials">Stories</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>

            <div class="desktop-nav site-nav__actions">
                @auth
                    <div class="relative">
                        <button id="userDropdownButton" type="button" data-dropdown-toggle="userDropdownMenu" class="site-nav__user">
                            <i class="fas fa-user-circle"></i>
                            <span>{{ Auth::user()->first_name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div id="userDropdownMenu" class="z-50 hidden absolute right-0 mt-2 w-52 bg-white rounded-xl shadow-lg py-2 border border-[var(--line)]">
                            @if(Auth::user()->isStudent())
                                <a href="{{ route('student.dashboard') }}" class="block px-4 py-2.5 text-sm text-[var(--ink)] hover:bg-[var(--fog)]">Dashboard</a>
                            @elseif(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2.5 text-sm text-[var(--ink)] hover:bg-[var(--fog)]">Admin Dashboard</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2.5 text-sm text-[var(--ink)] hover:bg-[var(--fog)]">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn-ghost">Login</a>
                    <a href="{{ route('register') }}" class="btn-primary">Register</a>
                @endauth
            </div>

            <button id="mobile-menu-btn" type="button" class="mobile-nav site-nav__burger" aria-label="Open menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>

        <div id="mobile-menu" class="mobile-menu site-nav__mobile hidden">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('home') }}#about">About</a>
            <a href="{{ route('home') }}#courses">Courses</a>
            <a href="{{ route('home') }}#speakers">Speakers</a>
            <a href="{{ route('home') }}#testimonials">Stories</a>
            <a href="{{ route('contact') }}">Contact</a>
            @auth
                <div class="site-nav__mobile-auth">
                    @if(Auth::user()->isStudent())
                        <a href="{{ route('student.dashboard') }}">Dashboard</a>
                    @elseif(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            @else
                <div class="site-nav__mobile-auth">
                    <a href="{{ route('login') }}" class="btn-ghost">Login</a>
                    <a href="{{ route('register') }}" class="btn-primary">Register</a>
                </div>
            @endauth
        </div>
    </nav>
