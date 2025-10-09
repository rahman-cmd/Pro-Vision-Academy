@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Hero Section Management</h1>
                <p class="text-gray-600 mt-1">Manage the main hero section content and appearance</p>
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
                    <i class="fas fa-edit text-blue-600 mr-2"></i>Main Content
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Main Title</label>
                            <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter main title">Advance Your Dental
Career with Expert
Training</textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Highlighted Text</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Expert Training" placeholder="Text to highlight">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter description">Join Pro Vision Academy and unlock your potential with world-class dental education, cutting-edge techniques, and professional development programs.</textarea>
                        </div>
                    </div>
                    
                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Hero Image</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                                <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=800&q=80" alt="Current Hero Image" class="mx-auto h-32 w-48 object-cover rounded-lg mb-4">
                                <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                                    <i class="fas fa-upload mr-2"></i>Change Image
                                </button>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Image Alt Text</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Dental Training" placeholder="Image description">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call-to-Action Buttons -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-mouse-pointer text-green-600 mr-2"></i>Call-to-Action Buttons
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Primary Button -->
                    <div class="space-y-4">
                        <h4 class="font-medium text-gray-800">Primary Button</h4>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Register Now" placeholder="Button text">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                            <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://example.com">
                        </div>
                    </div>
                    
                    <!-- Secondary Button -->
                    <div class="space-y-4">
                        <h4 class="font-medium text-gray-800">Secondary Button</h4>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Learn More" placeholder="Button text">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                            <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://example.com">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Badge -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-chart-bar text-purple-600 mr-2"></i>Statistics Badge
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Badge Icon</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="fas fa-certificate">Certificate</option>
                            <option value="fas fa-users">Users</option>
                            <option value="fas fa-graduation-cap">Graduation Cap</option>
                            <option value="fas fa-award">Award</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Number</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="500+" placeholder="e.g., 500+">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Label</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Certified Dentists" placeholder="e.g., Certified Dentists">
                    </div>
                </div>
            </div>

            <!-- Background Settings -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-palette text-indigo-600 mr-2"></i>Background Settings
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Background Type</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="gradient">Gradient</option>
                            <option value="solid">Solid Color</option>
                            <option value="image">Background Image</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Primary Color</label>
                        <div class="flex items-center space-x-2">
                            <input type="color" value="#19506b" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                            <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#19506b">
                        </div>
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