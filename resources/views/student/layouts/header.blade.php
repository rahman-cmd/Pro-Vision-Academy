<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pro Vision Academy - Student Portal')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        .dropdown-menu {
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .dropdown-menu.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }
        @media (max-width: 768px) {
            .mobile-dropdown {
                position: fixed;
                top: 64px;
                right: 0;
                left: 0;
                width: 100%;
                z-index: 50;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Top Navigation -->
    <nav class="fixed top-0 left-0 right-0 bg-blue-600 text-white shadow-lg z-50 lg:left-64">
        <div class="px-3 sm:px-4 py-3">
            <div class="flex items-center justify-between">
                <!-- Left side -->
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <button id="sidebar-toggle" class="lg:hidden text-white hover:text-gray-200 p-1">
                        <i class="fas fa-bars text-lg sm:text-xl"></i>
                    </button>
                    <div class="flex items-center space-x-1 sm:space-x-2">
                        <i class="fas fa-graduation-cap text-xl sm:text-2xl"></i>
                        <span class="text-sm sm:text-xl font-bold truncate">Pro Vision Academy</span>
                    </div>
                </div>
                
                <!-- Right side -->
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <!-- Notifications -->
                    <div class="relative">
                        <button class="text-white hover:text-gray-200 relative p-1">
                            <i class="fas fa-bell text-sm sm:text-lg"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-xs rounded-full h-3 w-3 sm:h-4 sm:w-4 flex items-center justify-center text-xs">3</span>
                        </button>
                    </div>
                    
                    <!-- User Menu -->
                    <div class="relative">
                        <button id="userDropdown" class="flex items-center text-white hover:text-gray-300 focus:outline-none p-2">
                            <span class="mr-2 hidden sm:block text-sm">Student</span>
                            <i class="fas fa-user-circle text-xl sm:text-2xl"></i>
                            <i class="fas fa-chevron-down ml-1 sm:ml-2 text-xs sm:text-sm"></i>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div id="userDropdownMenu" class="absolute right-0 mt-2 w-40 sm:w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden">
                            <a href="{{ route('student.profile') }}" class="block px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i>Profile
                            </a>
                            <a href="{{ route('student.settings') }}" class="block px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a>
                            <div class="border-t border-gray-100"></div>
                            <a href="#" class="block px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-700 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Main Content Wrapper -->
    <div class="pt-16">
        
    <script>
        // User dropdown toggle
        document.addEventListener('DOMContentLoaded', function() {
            const userDropdown = document.getElementById('userDropdown');
            const userDropdownMenu = document.getElementById('userDropdownMenu');
            
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
        });
    </script>