@extends('student.layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="p-3 sm:p-4 lg:p-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg p-4 sm:p-6 text-white mb-4 sm:mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-3 sm:mb-0">
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold">Welcome back, John!</h1>
                <p class="text-blue-100 text-sm sm:text-base mt-1">Ready to continue your dental education journey?</p>
            </div>
            <div class="text-center sm:text-right">
                <div class="text-xs sm:text-sm text-blue-200">Today's Date</div>
                <div class="text-sm sm:text-lg font-semibold">{{ date('M d, Y') }}</div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-4 sm:mb-6">
        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center">
                <div class="p-2 sm:p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-book text-blue-600 text-sm sm:text-lg"></i>
                </div>
                <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                    <p class="text-xs sm:text-sm font-medium text-gray-600 truncate">Enrolled Courses</p>
                    <p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900">5</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center">
                <div class="p-2 sm:p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-check-circle text-green-600 text-sm sm:text-lg"></i>
                </div>
                <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                    <p class="text-xs sm:text-sm font-medium text-gray-600 truncate">Attendance Rate</p>
                    <p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900">92%</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center">
                <div class="p-2 sm:p-3 bg-yellow-100 rounded-lg">
                    <i class="fas fa-tasks text-yellow-600 text-sm sm:text-lg"></i>
                </div>
                <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                    <p class="text-xs sm:text-sm font-medium text-gray-600 truncate">Pending Tasks</p>
                    <p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900">3</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-3 sm:p-4 lg:p-6">
            <div class="flex items-center">
                <div class="p-2 sm:p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-chart-line text-purple-600 text-sm sm:text-lg"></i>
                </div>
                <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                    <p class="text-xs sm:text-sm font-medium text-gray-600 truncate">Overall Grade</p>
                    <p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900">A-</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
        <!-- Enrolled Courses -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-2 sm:mb-0">My Enrolled Courses</h2>
                        <a href="{{ route('student.courses') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</a>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="space-y-4">
                        <!-- Course 1 -->
                        <div class="border border-gray-200 rounded-lg p-3 sm:p-4 hover:shadow-md transition-shadow">
                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between">
                                <div class="flex-1 mb-3 sm:mb-0">
                                    <h3 class="font-semibold text-gray-900 text-sm sm:text-base mb-1">Dental Anatomy & Physiology</h3>
                                    <p class="text-xs sm:text-sm text-gray-600 mb-2">Dr. Sarah Johnson • Room 101</p>
                                    <div class="flex flex-col sm:flex-row sm:items-center text-xs sm:text-sm text-gray-500 space-y-1 sm:space-y-0 sm:space-x-4">
                                        <span><i class="fas fa-calendar-alt mr-1"></i>Mon, Wed, Fri</span>
                                        <span><i class="fas fa-clock mr-1"></i>9:00 AM - 11:00 AM</span>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:items-end">
                                    <div class="flex items-center mb-2">
                                        <div class="w-16 sm:w-20 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
                                        </div>
                                        <span class="text-xs sm:text-sm font-medium text-gray-700">75%</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="px-2 sm:px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700 transition-colors">Details</button>
                                        <button class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 text-xs rounded hover:bg-gray-200 transition-colors">Materials</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Course 2 -->
                        <div class="border border-gray-200 rounded-lg p-3 sm:p-4 hover:shadow-md transition-shadow">
                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between">
                                <div class="flex-1 mb-3 sm:mb-0">
                                    <h3 class="font-semibold text-gray-900 text-sm sm:text-base mb-1">Oral Pathology</h3>
                                    <p class="text-xs sm:text-sm text-gray-600 mb-2">Dr. Michael Chen • Room 205</p>
                                    <div class="flex flex-col sm:flex-row sm:items-center text-xs sm:text-sm text-gray-500 space-y-1 sm:space-y-0 sm:space-x-4">
                                        <span><i class="fas fa-calendar-alt mr-1"></i>Tue, Thu</span>
                                        <span><i class="fas fa-clock mr-1"></i>2:00 PM - 4:00 PM</span>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:items-end">
                                    <div class="flex items-center mb-2">
                                        <div class="w-16 sm:w-20 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-green-600 h-2 rounded-full" style="width: 60%"></div>
                                        </div>
                                        <span class="text-xs sm:text-sm font-medium text-gray-700">60%</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="px-2 sm:px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700 transition-colors">Details</button>
                                        <button class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 text-xs rounded hover:bg-gray-200 transition-colors">Materials</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Course 3 -->
                        <div class="border border-gray-200 rounded-lg p-3 sm:p-4 hover:shadow-md transition-shadow">
                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between">
                                <div class="flex-1 mb-3 sm:mb-0">
                                    <h3 class="font-semibold text-gray-900 text-sm sm:text-base mb-1">Dental Radiology</h3>
                                    <p class="text-xs sm:text-sm text-gray-600 mb-2">Dr. Emily Rodriguez • Lab 3</p>
                                    <div class="flex flex-col sm:flex-row sm:items-center text-xs sm:text-sm text-gray-500 space-y-1 sm:space-y-0 sm:space-x-4">
                                        <span><i class="fas fa-calendar-alt mr-1"></i>Wed, Fri</span>
                                        <span><i class="fas fa-clock mr-1"></i>10:00 AM - 12:00 PM</span>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:items-end">
                                    <div class="flex items-center mb-2">
                                        <div class="w-16 sm:w-20 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-yellow-600 h-2 rounded-full" style="width: 45%"></div>
                                        </div>
                                        <span class="text-xs sm:text-sm font-medium text-gray-700">45%</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="px-2 sm:px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700 transition-colors">Details</button>
                                        <button class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 text-xs rounded hover:bg-gray-200 transition-colors">Materials</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Content -->
        <div class="space-y-4 sm:space-y-6">
            <!-- Today's Schedule -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-900">Today's Schedule</h2>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="space-y-3 sm:space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">Dental Anatomy</p>
                                <p class="text-xs text-gray-500">9:00 AM - 11:00 AM</p>
                                <p class="text-xs text-gray-500">Room 101</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-2 h-2 bg-green-600 rounded-full mt-2"></div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">Oral Pathology</p>
                                <p class="text-xs text-gray-500">2:00 PM - 4:00 PM</p>
                                <p class="text-xs text-gray-500">Room 205</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-2 h-2 bg-yellow-600 rounded-full mt-2"></div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">Study Group</p>
                                <p class="text-xs text-gray-500">5:00 PM - 6:00 PM</p>
                                <p class="text-xs text-gray-500">Library</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Announcements -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-900">Recent Announcements</h2>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="space-y-3 sm:space-y-4">
                        <div class="border-l-4 border-blue-500 pl-3 sm:pl-4">
                            <p class="text-sm font-medium text-gray-900">Midterm Exam Schedule</p>
                            <p class="text-xs text-gray-600 mt-1">Posted 2 hours ago</p>
                            <p class="text-xs text-gray-500 mt-1">Check your email for detailed exam schedule...</p>
                        </div>
                        <div class="border-l-4 border-green-500 pl-3 sm:pl-4">
                            <p class="text-sm font-medium text-gray-900">New Lab Equipment</p>
                            <p class="text-xs text-gray-600 mt-1">Posted 1 day ago</p>
                            <p class="text-xs text-gray-500 mt-1">New digital X-ray machines installed in Lab 3...</p>
                        </div>
                        <div class="border-l-4 border-yellow-500 pl-3 sm:pl-4">
                            <p class="text-sm font-medium text-gray-900">Library Hours Extended</p>
                            <p class="text-xs text-gray-600 mt-1">Posted 3 days ago</p>
                            <p class="text-xs text-gray-500 mt-1">Library will be open until 10 PM during exam week...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection