@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Website Settings</h1>
                <p class="text-gray-600 mt-1">Configure your website's general settings and appearance</p>
            </div>
            <div class="flex items-center space-x-4">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    <i class="fas fa-save mr-2"></i>Save All Changes
                </button>
                <button class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    <i class="fas fa-eye mr-2"></i>Preview
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="p-6">
            <form class="space-y-8">
                
                <!-- General Settings -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-cog text-blue-600 mr-3"></i>
                            General Settings
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Basic website information and configuration</p>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Website Name</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Pro Vision Academy" placeholder="Enter website name">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Website Tagline</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Excellence in Dental Education" placeholder="Enter website tagline">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Website URL</label>
                                <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="https://provisionacademy.com" placeholder="https://example.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Admin Email</label>
                                <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="admin@provisionacademy.com" placeholder="admin@example.com">
                            </div>
                            <div class="lg:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Website Description</label>
                                <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter website description for SEO">Pro Vision Academy is a leading dental education institution offering comprehensive courses in advanced dentistry, implantology, and cosmetic procedures.</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Branding & Media -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-palette text-purple-600 mr-3"></i>
                            Branding & Media
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Upload and manage your website's visual identity</p>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Website Logo -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Website Logo</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors">
                                    <div class="mb-4">
                                        <img src="/images/logo.png" alt="Current Logo" class="w-20 h-20 mx-auto object-contain">
                                    </div>
                                    <i class="fas fa-upload text-gray-400 text-2xl mb-2"></i>
                                    <p class="text-gray-500 text-sm mb-2">Click to upload new logo</p>
                                    <p class="text-xs text-gray-400">PNG, JPG, SVG (Max: 2MB)</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>

                            <!-- Favicon -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Favicon</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors">
                                    <div class="mb-4">
                                        <div class="w-8 h-8 bg-blue-600 rounded mx-auto flex items-center justify-center">
                                            <i class="fas fa-tooth text-white text-sm"></i>
                                        </div>
                                    </div>
                                    <i class="fas fa-upload text-gray-400 text-2xl mb-2"></i>
                                    <p class="text-gray-500 text-sm mb-2">Upload favicon</p>
                                    <p class="text-xs text-gray-400">ICO, PNG (32x32px)</p>
                                    <input type="file" class="hidden" accept=".ico,.png">
                                </div>
                            </div>

                            <!-- Default Image -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Default Share Image</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors">
                                    <i class="fas fa-image text-gray-400 text-2xl mb-2"></i>
                                    <p class="text-gray-500 text-sm mb-2">Upload default image</p>
                                    <p class="text-xs text-gray-400">For social media sharing</p>
                                    <p class="text-xs text-gray-400">1200x630px recommended</p>
                                    <input type="file" class="hidden" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Theme & Colors -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-paint-brush text-green-600 mr-3"></i>
                            Theme & Colors
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Customize your website's color scheme and appearance</p>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Color Scheme -->
                            <div class="space-y-4">
                                <h3 class="font-medium text-gray-900">Color Scheme</h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Primary Color</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" value="#2563eb" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                            <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#2563eb">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Color</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" value="#10b981" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                            <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#10b981">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Accent Color</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" value="#f59e0b" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                            <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#f59e0b">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Text Color</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" value="#1f2937" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                            <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="#1f2937">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Theme Options -->
                            <div class="space-y-4">
                                <h3 class="font-medium text-gray-900">Theme Options</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-medium text-gray-700">Dark Mode Support</label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-medium text-gray-700">Rounded Corners</label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-medium text-gray-700">Animations</label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Font Family</label>
                                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="inter">Inter (Default)</option>
                                        <option value="roboto">Roboto</option>
                                        <option value="open-sans">Open Sans</option>
                                        <option value="lato">Lato</option>
                                        <option value="poppins">Poppins</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-address-book text-red-600 mr-3"></i>
                            Contact Information
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Business contact details and location</p>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="+1 (555) 123-4567" placeholder="+1 (555) 123-4567">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Contact Email</label>
                                <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="contact@provisionacademy.com" placeholder="contact@example.com">
                            </div>
                            <div class="lg:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Business Address</label>
                                <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter complete business address">123 Dental Street, Medical District, New York, NY 10001, United States</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Business Hours</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="Mon-Fri: 9:00 AM - 6:00 PM" placeholder="Mon-Fri: 9:00 AM - 6:00 PM">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Time Zone</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="America/New_York">Eastern Time (ET)</option>
                                    <option value="America/Chicago">Central Time (CT)</option>
                                    <option value="America/Denver">Mountain Time (MT)</option>
                                    <option value="America/Los_Angeles">Pacific Time (PT)</option>
                                    <option value="UTC">UTC</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-share-alt text-indigo-600 mr-3"></i>
                            Social Media Links
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Connect your social media profiles</p>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fab fa-facebook text-blue-600 mr-2"></i>Facebook
                                </label>
                                <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://facebook.com/yourpage">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fab fa-twitter text-blue-400 mr-2"></i>Twitter
                                </label>
                                <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://twitter.com/youraccount">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fab fa-instagram text-pink-600 mr-2"></i>Instagram
                                </label>
                                <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://instagram.com/youraccount">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fab fa-linkedin text-blue-700 mr-2"></i>LinkedIn
                                </label>
                                <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://linkedin.com/company/yourcompany">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fab fa-youtube text-red-600 mr-2"></i>YouTube
                                </label>
                                <input type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://youtube.com/yourchannel">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fab fa-whatsapp text-green-600 mr-2"></i>WhatsApp
                                </label>
                                <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="+1234567890">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Settings -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-search text-orange-600 mr-3"></i>
                            SEO Settings
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Search engine optimization configuration</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="dental education, implantology, cosmetic dentistry, dental courses" placeholder="Enter keywords separated by commas">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Google Analytics ID</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="G-XXXXXXXXXX">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Google Search Console</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter verification code">
                            </div>
                            <div class="flex items-center justify-between">
                                <label class="text-sm font-medium text-gray-700">Enable XML Sitemap</label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Advanced Settings -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-cogs text-gray-600 mr-3"></i>
                            Advanced Settings
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Technical configuration and maintenance options</p>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <h3 class="font-medium text-gray-900">Performance</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-medium text-gray-700">Enable Caching</label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-medium text-gray-700">Image Compression</label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <h3 class="font-medium text-gray-900">Security</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-medium text-gray-700">Maintenance Mode</label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-medium text-gray-700">SSL Redirect</label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-medium text-gray-900">Backup & Restore</h3>
                                    <p class="text-sm text-gray-600">Manage your website backups</p>
                                </div>
                                <div class="flex space-x-3">
                                    <button type="button" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                        <i class="fas fa-download mr-2"></i>Create Backup
                                    </button>
                                    <button type="button" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                        <i class="fas fa-upload mr-2"></i>Restore
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Save Actions -->
                <div class="flex justify-end space-x-4">
                    <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </button>
                    <button type="button" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                        <i class="fas fa-undo mr-2"></i>Reset to Default
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                        <i class="fas fa-save mr-2"></i>Save All Settings
                    </button>
                </div>

            </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // File upload handlers
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                console.log('File selected:', file.name);
                // Handle file upload logic here
            }
        });
    });

    // Color picker handlers
    document.querySelectorAll('input[type="color"]').forEach(colorInput => {
        colorInput.addEventListener('change', function(e) {
            const textInput = e.target.nextElementSibling;
            if (textInput && textInput.type === 'text') {
                textInput.value = e.target.value;
            }
        });
    });

    // Text color input handlers
    document.querySelectorAll('input[type="text"]').forEach(textInput => {
        if (textInput.previousElementSibling && textInput.previousElementSibling.type === 'color') {
            textInput.addEventListener('input', function(e) {
                const colorInput = e.target.previousElementSibling;
                if (colorInput && /^#[0-9A-F]{6}$/i.test(e.target.value)) {
                    colorInput.value = e.target.value;
                }
            });
        }
    });
</script>
@endpush