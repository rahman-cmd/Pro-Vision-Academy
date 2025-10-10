<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro Vision Academy</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="bg-gray-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo and Title -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-md p-2 flex items-center justify-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Pro Vision Academy Logo" class="h-12 w-12 object-contain">
                        </div>
                    </div>
                    <div class="ml-4 flex flex-col">
                        <span class="text-2xl font-bold text-[#19506b] leading-tight">Pro Vision Academy</span>
                        <span class="text-sm text-gray-500 -mt-1">Dental Excellence</span>
                    </div>
                </div>
                <!-- Desktop Navigation Links -->
                <div class="desktop-nav flex items-center space-x-8">
                    <a href="#" class="text-gray-700 hover:text-[#19506b] font-medium">Home</a>
                    <a href="#" class="text-gray-700 hover:text-[#19506b] font-medium">About Us</a>
                    <a href="#" class="text-gray-700 hover:text-[#19506b] font-medium">Courses</a>
                    <a href="#" class="text-gray-700 hover:text-[#19506b] font-medium">Testimonials</a>
                    <a href="#" class="text-gray-700 hover:text-[#19506b] font-medium">Contact</a>
                </div>
                <!-- Auth Buttons (Desktop) -->
                <div class="desktop-nav flex items-center space-x-4">
                    @auth
                        <!-- User Dropdown for Authenticated Users -->
                        <div class="relative">
                            <button id="userDropdown" class="flex items-center text-gray-700 hover:text-[#19506b] font-medium focus:outline-none">
                                <i class="fas fa-user-circle text-xl mr-2"></i>
                                <span>{{ Auth::user()->first_name }}</span>
                                <i class="fas fa-chevron-down ml-2 text-sm"></i>
                            </button>
                            <div id="userDropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200">
                                @if(Auth::user()->isStudent())
                                    <a href="{{ route('student.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                                    </a>
                                @elseif(Auth::user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-tachometer-alt mr-2"></i>Admin Dashboard
                                    </a>
                                @endif
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i>Profile
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog mr-2"></i>Settings
                                </a>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Login and Register Buttons for Guests -->
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-[#19506b] font-medium px-4 py-2 rounded-md border border-gray-300 hover:border-[#19506b] transition">Login</a>
                        <a href="{{ route('register') }}" class="bg-[#19506b] text-white px-6 py-3 rounded-md font-semibold shadow hover:bg-[#163e54] transition">Register</a>
                    @endauth
                </div>
                <!-- Hamburger Icon (Mobile) -->
                <button id="mobile-menu-btn" class="mobile-nav flex flex-col justify-center items-center w-10 h-10 rounded-md border border-gray-200 lg:hidden focus:outline-none" aria-label="Open menu">
                    <span class="block w-6 h-0.5 bg-[#19506b] mb-1"></span>
                    <span class="block w-6 h-0.5 bg-[#19506b] mb-1"></span>
                    <span class="block w-6 h-0.5 bg-[#19506b]"></span>
                </button>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="mobile-menu hidden flex-col bg-gray-50 rounded-lg shadow-lg mt-2 px-6 py-4 lg:hidden">
                <a href="#" class="block py-2 text-gray-700 hover:text-[#19506b] font-medium">Home</a>
                <a href="#" class="block py-2 text-gray-700 hover:text-[#19506b] font-medium">About Us</a>
                <a href="#" class="block py-2 text-gray-700 hover:text-[#19506b] font-medium">Courses</a>
                <a href="#" class="block py-2 text-gray-700 hover:text-[#19506b] font-medium">Testimonials</a>
                <a href="#" class="block py-2 text-gray-700 hover:text-[#19506b] font-medium">Contact</a>
                
                @auth
                    <!-- Authenticated User Mobile Menu -->
                    <div class="border-t border-gray-200 mt-4 pt-4">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-user-circle text-xl text-gray-600 mr-2"></i>
                            <span class="text-gray-700 font-medium">{{ Auth::user()->first_name }}</span>
                        </div>
                        @if(Auth::user()->isStudent())
                            <a href="{{ route('student.dashboard') }}" class="block py-2 text-gray-700 hover:text-[#19506b] font-medium">
                                <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                            </a>
                        @elseif(Auth::user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="block py-2 text-gray-700 hover:text-[#19506b] font-medium">
                                <i class="fas fa-tachometer-alt mr-2"></i>Admin Dashboard
                            </a>
                        @endif
                        <a href="#" class="block py-2 text-gray-700 hover:text-[#19506b] font-medium">
                            <i class="fas fa-user mr-2"></i>Profile
                        </a>
                        <a href="#" class="block py-2 text-gray-700 hover:text-[#19506b] font-medium">
                            <i class="fas fa-cog mr-2"></i>Settings
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button type="submit" class="w-full text-left py-2 text-gray-700 hover:text-[#19506b] font-medium">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Guest User Mobile Menu -->
                    <div class="border-t border-gray-200 mt-4 pt-4 space-y-3">
                        <a href="{{ route('login') }}" class="block w-full text-center py-2 px-4 border border-gray-300 text-gray-700 rounded-md font-medium hover:border-[#19506b] hover:text-[#19506b] transition">Login</a>
                        <a href="{{ route('register') }}" class="block w-full text-center bg-[#19506b] text-white px-6 py-3 rounded-md font-semibold shadow hover:bg-[#163e54] transition">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // User dropdown toggle (Desktop)
            const userDropdown = document.getElementById('userDropdown');
            const userDropdownMenu = document.getElementById('userDropdownMenu');

            if (userDropdown && userDropdownMenu) {
                userDropdown.addEventListener('click', function(e) {
                    e.preventDefault();
                    userDropdownMenu.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!userDropdown.contains(e.target) && !userDropdownMenu.contains(e.target)) {
                        userDropdownMenu.classList.add('hidden');
                    }
                });

                // Prevent dropdown from closing when clicking inside
                userDropdownMenu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }
        });
    </script>
</body>
</html>
