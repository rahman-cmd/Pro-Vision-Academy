@php
    $setting = $setting ?? \App\Models\Setting::current();
    $adminUser = auth()->user();
    $adminName = $adminUser->first_name ?? $adminUser->name ?? 'Admin';
    $adminInitial = strtoupper(substr($adminName, 0, 1));
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', ($setting->business_name ?? 'Pro Vision Academy') . ' — Admin')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v=1">
    <link rel="icon" href="{{ $setting?->favicon_url ?? asset('images/favicon.ico') }}" type="image/x-icon">
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside id="sidebar" class="admin-sidebar">
            <div class="admin-sidebar__brand">
                <img src="{{ $setting?->logo_url ?? asset('images/logo.png') }}" alt="Logo">
                <div class="admin-sidebar__brand-text">
                    <span class="admin-sidebar__brand-name">{{ $setting->business_name ?? 'Pro Vision Academy' }}</span>
                    <span class="admin-sidebar__brand-tag">Admin Panel</span>
                </div>
            </div>

            <a href="{{ route('home') }}" target="_blank" class="admin-sidebar__viewsite">
                <i class="fas fa-external-link-alt"></i>
                View Website
            </a>

            <nav class="admin-sidebar__nav custom-scrollbar">
                <div class="admin-nav-label">Overview</div>
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                    <i class="fas fa-gauge-high"></i><span>Dashboard</span>
                </a>
                <a href="{{ route('admin.students') }}" class="admin-nav-link {{ request()->routeIs('admin.students') ? 'is-active' : '' }}">
                    <i class="fas fa-user-graduate"></i><span>Students</span>
                </a>

                <div class="admin-nav-label">Website Content</div>
                <a href="{{ route('admin.hero.index') }}" class="admin-nav-link {{ request()->routeIs('admin.hero.*') ? 'is-active' : '' }}">
                    <i class="fas fa-panorama"></i><span>Hero</span>
                </a>
                <a href="{{ route('admin.about.index') }}" class="admin-nav-link {{ request()->routeIs('admin.about.*') ? 'is-active' : '' }}">
                    <i class="fas fa-circle-info"></i><span>About</span>
                </a>
                <a href="{{ route('admin.courses.index') }}" class="admin-nav-link {{ request()->routeIs('admin.courses.*') ? 'is-active' : '' }}">
                    <i class="fas fa-book-open"></i><span>Courses</span>
                </a>
                <a href="{{ route('admin.speakers.index') }}" class="admin-nav-link {{ request()->routeIs('admin.speakers.*') ? 'is-active' : '' }}">
                    <i class="fas fa-microphone-lines"></i><span>Speakers</span>
                </a>
                <a href="{{ route('admin.why-choose.index') }}" class="admin-nav-link {{ request()->routeIs('admin.why-choose.*') ? 'is-active' : '' }}">
                    <i class="fas fa-shield-halved"></i><span>Why Choose</span>
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="admin-nav-link {{ request()->routeIs('admin.gallery.*') ? 'is-active' : '' }}">
                    <i class="fas fa-images"></i><span>Gallery</span>
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="admin-nav-link {{ request()->routeIs('admin.testimonials.*') ? 'is-active' : '' }}">
                    <i class="fas fa-quote-left"></i><span>Testimonials</span>
                </a>
                <a href="{{ route('admin.news.index') }}" class="admin-nav-link {{ request()->routeIs('admin.news.*') ? 'is-active' : '' }}">
                    <i class="fas fa-newspaper"></i><span>News</span>
                </a>
                <a href="{{ route('admin.tabs.index') }}" class="admin-nav-link {{ request()->routeIs('admin.tabs.index') ? 'is-active' : '' }}">
                    <i class="fas fa-table-cells"></i><span>Tabs</span>
                </a>

                <div class="admin-nav-label">System</div>
                <a href="{{ route('admin.settings.index') }}" class="admin-nav-link {{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}">
                    <i class="fas fa-gear"></i><span>Settings</span>
                </a>
            </nav>
        </aside>

        <div id="sidebarOverlay" class="admin-sidebar__overlay"></div>

        <div class="admin-main">
            <header class="admin-topbar">
                <div class="admin-topbar__inner">
                    <div class="admin-topbar__left">
                        <button id="sidebarToggle" type="button" class="admin-topbar__menu" aria-label="Toggle sidebar">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div>
                            <h1 class="admin-topbar__title">@yield('page_title', 'Admin Dashboard')</h1>
                            <div class="admin-topbar__subtitle">@yield('page_subtitle', 'Manage your dental academy website')</div>
                        </div>
                    </div>

                    <div class="admin-topbar__right">
                        <div class="relative">
                            <button id="userDropdown" type="button" class="admin-user-btn">
                                <span class="admin-user-avatar">{{ $adminInitial }}</span>
                                <span>{{ $adminName }}</span>
                                <i class="fas fa-chevron-down text-xs text-[var(--admin-muted)]"></i>
                            </button>
                            <div id="userDropdownMenu" class="admin-dropdown hidden">
                                <a href="{{ route('admin.settings.index') }}"><i class="fas fa-gear"></i> Settings</a>
                                <a href="{{ route('home') }}" target="_blank"><i class="fas fa-globe"></i> Website</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"><i class="fas fa-right-from-bracket"></i> Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="admin-content">
                <div class="admin-content__wrap">
                    @include('admin.layouts.alerts')
                    @yield('content')
                </div>
            </main>

            <footer class="admin-footer">
                © {{ date('Y') }} {{ $setting->business_name ?? 'Pro Vision Academy' }}. All rights reserved.
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var sidebar = document.getElementById('sidebar');
            var overlay = document.getElementById('sidebarOverlay');
            var toggle = document.getElementById('sidebarToggle');
            var userBtn = document.getElementById('userDropdown');
            var userMenu = document.getElementById('userDropdownMenu');

            function closeSidebar() {
                sidebar.classList.remove('is-open');
                overlay.classList.remove('is-visible');
            }

            function openSidebar() {
                sidebar.classList.add('is-open');
                overlay.classList.add('is-visible');
            }

            if (toggle && sidebar && overlay) {
                toggle.addEventListener('click', function () {
                    if (sidebar.classList.contains('is-open')) closeSidebar();
                    else openSidebar();
                });
                overlay.addEventListener('click', closeSidebar);
                sidebar.querySelectorAll('a').forEach(function (link) {
                    link.addEventListener('click', function () {
                        if (window.innerWidth < 1024) closeSidebar();
                    });
                });
            }

            if (userBtn && userMenu) {
                userBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    userMenu.classList.toggle('hidden');
                });
                document.addEventListener('click', function () {
                    userMenu.classList.add('hidden');
                });
            }

            document.querySelectorAll('.flash-message').forEach(function (message) {
                setTimeout(function () {
                    message.classList.add('opacity-0');
                    setTimeout(function () { message.remove(); }, 400);
                }, 4500);
            });

            window.addEventListener('resize', function () {
                if (window.innerWidth >= 1024) closeSidebar();
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeSidebar();
                    if (userMenu) userMenu.classList.add('hidden');
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
