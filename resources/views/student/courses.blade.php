@extends('student.layouts.app')

@section('title', 'My Courses')

@section('content')
<div class="p-3 sm:p-4 lg:p-6">
    <!-- Header -->
    <div class="mb-4 sm:mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-3 sm:mb-0">
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900">My Courses</h1>
                <p class="text-sm sm:text-base text-gray-600 mt-1">Track your enrolled offline courses and progress</p>
            </div>
            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                <button class="px-3 sm:px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm">
                    <i class="fas fa-plus mr-2"></i>Enroll New Course
                </button>
                <button class="px-3 sm:px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Course Statistics -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-4 sm:mb-6">
        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center">
                <div class="p-2 sm:p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-book text-blue-600 text-sm sm:text-lg"></i>
                </div>
                <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                    <p class="text-xs sm:text-sm font-medium text-gray-600 truncate">Total Enrolled</p>
                    <p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900">5</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center">
                <div class="p-2 sm:p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-play-circle text-green-600 text-sm sm:text-lg"></i>
                </div>
                <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                    <p class="text-xs sm:text-sm font-medium text-gray-600 truncate">Active Courses</p>
                    <p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900">3</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center">
                <div class="p-2 sm:p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-check-circle text-purple-600 text-sm sm:text-lg"></i>
                </div>
                <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                    <p class="text-xs sm:text-sm font-medium text-gray-600 truncate">Completed</p>
                    <p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900">2</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center">
                <div class="p-2 sm:p-3 bg-yellow-100 rounded-lg">
                    <i class="fas fa-chart-line text-yellow-600 text-sm sm:text-lg"></i>
                </div>
                <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                    <p class="text-xs sm:text-sm font-medium text-gray-600 truncate">Avg. Progress</p>
                    <p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900">68%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses List -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-4 sm:p-6 border-b border-gray-200">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-900">Enrolled Courses</h2>
        </div>
        <div class="p-4 sm:p-6">
            <div class="space-y-4 sm:space-y-6">
                <!-- Course 1 -->
                <div class="border border-gray-200 rounded-lg p-4 sm:p-6 hover:shadow-md transition-shadow">
                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between">
                        <div class="flex-1 mb-4 lg:mb-0">
                            <div class="flex flex-col sm:flex-row sm:items-start sm:space-x-4">
                                <div class="w-12 h-12 sm:w-16 sm:h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-3 sm:mb-0 flex-shrink-0">
                                    <i class="fas fa-tooth text-blue-600 text-lg sm:text-xl"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1">Dental Anatomy & Physiology</h3>
                                    <p class="text-sm text-gray-600 mb-2">Dr. Sarah Johnson • 45 Students • 12 Weeks Duration</p>
                                    
                                    <!-- Course Details Grid -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4 text-xs sm:text-sm text-gray-500 mb-3">
                                        <div class="flex items-center">
                                            <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                                            <span>Mon, Wed, Fri</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-clock mr-2 text-green-500"></i>
                                            <span>9:00 AM - 11:00 AM</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                                            <span>Room 101, Building A</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-users mr-2 text-purple-500"></i>
                                            <span>45 Students</span>
                                        </div>
                                    </div>

                                    <!-- Progress Bar -->
                                    <div class="mb-3">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs sm:text-sm font-medium text-gray-700">Course Progress</span>
                                            <span class="text-xs sm:text-sm font-medium text-gray-700">75%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
                                        </div>
                                    </div>

                                    <!-- Next Class Info -->
                                    <div class="bg-blue-50 rounded-lg p-2 sm:p-3 mb-3">
                                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                            <div>
                                                <p class="text-xs sm:text-sm font-medium text-blue-900">Next Class</p>
                                                <p class="text-xs text-blue-700">Monday, Dec 18 • 9:00 AM</p>
                                            </div>
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full mt-1 sm:mt-0 self-start sm:self-center">
                                                In 2 days
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row lg:flex-col space-y-2 sm:space-y-0 sm:space-x-2 lg:space-x-0 lg:space-y-2 lg:ml-4">
                            <button class="px-3 sm:px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-xs sm:text-sm">
                                <i class="fas fa-eye mr-1 sm:mr-2"></i>View Details
                            </button>
                            <button class="px-3 sm:px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-xs sm:text-sm">
                                <i class="fas fa-calendar mr-1 sm:mr-2"></i>View Schedule
                            </button>
                            <button class="px-3 sm:px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-xs sm:text-sm">
                                <i class="fas fa-download mr-1 sm:mr-2"></i>Materials
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Course 2 -->
                <div class="border border-gray-200 rounded-lg p-4 sm:p-6 hover:shadow-md transition-shadow">
                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between">
                        <div class="flex-1 mb-4 lg:mb-0">
                            <div class="flex flex-col sm:flex-row sm:items-start sm:space-x-4">
                                <div class="w-12 h-12 sm:w-16 sm:h-16 bg-green-100 rounded-lg flex items-center justify-center mb-3 sm:mb-0 flex-shrink-0">
                                    <i class="fas fa-microscope text-green-600 text-lg sm:text-xl"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1">Oral Pathology</h3>
                                    <p class="text-sm text-gray-600 mb-2">Dr. Michael Chen • 38 Students • 10 Weeks Duration</p>
                                    
                                    <!-- Course Details Grid -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4 text-xs sm:text-sm text-gray-500 mb-3">
                                        <div class="flex items-center">
                                            <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                                            <span>Tue, Thu</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-clock mr-2 text-green-500"></i>
                                            <span>2:00 PM - 4:00 PM</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                                            <span>Room 205, Building B</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-users mr-2 text-purple-500"></i>
                                            <span>38 Students</span>
                                        </div>
                                    </div>

                                    <!-- Progress Bar -->
                                    <div class="mb-3">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs sm:text-sm font-medium text-gray-700">Course Progress</span>
                                            <span class="text-xs sm:text-sm font-medium text-gray-700">60%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-green-600 h-2 rounded-full" style="width: 60%"></div>
                                        </div>
                                    </div>

                                    <!-- Next Class Info -->
                                    <div class="bg-green-50 rounded-lg p-2 sm:p-3 mb-3">
                                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                            <div>
                                                <p class="text-xs sm:text-sm font-medium text-green-900">Next Class</p>
                                                <p class="text-xs text-green-700">Tuesday, Dec 19 • 2:00 PM</p>
                                            </div>
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full mt-1 sm:mt-0 self-start sm:self-center">
                                                Tomorrow
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row lg:flex-col space-y-2 sm:space-y-0 sm:space-x-2 lg:space-x-0 lg:space-y-2 lg:ml-4">
                            <button class="px-3 sm:px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-xs sm:text-sm">
                                <i class="fas fa-eye mr-1 sm:mr-2"></i>View Details
                            </button>
                            <button class="px-3 sm:px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-xs sm:text-sm">
                                <i class="fas fa-calendar mr-1 sm:mr-2"></i>View Schedule
                            </button>
                            <button class="px-3 sm:px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-xs sm:text-sm">
                                <i class="fas fa-download mr-1 sm:mr-2"></i>Materials
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Course 3 -->
                <div class="border border-gray-200 rounded-lg p-4 sm:p-6 hover:shadow-md transition-shadow">
                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between">
                        <div class="flex-1 mb-4 lg:mb-0">
                            <div class="flex flex-col sm:flex-row sm:items-start sm:space-x-4">
                                <div class="w-12 h-12 sm:w-16 sm:h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-3 sm:mb-0 flex-shrink-0">
                                    <i class="fas fa-x-ray text-purple-600 text-lg sm:text-xl"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1">Dental Radiology</h3>
                                    <p class="text-sm text-gray-600 mb-2">Dr. Emily Rodriguez • 32 Students • 8 Weeks Duration</p>
                                    
                                    <!-- Course Details Grid -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4 text-xs sm:text-sm text-gray-500 mb-3">
                                        <div class="flex items-center">
                                            <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                                            <span>Wed, Fri</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-clock mr-2 text-green-500"></i>
                                            <span>10:00 AM - 12:00 PM</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                                            <span>Lab 3, Building C</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-users mr-2 text-purple-500"></i>
                                            <span>32 Students</span>
                                        </div>
                                    </div>

                                    <!-- Progress Bar -->
                                    <div class="mb-3">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs sm:text-sm font-medium text-gray-700">Course Progress</span>
                                            <span class="text-xs sm:text-sm font-medium text-gray-700">45%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-purple-600 h-2 rounded-full" style="width: 45%"></div>
                                        </div>
                                    </div>

                                    <!-- Next Class Info -->
                                    <div class="bg-purple-50 rounded-lg p-2 sm:p-3 mb-3">
                                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                            <div>
                                                <p class="text-xs sm:text-sm font-medium text-purple-900">Next Class</p>
                                                <p class="text-xs text-purple-700">Wednesday, Dec 20 • 10:00 AM</p>
                                            </div>
                                            <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full mt-1 sm:mt-0 self-start sm:self-center">
                                                In 3 days
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row lg:flex-col space-y-2 sm:space-y-0 sm:space-x-2 lg:space-x-0 lg:space-y-2 lg:ml-4">
                            <button class="px-3 sm:px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-xs sm:text-sm">
                                <i class="fas fa-eye mr-1 sm:mr-2"></i>View Details
                            </button>
                            <button class="px-3 sm:px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-xs sm:text-sm">
                                <i class="fas fa-calendar mr-1 sm:mr-2"></i>View Schedule
                            </button>
                            <button class="px-3 sm:px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-xs sm:text-sm">
                                <i class="fas fa-download mr-1 sm:mr-2"></i>Materials
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection