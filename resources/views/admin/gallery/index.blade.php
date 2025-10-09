@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Gallery Section Management</h1>
                <p class="text-gray-600 mt-1">Manage gallery images and captions</p>
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
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Gallery" placeholder="Enter section title">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter description">Explore our state-of-the-art facilities, training sessions, and memorable moments from our dental education programs.</textarea>
                    </div>
                </div>
            </div>

            <!-- Gallery Items -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-images text-green-600 mr-2"></i>Gallery Items
                </h3>
                
                <!-- Gallery Item 1 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Gallery Item 1</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Image</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                                    <i class="fas fa-image text-gray-400 text-3xl mb-3"></i>
                                    <p class="text-gray-500 text-sm mb-2">Click to upload gallery image</p>
                                    <p class="text-gray-400 text-xs">Recommended size: 600x400px</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image Alt Text</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter alt text for accessibility">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Caption</label>
                                <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter image caption">Modern dental training facility with advanced equipment</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="1" min="1">
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" id="featured1" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="featured1" class="ml-2 block text-sm text-gray-700">Featured Image</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 2 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Gallery Item 2</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Image</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                                    <i class="fas fa-image text-gray-400 text-3xl mb-3"></i>
                                    <p class="text-gray-500 text-sm mb-2">Click to upload gallery image</p>
                                    <p class="text-gray-400 text-xs">Recommended size: 600x400px</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image Alt Text</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter alt text for accessibility">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Caption</label>
                                <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter image caption">Students practicing advanced dental procedures</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="2" min="1">
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" id="featured2" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="featured2" class="ml-2 block text-sm text-gray-700">Featured Image</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 3 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Gallery Item 3</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Image</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                                    <i class="fas fa-image text-gray-400 text-3xl mb-3"></i>
                                    <p class="text-gray-500 text-sm mb-2">Click to upload gallery image</p>
                                    <p class="text-gray-400 text-xs">Recommended size: 600x400px</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image Alt Text</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter alt text for accessibility">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Caption</label>
                                <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter image caption">State-of-the-art laboratory equipment</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="3" min="1">
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" id="featured3" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="featured3" class="ml-2 block text-sm text-gray-700">Featured Image</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 4 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Gallery Item 4</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Image</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                                    <i class="fas fa-image text-gray-400 text-3xl mb-3"></i>
                                    <p class="text-gray-500 text-sm mb-2">Click to upload gallery image</p>
                                    <p class="text-gray-400 text-xs">Recommended size: 600x400px</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image Alt Text</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter alt text for accessibility">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Caption</label>
                                <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter image caption">Interactive learning sessions with expert instructors</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="4" min="1">
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" id="featured4" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="featured4" class="ml-2 block text-sm text-gray-700">Featured Image</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add New Gallery Item Button -->
                <button type="button" class="w-full border-2 border-dashed border-gray-300 rounded-lg p-6 text-gray-500 hover:border-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-plus text-2xl mb-2"></i>
                    <div class="font-medium">Add New Gallery Item</div>
                </button>
            </div>

            <!-- Gallery Settings -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-cog text-indigo-600 mr-2"></i>Gallery Settings
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Images Per Row</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="3" selected>3 Images</option>
                            <option value="2">2 Images</option>
                            <option value="4">4 Images</option>
                            <option value="6">6 Images</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image Aspect Ratio</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="aspect-video" selected>16:9 (Video)</option>
                            <option value="aspect-square">1:1 (Square)</option>
                            <option value="aspect-[4/3]">4:3 (Standard)</option>
                            <option value="aspect-[3/2]">3:2 (Photo)</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image Spacing</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="gap-6" selected>Medium (gap-6)</option>
                            <option value="gap-4">Small (gap-4)</option>
                            <option value="gap-8">Large (gap-8)</option>
                            <option value="gap-2">Tight (gap-2)</option>
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
                
                <div class="mt-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="lightbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                        <label for="lightbox" class="ml-2 block text-sm text-gray-700">Enable Lightbox (Click to enlarge images)</label>
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