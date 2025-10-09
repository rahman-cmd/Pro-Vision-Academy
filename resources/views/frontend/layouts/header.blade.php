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
                <!-- Register Button (Desktop) -->
                <div class="desktop-nav">
                    <a href="#" class="bg-[#19506b] text-white px-6 py-3 rounded-md font-semibold shadow hover:bg-[#163e54] transition">Register Now</a>
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
                <a href="#" class="block mt-4 bg-[#19506b] text-white px-6 py-3 rounded-md font-semibold shadow hover:bg-[#163e54] transition text-center">Register Now</a>
            </div>
        </div>
    </nav>
