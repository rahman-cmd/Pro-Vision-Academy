@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Testimonials Section Management</h1>
                <p class="text-gray-600 mt-1">Manage student testimonials and reviews</p>
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
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="What Our Students Say" placeholder="Enter section title">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter description">Hear from our successful graduates about their transformative learning experience at Pro Vision Academy.</textarea>
                    </div>
                </div>
            </div>

            <!-- Testimonials List -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-quote-left text-green-600 mr-2"></i>Testimonials
                </h3>
                
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Testimonial 1 - Dr. Sarah Ahmed</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Reviewer Photo</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                                    <i class="fas fa-user-circle text-gray-400 text-2xl mb-2"></i>
                                    <p class="text-gray-500 text-sm">Click to upload reviewer photo</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Dr. Sarah Ahmed">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Dubai, UAE">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                <div class="flex items-center space-x-2">
                                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="5" selected>5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Course/Program</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Advanced Implantology" placeholder="Enter course name">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="1" min="1">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Testimonial Quote</label>
                        <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter testimonial quote">The training at Pro Vision Academy exceeded my expectations. The hands-on approach and expert guidance helped me master advanced implant techniques that I now use confidently in my practice.</textarea>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Testimonial 2 - Dr. Mohammed Hassan</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Reviewer Photo</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                                    <i class="fas fa-user-circle text-gray-400 text-2xl mb-2"></i>
                                    <p class="text-gray-500 text-sm">Click to upload reviewer photo</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Dr. Mohammed Hassan">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Abu Dhabi, UAE">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                <div class="flex items-center space-x-2">
                                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="5" selected>5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Course/Program</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Cosmetic Dentistry" placeholder="Enter course name">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="2" min="1">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Testimonial Quote</label>
                        <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter testimonial quote">Exceptional learning experience! The cosmetic dentistry course provided me with cutting-edge techniques and the confidence to transform my patients' smiles. Highly recommended!</textarea>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Testimonial 3 - Dr. Layla Naseer</h4>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Reviewer Photo</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                                    <i class="fas fa-user-circle text-gray-400 text-2xl mb-2"></i>
                                    <p class="text-gray-500 text-sm">Click to upload reviewer photo</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Dr. Layla Naseer">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Sharjah, UAE">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                <div class="flex items-center space-x-2">
                                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="5" selected>5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Course/Program</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Basic Dental Care" placeholder="Enter course name">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="3" min="1">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Testimonial Quote</label>
                        <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter testimonial quote">Perfect foundation course for new practitioners. The comprehensive curriculum and supportive instructors made complex concepts easy to understand and apply.</textarea>
                    </div>
                </div>

                <!-- Add New Testimonial Button -->
                <button type="button" class="w-full border-2 border-dashed border-gray-300 rounded-lg p-6 text-gray-500 hover:border-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-plus text-2xl mb-2"></i>
                    <div class="font-medium">Add New Testimonial</div>
                </button>
            </div>

            <!-- Display Settings -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-cog text-indigo-600 mr-2"></i>Display Settings
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Testimonials Per Row</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="3" selected>3 Testimonials</option>
                            <option value="2">2 Testimonials</option>
                            <option value="1">1 Testimonial</option>
                            <option value="4">4 Testimonials</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Card Style</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="shadow" selected>Shadow Cards</option>
                            <option value="border">Border Cards</option>
                            <option value="minimal">Minimal Cards</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Star Color</label>
                        <div class="flex items-center space-x-2">
                            <input type="color" value="#fbbf24" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                            <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#fbbf24">
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
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
                            <option value="py-16" selected>Large (py-16)</option>
                            <option value="py-10">Medium (py-10)</option>
                            <option value="py-8">Small (py-8)</option>
                            <option value="py-20">Extra Large (py-20)</option>
                        </select>
                    </div>
                </div>
                
                <div class="mt-6 space-y-3">
                    <div class="flex items-center">
                        <input type="checkbox" id="show_photos" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                        <label for="show_photos" class="ml-2 block text-sm text-gray-700">Show reviewer photos</label>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="show_location" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                        <label for="show_location" class="ml-2 block text-sm text-gray-700">Show reviewer location</label>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="show_course" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="show_course" class="ml-2 block text-sm text-gray-700">Show course/program name</label>
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