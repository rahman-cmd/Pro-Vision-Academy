@extends('admin.layouts.app')

@section('title', 'Dashboard - Pro Vision Academy Admin')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                    <i class="fas fa-book text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Courses Count</h3>
                    <p class="text-2xl font-bold text-gray-800">3</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                    <i class="fas fa-microphone text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Speakers Count</h3>
                    <p class="text-2xl font-bold text-gray-800">5</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                    <i class="fas fa-images text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Gallery Images</h3>
                    <p class="text-2xl font-bold text-gray-800">6</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-orange-100 text-orange-600 mr-4">
                    <i class="fas fa-user-graduate text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Students</h3>
                    <p class="text-2xl font-bold text-gray-800">24</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                    <i class="fas fa-quote-left text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Testimonials</h3>
                    <p class="text-2xl font-bold text-gray-800">3</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Students List Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Recent Students</h2>
            <a href="/admin/students" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                <i class="fas fa-plus mr-2"></i>View All Students
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Student Card 1 -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:shadow-md transition">
                <div class="flex items-center mb-3">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Student" class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <h3 class="font-semibold text-gray-800">Ahmed Hassan</h3>
                        <p class="text-sm text-gray-600">Dental Surgery Course</p>
                    </div>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">Active</span>
                    <span class="text-gray-500">Enrolled: Jan 2024</span>
                </div>
            </div>

            <!-- Student Card 2 -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:shadow-md transition">
                <div class="flex items-center mb-3">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Student" class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <h3 class="font-semibold text-gray-800">Fatima Al-Zahra</h3>
                        <p class="text-sm text-gray-600">Orthodontics Course</p>
                    </div>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">Active</span>
                    <span class="text-gray-500">Enrolled: Dec 2023</span>
                </div>
            </div>

            <!-- Student Card 3 -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:shadow-md transition">
                <div class="flex items-center mb-3">
                    <img src="https://randomuser.me/api/portraits/men/56.jpg" alt="Student" class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <h3 class="font-semibold text-gray-800">Omar Khalil</h3>
                        <p class="text-sm text-gray-600">Periodontics Course</p>
                    </div>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">Pending</span>
                    <span class="text-gray-500">Enrolled: Feb 2024</span>
                </div>
            </div>

            <!-- Student Card 4 -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:shadow-md transition">
                <div class="flex items-center mb-3">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Student" class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <h3 class="font-semibold text-gray-800">Maryam Ibrahim</h3>
                        <p class="text-sm text-gray-600">Endodontics Course</p>
                    </div>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">Active</span>
                    <span class="text-gray-500">Enrolled: Jan 2024</span>
                </div>
            </div>

            <!-- Student Card 5 -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:shadow-md transition">
                <div class="flex items-center mb-3">
                    <img src="https://randomuser.me/api/portraits/men/72.jpg" alt="Student" class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <h3 class="font-semibold text-gray-800">Yusuf Mahmoud</h3>
                        <p class="text-sm text-gray-600">Prosthodontics Course</p>
                    </div>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">Active</span>
                    <span class="text-gray-500">Enrolled: Nov 2023</span>
                </div>
            </div>

            <!-- Student Card 6 -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:shadow-md transition">
                <div class="flex items-center mb-3">
                    <img src="https://randomuser.me/api/portraits/women/84.jpg" alt="Student" class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <h3 class="font-semibold text-gray-800">Layla Nasser</h3>
                        <p class="text-sm text-gray-600">Oral Surgery Course</p>
                    </div>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full">Inactive</span>
                    <span class="text-gray-500">Enrolled: Oct 2023</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="/admin/hero" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-4 text-center transition">
                <i class="fas fa-home text-2xl mb-2"></i>
                <p>Update Hero Section</p>
            </a>
            <a href="/admin/courses" class="bg-green-500 hover:bg-green-600 text-white rounded-lg p-4 text-center transition">
                <i class="fas fa-book text-2xl mb-2"></i>
                <p>Add Course</p>
            </a>
            <a href="/admin/speakers" class="bg-purple-500 hover:bg-purple-600 text-white rounded-lg p-4 text-center transition">
                <i class="fas fa-microphone text-2xl mb-2"></i>
                <p>Add Speaker</p>
            </a>
            <a href="/admin/students" class="bg-orange-500 hover:bg-orange-600 text-white rounded-lg p-4 text-center transition">
                <i class="fas fa-user-graduate text-2xl mb-2"></i>
                <p>Manage Students</p>
            </a>
            <a href="/admin/gallery" class="bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg p-4 text-center transition">
                <i class="fas fa-images text-2xl mb-2"></i>
                <p>Update Gallery</p>
            </a>
        </div>
    </div>

    <!-- Recent Updates -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Recent Updates</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Section</th>
                        <th class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Change</th>
                        <th class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                        <th class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">By</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    <tr class="border-b">
                        <td class="py-3 px-4">Hero Section</td>
                        <td class="py-3 px-4">Text updated</td>
                        <td class="py-3 px-4">{{ date('d/m/Y') }}</td>
                        <td class="py-3 px-4">Admin</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3 px-4">Courses Section</td>
                        <td class="py-3 px-4">New course added</td>
                        <td class="py-3 px-4">{{ date('d/m/Y', strtotime('-1 day')) }}</td>
                        <td class="py-3 px-4">Admin</td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4">Gallery Section</td>
                        <td class="py-3 px-4">New image added</td>
                        <td class="py-3 px-4">{{ date('d/m/Y', strtotime('-2 day')) }}</td>
                        <td class="py-3 px-4">Admin</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection