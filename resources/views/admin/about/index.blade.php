@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">About Section Management</h1>
                <p class="text-gray-600 mt-1">Manage the about section content and feature cards</p>
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                <i class="fas fa-save mr-2"></i>Save Changes
            </button>
        </div>
    </div>

    <!-- Content -->
    <div class="p-6">
        <form class="space-y-8">
            <!-- Main Content Section -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-info-circle text-blue-600 mr-2"></i>Main Content
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="About Pro Vision Academy" placeholder="Enter section title">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter description">We are dedicated to advancing dental education through innovative training programs, expert instruction, and state-of-the-art facilities.</textarea>
                    </div>
                </div>
            </div>

            <!-- Feature Cards -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-th-large text-green-600 mr-2"></i>Feature Cards
                </h3>
                
                <!-- Card 1 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Card 1 - Advanced Technology</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="fas fa-microscope">Microscope</option>
                                <option value="fas fa-cog">Settings</option>
                                <option value="fas fa-laptop">Laptop</option>
                                <option value="fas fa-tools">Tools</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Background Color</label>
                            <div class="flex items-center space-x-2">
                                <input type="color" value="#19506b" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#19506b">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Advanced Technology">
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">Learn with the latest dental technology and equipment used in modern practices worldwide.</textarea>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Card 2 - Expert Instructors</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="fas fa-user-md">Doctor</option>
                                <option value="fas fa-chalkboard-teacher">Teacher</option>
                                <option value="fas fa-graduation-cap">Graduation Cap</option>
                                <option value="fas fa-users">Users</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Background Color</label>
                            <div class="flex items-center space-x-2">
                                <input type="color" value="#3399cc" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#3399cc">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Expert Instructors">
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">Learn from renowned dental professionals with decades of experience and expertise.</textarea>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Card 3 - Accredited Programs</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="fas fa-certificate">Certificate</option>
                                <option value="fas fa-award">Award</option>
                                <option value="fas fa-medal">Medal</option>
                                <option value="fas fa-check-circle">Check Circle</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Background Color</label>
                            <div class="flex items-center space-x-2">
                                <input type="color" value="#b8e0fa" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#b8e0fa">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Accredited Programs">
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">All our courses are fully accredited and recognized by international dental boards.</textarea>
                    </div>
                </div>

                <!-- Add New Card Button -->
                <button type="button" class="w-full border-2 border-dashed border-gray-300 rounded-lg p-6 text-gray-500 hover:border-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-plus text-2xl mb-2"></i>
                    <div class="font-medium">Add New Feature Card</div>
                </button>
            </div>

            <!-- Background Settings -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-palette text-indigo-600 mr-2"></i>Background Settings
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Background Color</label>
                        <div class="flex items-center space-x-2">
                            <input type="color" value="#f9fafb" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                            <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#f9fafb">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Padding</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="py-10">Medium (py-10)</option>
                            <option value="py-8">Small (py-8)</option>
                            <option value="py-16">Large (py-16)</option>
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