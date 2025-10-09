@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">News & Updates Section Management</h1>
                <p class="text-gray-600 mt-1">Manage news articles and academy updates</p>
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
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Latest News & Updates" placeholder="Enter section title">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter description">Stay informed about the latest developments in dental education, new course announcements, and academy achievements.</textarea>
                    </div>
                </div>
            </div>

            <!-- News Articles List -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-newspaper text-green-600 mr-2"></i>News Articles
                </h3>
                
                <!-- News Article 1 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Article 1 - New Advanced Implantology Course</h4>
                        <div class="flex items-center space-x-2">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Published</span>
                            <button type="button" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                                    <i class="fas fa-image text-gray-400 text-2xl mb-2"></i>
                                    <p class="text-gray-500 text-sm">Click to upload featured image</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image Alt Text</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Advanced Implantology Course" placeholder="Enter alt text">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Publication Date</label>
                                <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="2024-01-15">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Article Title</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="New Advanced Implantology Course Launched">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="course-announcement" selected>Course Announcement</option>
                                    <option value="academy-news">Academy News</option>
                                    <option value="industry-update">Industry Update</option>
                                    <option value="achievement">Achievement</option>
                                    <option value="event">Event</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="published" selected>Published</option>
                                    <option value="draft">Draft</option>
                                    <option value="scheduled">Scheduled</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="1" min="1">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                            <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter short description">We're excited to announce our new Advanced Implantology course, designed for experienced practitioners looking to enhance their surgical skills.</textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Read More Link</label>
                            <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="/news/advanced-implantology-course" placeholder="Enter article URL">
                        </div>
                    </div>
                </div>

                <!-- News Article 2 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Article 2 - International Partnership Announcement</h4>
                        <div class="flex items-center space-x-2">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Published</span>
                            <button type="button" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                                    <i class="fas fa-image text-gray-400 text-2xl mb-2"></i>
                                    <p class="text-gray-500 text-sm">Click to upload featured image</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image Alt Text</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="International Partnership" placeholder="Enter alt text">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Publication Date</label>
                                <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="2024-01-10">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Article Title</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Partnership with European Dental Institute">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="course-announcement">Course Announcement</option>
                                    <option value="academy-news" selected>Academy News</option>
                                    <option value="industry-update">Industry Update</option>
                                    <option value="achievement">Achievement</option>
                                    <option value="event">Event</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="published" selected>Published</option>
                                    <option value="draft">Draft</option>
                                    <option value="scheduled">Scheduled</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="2" min="1">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                            <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter short description">Pro Vision Academy announces strategic partnership with leading European institutions to bring world-class dental education to the region.</textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Read More Link</label>
                            <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="/news/european-partnership" placeholder="Enter article URL">
                        </div>
                    </div>
                </div>

                <!-- News Article 3 -->
                <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-gray-800">Article 3 - Student Achievement Recognition</h4>
                        <div class="flex items-center space-x-2">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Draft</span>
                            <button type="button" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                                    <i class="fas fa-image text-gray-400 text-2xl mb-2"></i>
                                    <p class="text-gray-500 text-sm">Click to upload featured image</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image Alt Text</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Student Achievement" placeholder="Enter alt text">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Publication Date</label>
                                <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="2024-01-05">
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Article Title</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Outstanding Student Achievements in 2024">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="course-announcement">Course Announcement</option>
                                    <option value="academy-news">Academy News</option>
                                    <option value="industry-update">Industry Update</option>
                                    <option value="achievement" selected>Achievement</option>
                                    <option value="event">Event</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="published">Published</option>
                                    <option value="draft" selected>Draft</option>
                                    <option value="scheduled">Scheduled</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="3" min="1">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                            <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter short description">Celebrating the remarkable achievements of our students who have excelled in their dental careers after completing our programs.</textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Read More Link</label>
                            <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="/news/student-achievements-2024" placeholder="Enter article URL">
                        </div>
                    </div>
                </div>

                <!-- Add New Article Button -->
                <button type="button" class="w-full border-2 border-dashed border-gray-300 rounded-lg p-6 text-gray-500 hover:border-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-plus text-2xl mb-2"></i>
                    <div class="font-medium">Add New Article</div>
                </button>
            </div>

            <!-- Call-to-Action Settings -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-external-link-alt text-purple-600 mr-2"></i>Call-to-Action Button
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="View All News" placeholder="Enter button text">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                        <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="/news" placeholder="Enter button URL">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Button Style</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="primary" selected>Primary Button</option>
                            <option value="secondary">Secondary Button</option>
                            <option value="outline">Outline Button</option>
                        </select>
                    </div>
                    
                    <div class="flex items-center pt-6">
                        <input type="checkbox" id="show_cta" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                        <label for="show_cta" class="ml-2 block text-sm text-gray-700">Show call-to-action button</label>
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
                        <label class="block text-sm font-medium text-gray-700 mb-2">Articles Per Row</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="3" selected>3 Articles</option>
                            <option value="2">2 Articles</option>
                            <option value="1">1 Article</option>
                            <option value="4">4 Articles</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Articles to Display</label>
                        <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="3" min="1" max="12">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="date_desc" selected>Newest First</option>
                            <option value="date_asc">Oldest First</option>
                            <option value="title_asc">Title A-Z</option>
                            <option value="custom">Custom Order</option>
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
                        <input type="checkbox" id="show_date" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                        <label for="show_date" class="ml-2 block text-sm text-gray-700">Show publication date</label>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="show_category" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="show_category" class="ml-2 block text-sm text-gray-700">Show article category</label>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="show_excerpt" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                        <label for="show_excerpt" class="ml-2 block text-sm text-gray-700">Show article excerpt</label>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="show_read_more" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                        <label for="show_read_more" class="ml-2 block text-sm text-gray-700">Show "Read more" links</label>
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