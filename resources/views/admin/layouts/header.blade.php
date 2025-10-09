<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro Vision Academy - Admin Panel</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .sidebar-active {
            background-color: #1a4971;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Top Navigation -->
    <header class="bg-[#19506b] text-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <button id="sidebar-toggle" class="mr-4 lg:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-xl font-bold">Pro Vision Academy</h1>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="flex items-center focus:outline-none">
                        <span class="mr-2">Admin</span>
                        <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Admin" class="w-8 h-8 rounded-full">
                    </button>
                </div>
                <a href="#" class="hover:text-gray-300">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar will be included here -->
        @include('admin.layouts.sidebar')