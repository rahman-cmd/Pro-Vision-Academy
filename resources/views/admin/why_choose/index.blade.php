@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Why Choose Section Management</h1>
                <p class="text-gray-600 mt-1">Manage promotional content and feature highlights</p>
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
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Why Choose Pro Vision Academy" placeholder="Enter section title">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter description">Discover what sets Pro Vision Academy apart as the premier destination for dental education and professional development in the region.</textarea>
                    </div>
                </div>
            </div>

            <!-- Feature Cards -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-star text-yellow-600 mr-2"></i>Feature Cards
                </h3>
                
                <!-- Feature Card 1 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Feature 1 - Professional Courses</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Icon (Font Awesome)</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="fas fa-graduation-cap" placeholder="e.g., fas fa-graduation-cap">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Background Color</label>
                                <div class="flex items-center space-x-2">
                                    <input type="color" value="#3b82f6" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                    <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#3b82f6">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="1" min="1">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Title</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Professional Courses">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Description</label>
                                <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter feature description">Comprehensive curriculum designed by industry experts to meet international standards.</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Feature 2 - Expert-Led Training</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Icon (Font Awesome)</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="fas fa-user-md" placeholder="e.g., fas fa-user-md">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Background Color</label>
                                <div class="flex items-center space-x-2">
                                    <input type="color" value="#10b981" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                    <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#10b981">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="2" min="1">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Title</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Expert-Led Training">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Description</label>
                                <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter feature description">Learn from renowned dental professionals with years of practical experience.</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Feature 3 - Modern Facilities</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Icon (Font Awesome)</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="fas fa-hospital" placeholder="e.g., fas fa-hospital">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Background Color</label>
                                <div class="flex items-center space-x-2">
                                    <input type="color" value="#f59e0b" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                    <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#f59e0b">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="3" min="1">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Title</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Modern Facilities">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Description</label>
                                <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter feature description">State-of-the-art equipment and facilities that mirror real-world dental practices.</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 4 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Feature 4 - International Recognition</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Icon (Font Awesome)</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="fas fa-globe" placeholder="e.g., fas fa-globe">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Background Color</label>
                                <div class="flex items-center space-x-2">
                                    <input type="color" value="#8b5cf6" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                    <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#8b5cf6">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="4" min="1">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Title</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="International Recognition">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Feature Description</label>
                                <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter feature description">Globally recognized certifications that enhance your professional credibility worldwide.</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add New Feature Button -->
                <button type="button" class="w-full border-2 border-dashed border-gray-300 rounded-lg p-6 text-gray-500 hover:border-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-plus text-2xl mb-2"></i>
                    <div class="font-medium">Add New Feature</div>
                </button>
            </div>

            <!-- Featured Image Section -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-image text-green-600 mr-2"></i>Featured Image
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Main Image</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                                <i class="fas fa-image text-gray-400 text-4xl mb-4"></i>
                                <p class="text-gray-500 text-sm mb-2">Click to upload featured image</p>
                                <p class="text-gray-400 text-xs">Recommended size: 600x400px</p>
                                <input type="file" class="hidden" accept="image/*">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Image Alt Text</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Pro Vision Academy Facilities" placeholder="Enter alt text">
                        </div>
                    </div>
                    
                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Image Position</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="right" selected>Right Side</option>
                                <option value="left">Left Side</option>
                                <option value="center">Center</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Image Style</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="rounded" selected>Rounded Corners</option>
                                <option value="square">Square</option>
                                <option value="circle">Circular</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Image Effects</label>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="image_shadow" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                                    <label for="image_shadow" class="ml-2 block text-sm text-gray-700">Drop shadow</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="image_hover" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <label for="image_hover" class="ml-2 block text-sm text-gray-700">Hover effect</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Layout Settings -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-cog text-indigo-600 mr-2"></i>Layout Settings
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Features Per Row</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="2" selected>2 Features</option>
                            <option value="3">3 Features</option>
                            <option value="4">4 Features</option>
                            <option value="1">1 Feature</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Content Layout</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="split" selected>Split (Features + Image)</option>
                            <option value="features-only">Features Only</option>
                            <option value="image-top">Image on Top</option>
                            <option value="image-bottom">Image on Bottom</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Feature Card Style</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="card" selected>Card Style</option>
                            <option value="minimal">Minimal</option>
                            <option value="bordered">Bordered</option>
                            <option value="shadow">Shadow Cards</option>
                        </select>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
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
                
                <div class="mt-6 space-y-3">
                    <div class="flex items-center">
                        <input type="checkbox" id="show_icons" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                        <label for="show_icons" class="ml-2 block text-sm text-gray-700">Show feature icons</label>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="show_image" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                        <label for="show_image" class="ml-2 block text-sm text-gray-700">Show featured image</label>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="animate_cards" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="animate_cards" class="ml-2 block text-sm text-gray-700">Animate cards on scroll</label>
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