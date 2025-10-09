@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Courses Section Management</h1>
                <p class="text-gray-600 mt-1">Manage upcoming courses and section content</p>
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                <i class="fas fa-save mr-2"></i>Save Changes
            </button>
        </div>
    </div>

    <!-- Content -->
    <div class="p-6">
        <form class="space-y-8">
            <!-- Section Header -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-heading text-blue-600 mr-2"></i>Section Header
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Upcoming Courses" placeholder="Enter section title">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter description">Explore our comprehensive range of dental courses designed to enhance your skills and advance your career.</textarea>
                    </div>
                </div>
            </div>

            <!-- Courses List -->
            <div class="bg-gray-50 rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">
                        <i class="fas fa-graduation-cap text-green-600 mr-2"></i>Course Listings
                    </h3>
                    <div class="flex items-center space-x-3">
                        <span class="text-sm text-gray-600">Total Courses: <span class="font-semibold text-blue-600">3</span></span>
                        <button type="button" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center">
                            <i class="fas fa-plus mr-2"></i>Add New Course
                        </button>
                    </div>
                </div>
                
                <!-- Courses Grid -->
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-6">
                <!-- Course 1 -->
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-tooth text-red-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Advanced Implantology</h4>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Advanced
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit Course">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="text-red-600 hover:text-red-800 p-1" title="Delete Course">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Price:</span>
                                <span class="font-semibold text-green-600">$2,500</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Date:</span>
                                <span class="text-sm text-gray-900">March 15, 2024</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Status:</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Active
                                </span>
                            </div>
                        </div>
                        
                        <p class="text-sm text-gray-600 mt-4 line-clamp-2">
                            Master the latest techniques in dental implant placement and restoration with hands-on training.
                        </p>
                        
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <button type="button" class="w-full bg-blue-50 hover:bg-blue-100 text-blue-700 py-2 px-4 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-cog mr-2"></i>Manage Course
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Course 2 -->
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-smile text-yellow-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Cosmetic Dentistry</h4>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Intermediate
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit Course">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="text-red-600 hover:text-red-800 p-1" title="Delete Course">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Price:</span>
                                <span class="font-semibold text-green-600">$1,800</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Date:</span>
                                <span class="text-sm text-gray-900">April 20, 2024</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Status:</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Active
                                </span>
                            </div>
                        </div>
                        
                        <p class="text-sm text-gray-600 mt-4 line-clamp-2">
                            Learn aesthetic dentistry techniques including veneers, whitening, and smile design.
                        </p>
                        
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <button type="button" class="w-full bg-blue-50 hover:bg-blue-100 text-blue-700 py-2 px-4 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-cog mr-2"></i>Manage Course
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Course 3 -->
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-md text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Basic Dental Care</h4>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Beginner
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit Course">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="text-red-600 hover:text-red-800 p-1" title="Delete Course">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Price:</span>
                                <span class="font-semibold text-green-600">$1,200</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Date:</span>
                                <span class="text-sm text-gray-900">May 10, 2024</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Status:</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Active
                                </span>
                            </div>
                        </div>
                        
                        <p class="text-sm text-gray-600 mt-4 line-clamp-2">
                            Foundation course covering essential dental care principles and basic procedures.
                        </p>
                        
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <button type="button" class="w-full bg-blue-50 hover:bg-blue-100 text-blue-700 py-2 px-4 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-cog mr-2"></i>Manage Course
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Add New Course Card -->
                <div class="bg-white rounded-lg border-2 border-dashed border-gray-300 hover:border-gray-400 transition-colors">
                    <div class="p-6 text-center">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-plus text-gray-400 text-xl"></i>
                        </div>
                        <h4 class="font-medium text-gray-900 mb-2">Add New Course</h4>
                        <p class="text-sm text-gray-500 mb-4">Create a new course offering for your academy</p>
                        <button type="button" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                            <i class="fas fa-plus mr-2"></i>Create Course
                        </button>
                    </div>
                </div>
                </div>
            </div>

            <!-- Display Settings -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-cog text-indigo-600 mr-2"></i>Display Settings
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Courses Per Row</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="3" selected>3 Courses</option>
                            <option value="2">2 Courses</option>
                            <option value="4">4 Courses</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Background Color</label>
                        <div class="flex items-center space-x-2">
                            <input type="color" value="#ffffff" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                            <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#ffffff">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Padding</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="py-16" selected>Large (py-16)</option>
                            <option value="py-10">Medium (py-10)</option>
                            <option value="py-8">Small (py-8)</option>
                            <option value="py-20">Extra Large (py-20)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <button type="button" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                    Cancel
                </button>
                <button type="button" class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 font-medium transition-colors">
                    <i class="fas fa-eye mr-2"></i>Preview
                </button>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium transition-colors">
                    <i class="fas fa-save mr-2"></i>Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection