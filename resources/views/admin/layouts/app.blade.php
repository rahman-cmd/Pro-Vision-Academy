<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pro Vision Academy - Admin Panel')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .sidebar-active {
            background-color: #19506b !important;
            border-left: 4px solid #3b82f6;
        }
        
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #1a2a3a;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #19506b;
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
        }

        /* Ensure sidebar is properly positioned on all screen sizes */
        @media (max-width: 1023px) {
            #sidebar {
                transform: translateX(-100%);
            }
            
            #sidebar.translate-x-0 {
                transform: translateX(0);
            }
        }

        /* Smooth transitions for all interactive elements */
        .transition-all {
            transition: all 0.3s ease-in-out;
        }

        /* Focus styles for accessibility */
        button:focus, a:focus {
            outline: 2px solid #3b82f6;
            outline-offset: 2px;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <!-- Main Container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-[#1a2a3a] text-white w-64 h-screen fixed inset-y-0 left-0 z-50 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center h-16 bg-[#19506b] border-b border-gray-700 flex-shrink-0">
                <img src="/images/logo.png" alt="Logo" class="h-8 w-8 sm:h-10 sm:w-10">
            </div>
            
            <!-- View Frontend Website Button -->
            <div class="px-2 py-3 border-b border-gray-700">
                <a href="/" target="_blank" class="flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition-colors font-medium">
                    <i class="fas fa-external-link-alt w-4 mr-2"></i>
                    <span>View Frontend Website</span>
                </a>
            </div>
            
            <nav class="flex-1 px-2 py-4 custom-scrollbar overflow-y-auto">
                <ul class="space-y-1">
                    <li>
                        <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/dashboard') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/students" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/students*') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-user-graduate w-5 mr-3"></i>
                            <span>Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/hero" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/hero') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-home w-5 mr-3"></i>
                            <span>Hero Section</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/about" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/about') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-info-circle w-5 mr-3"></i>
                            <span>About Section</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/courses" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/courses') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-book w-5 mr-3"></i>
                            <span>Courses Section</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/speakers" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/speakers') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-microphone w-5 mr-3"></i>
                            <span>Speakers Section</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/why-choose" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/why-choose') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-check-circle w-5 mr-3"></i>
                            <span>Why Choose Section</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/gallery" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/gallery') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-images w-5 mr-3"></i>
                            <span>Gallery Section</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/testimonials" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/testimonials') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-quote-left w-5 mr-3"></i>
                            <span>Testimonials Section</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/news" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/news') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-newspaper w-5 mr-3"></i>
                            <span>News Section</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/tabs" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/tabs') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-table w-5 mr-3"></i>
                            <span>Tabs Section</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/settings" class="flex items-center px-4 py-3 text-sm rounded-lg hover:bg-[#19506b] transition-colors {{ request()->is('admin/settings') ? 'sidebar-active' : '' }}">
                            <i class="fas fa-cog w-5 mr-3"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Mobile sidebar overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-h-screen">
            <!-- Top Navigation -->
            <header class="bg-[#19506b] text-white shadow-lg h-16">
                <div class="px-4 sm:px-6 lg:px-8 h-full">
                    <div class="flex justify-between items-center h-full">
                        <div class="flex items-center">
                            <button id="sidebarToggle" class="mr-3 lg:hidden text-white hover:text-gray-300 focus:outline-none focus:text-gray-300 p-2">
                                <i class="fas fa-bars text-lg"></i>
                            </button>
                            <h1 class="text-lg sm:text-xl font-bold truncate">Pro Vision Academy</h1>
                        </div>
                        <div class="flex items-center space-x-2 sm:space-x-4">
                            <!-- Notifications -->
                            <div class="relative">
                                <button class="text-white hover:text-gray-300 focus:outline-none p-2">
                                    <i class="fas fa-bell text-base sm:text-lg"></i>
                                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 sm:h-5 sm:w-5 flex items-center justify-center">3</span>
                                </button>
                            </div>
                            <!-- User Dropdown -->
                            <div class="relative">
                                <button id="userDropdown" class="flex items-center text-white hover:text-gray-300 focus:outline-none p-2">
                                    <span class="mr-2 hidden md:block text-sm">Admin</span>
                                    <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Admin" class="w-6 h-6 sm:w-8 sm:h-8 rounded-full border-2 border-white">
                                    <i class="fas fa-chevron-down ml-1 sm:ml-2 text-xs sm:text-sm"></i>
                                </button>
                                <div id="userDropdownMenu" class="absolute right-0 mt-2 w-40 sm:w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden">
                                    <a href="#" class="block px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user mr-2"></i>Profile
                                    </a>
                                    <a href="#" class="block px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-cog mr-2"></i>Settings
                                    </a>
                                    <div class="border-t border-gray-100"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left block px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-700 hover:bg-gray-100">
                                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-3 sm:p-4 lg:p-6 custom-scrollbar">
                <div class="max-w-7xl mx-auto">
                    @include('admin.layouts.alerts')
                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-[#19506b] text-white py-3 sm:py-4 mt-8 flex-shrink-0">
                <div class="max-w-7xl mx-auto px-3 sm:px-4 text-center">
                    <p class="text-xs sm:text-sm">&copy; {{ date('Y') }} Pro Vision Academy. All Rights Reserved.</p>
                </div>
            </footer>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const userDropdown = document.getElementById('userDropdown');
            const userDropdownMenu = document.getElementById('userDropdownMenu');

            // Sidebar toggle functionality
            if (sidebarToggle && sidebar && sidebarOverlay) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                    sidebarOverlay.classList.toggle('hidden');
                });

                sidebarOverlay.addEventListener('click', function() {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                });

                // Close sidebar when clicking on a link (mobile only)
                const sidebarLinks = sidebar.querySelectorAll('a');
                sidebarLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        if (window.innerWidth < 1024) {
                            sidebar.classList.add('-translate-x-full');
                            sidebarOverlay.classList.add('hidden');
                        }
                    });
                });
            }

            // User dropdown functionality
            if (userDropdown && userDropdownMenu) {
                userDropdown.addEventListener('click', function(e) {
                    e.preventDefault();
                    userDropdownMenu.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!userDropdown.contains(e.target)) {
                        userDropdownMenu.classList.add('hidden');
                    }
                });
            }

            // Flash message auto-hide
            const flashMessages = document.querySelectorAll('.flash-message');
            flashMessages.forEach(message => {
                setTimeout(() => {
                    message.classList.add('opacity-0');
                    setTimeout(() => {
                        message.remove();
                    }, 500);
                }, 5000);
            });

            // Auto-hide mobile sidebar on window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    if (sidebar) sidebar.classList.remove('-translate-x-full');
                    if (sidebarOverlay) sidebarOverlay.classList.add('hidden');
                } else {
                    if (sidebar) sidebar.classList.add('-translate-x-full');
                    if (sidebarOverlay) sidebarOverlay.classList.add('hidden');
                }
            });

            // Handle keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (sidebar && !sidebar.classList.contains('-translate-x-full')) {
                        sidebar.classList.add('-translate-x-full');
                        sidebarOverlay.classList.add('hidden');
                    }
                    if (userDropdownMenu && !userDropdownMenu.classList.contains('hidden')) {
                        userDropdownMenu.classList.add('hidden');
                    }
                }
            });
        });
    </script>
</body>
</html>