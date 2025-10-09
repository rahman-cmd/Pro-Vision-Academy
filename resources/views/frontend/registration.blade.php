<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Implantology Course Registration - Pro Vision Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .form-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="gradient-bg text-white py-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <div class="flex justify-center mb-4">
                    <img src="/images/logo.png" alt="Pro Vision Academy" class="h-16 w-16">
                </div>
                <h1 class="text-4xl font-bold mb-4">Dental Implantology Course Registration</h1>
                <p class="text-xl mb-2">Pro Vision Academy in partnership with The London Dental Centre</p>
                <p class="text-lg opacity-90">Muscat, Oman</p>
            </div>
        </div>
    </div>

    <!-- Course Information Banner -->
    <div class="bg-blue-600 text-white py-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div class="flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-2xl mr-3"></i>
                    <div>
                        <h3 class="font-semibold">Course Date</h3>
                        <p>Starting November 2025</p>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <i class="fas fa-money-bill-wave text-2xl mr-3"></i>
                    <div>
                        <h3 class="font-semibold">Early Bird Fee</h3>
                        <p>8500 RO (Until Sept 2025)</p>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <i class="fas fa-users text-2xl mr-3"></i>
                    <div>
                        <h3 class="font-semibold">Limited Seats</h3>
                        <p>Register Now!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Form -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Important Notice -->
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 mb-8">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-yellow-400 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-yellow-800">Important Notice</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>• Your seat is not guaranteed until payment is made</p>
                            <p>• Limited seats available - register early</p>
                            <p>• Early bird discount available until end of September 2025</p>
                            <p>• Regular fee: 8800 RO</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="bg-white rounded-lg form-shadow p-8">
                <form action="#" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Personal Information -->
                    <div class="border-b border-gray-200 pb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">
                            <i class="fas fa-user text-blue-600 mr-3"></i>Personal Information
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                <input type="text" name="full_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your full name">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="your.email@example.com">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="+968 XXXXXXXX">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nationality *</label>
                                <select name="nationality" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Nationality</option>
                                    <option value="Omani">Omani</option>
                                    <option value="Indian">Indian</option>
                                    <option value="Pakistani">Pakistani</option>
                                    <option value="Bangladeshi">Bangladeshi</option>
                                    <option value="Egyptian">Egyptian</option>
                                    <option value="Jordanian">Jordanian</option>
                                    <option value="Lebanese">Lebanese</option>
                                    <option value="Syrian">Syrian</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gender *</label>
                                <select name="gender" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                            <textarea name="address" required rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your complete address"></textarea>
                        </div>
                    </div>

                    <!-- Professional Information -->
                    <div class="border-b border-gray-200 pb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">
                            <i class="fas fa-tooth text-blue-600 mr-3"></i>Professional Information
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Professional Status *</label>
                                <select name="professional_status" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Status</option>
                                    <option value="Dentist">Dentist</option>
                                    <option value="Dental Student">Dental Student</option>
                                    <option value="Dental Specialist">Dental Specialist</option>
                                    <option value="Oral Surgeon">Oral Surgeon</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Years of Experience</label>
                                <select name="experience_years" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Experience</option>
                                    <option value="0-1">0-1 years</option>
                                    <option value="2-5">2-5 years</option>
                                    <option value="6-10">6-10 years</option>
                                    <option value="11-15">11-15 years</option>
                                    <option value="16+">16+ years</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">License Number</label>
                                <input type="text" name="license_number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Professional license number">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Workplace</label>
                                <input type="text" name="workplace" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Hospital/Clinic name">
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Educational Background</label>
                            <textarea name="education" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Dental degree, university, graduation year, etc."></textarea>
                        </div>
                    </div>

                    <!-- Course Preferences -->
                    <div class="border-b border-gray-200 pb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">
                            <i class="fas fa-graduation-cap text-blue-600 mr-3"></i>Course Preferences
                        </h2>
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Previous Implantology Experience *</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="implant_experience" value="Beginner" class="mr-3 text-blue-600">
                                        <span>Beginner - No previous experience</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="implant_experience" value="Intermediate" class="mr-3 text-blue-600">
                                        <span>Intermediate - Some theoretical knowledge</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="implant_experience" value="Advanced" class="mr-3 text-blue-600">
                                        <span>Advanced - Some practical experience</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Learning Objectives</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="objectives[]" value="Basic Implant Placement" class="mr-3 text-blue-600">
                                        <span>Basic Implant Placement Techniques</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="objectives[]" value="Advanced Surgical Techniques" class="mr-3 text-blue-600">
                                        <span>Advanced Surgical Techniques</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="objectives[]" value="Bone Grafting" class="mr-3 text-blue-600">
                                        <span>Bone Grafting Procedures</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="objectives[]" value="Prosthetic Restoration" class="mr-3 text-blue-600">
                                        <span>Prosthetic Restoration</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="objectives[]" value="Case Management" class="mr-3 text-blue-600">
                                        <span>Complete Case Management</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Special Requirements or Medical Conditions</label>
                                <textarea name="special_requirements" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Any dietary restrictions, accessibility needs, or medical conditions we should be aware of"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="border-b border-gray-200 pb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">
                            <i class="fas fa-credit-card text-blue-600 mr-3"></i>Payment Information
                        </h2>
                        
                        <div class="bg-blue-50 rounded-lg p-6 mb-6">
                            <h3 class="text-lg font-semibold text-blue-900 mb-4">Course Fees</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-white rounded-lg p-4 border-2 border-green-200">
                                    <h4 class="font-semibold text-green-800">Early Bird Special</h4>
                                    <p class="text-2xl font-bold text-green-600">8500 RO</p>
                                    <p class="text-sm text-green-700">Valid until September 30, 2025</p>
                                </div>
                                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                                    <h4 class="font-semibold text-gray-800">Regular Fee</h4>
                                    <p class="text-2xl font-bold text-gray-600">8800 RO</p>
                                    <p class="text-sm text-gray-700">After September 30, 2025</p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Payment Method *</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="Bank Transfer" class="mr-3 text-blue-600" required>
                                    <span>Bank Transfer</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="Credit Card" class="mr-3 text-blue-600">
                                    <span>Credit Card</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="Cash" class="mr-3 text-blue-600">
                                    <span>Cash Payment</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Emergency Contact -->
                    <div class="border-b border-gray-200 pb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">
                            <i class="fas fa-phone text-blue-600 mr-3"></i>Emergency Contact
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Emergency Contact Name</label>
                                <input type="text" name="emergency_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Full name">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Relationship</label>
                                <input type="text" name="emergency_relationship" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., Spouse, Parent, Sibling">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Emergency Contact Phone</label>
                                <input type="tel" name="emergency_phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="+968 XXXXXXXX">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Emergency Contact Email</label>
                                <input type="email" name="emergency_email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="emergency@example.com">
                            </div>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="pb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">
                            <i class="fas fa-file-contract text-blue-600 mr-3"></i>Terms and Conditions
                        </h2>
                        
                        <div class="bg-gray-50 rounded-lg p-6 mb-6">
                            <div class="space-y-4 text-sm text-gray-700">
                                <p><strong>Registration Policy:</strong> Your registration is not confirmed until full payment is received.</p>
                                <p><strong>Cancellation Policy:</strong> Cancellations made 30 days before the course start date are eligible for a full refund minus processing fees.</p>
                                <p><strong>Course Materials:</strong> All course materials, certificates, and refreshments are included in the course fee.</p>
                                <p><strong>Attendance:</strong> Full attendance is required to receive the course certificate.</p>
                                <p><strong>Photography:</strong> Photos and videos may be taken during the course for promotional purposes.</p>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <label class="flex items-start">
                                <input type="checkbox" name="terms_accepted" required class="mr-3 mt-1 text-blue-600">
                                <span class="text-sm text-gray-700">I have read and agree to the terms and conditions, cancellation policy, and course requirements. *</span>
                            </label>
                            
                            <label class="flex items-start">
                                <input type="checkbox" name="marketing_consent" class="mr-3 mt-1 text-blue-600">
                                <span class="text-sm text-gray-700">I consent to receive marketing communications about future courses and events from Pro Vision Academy.</span>
                            </label>
                            
                            <label class="flex items-start">
                                <input type="checkbox" name="photo_consent" class="mr-3 mt-1 text-blue-600">
                                <span class="text-sm text-gray-700">I consent to the use of my photographs/videos taken during the course for promotional purposes.</span>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-12 rounded-lg text-lg transition-colors duration-300 transform hover:scale-105">
                            <i class="fas fa-paper-plane mr-3"></i>Submit Registration
                        </button>
                        <p class="text-sm text-gray-600 mt-4">
                            After submission, you will receive payment instructions via email.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold mb-4">Need Help with Registration?</h2>
                <p class="text-xl text-gray-300">Contact our team for assistance</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <i class="fas fa-user-md text-3xl text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Dr. Hamood Al Barram</h3>
                    <p class="text-gray-300">+968 97004488</p>
                </div>
                
                <div>
                    <i class="fas fa-user text-3xl text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Majda Al Balushi</h3>
                    <p class="text-gray-300">+968 94499876</p>
                </div>
                
                <div>
                    <i class="fas fa-user-md text-3xl text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Dr. Ola Hassan</h3>
                    <p class="text-gray-300">+968 79374421</p>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <p class="text-lg">
                    <i class="fas fa-envelope mr-2"></i>
                    <a href="mailto:omandentalcourses@gmail.com" class="text-blue-400 hover:text-blue-300">omandentalcourses@gmail.com</a>
                </p>
                <p class="text-gray-300 mt-2">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    Pro Vision Academy, Mawaleh, Muscat, Oman
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 Pro Vision Academy. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Form validation and enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            
            // Phone number formatting
            const phoneInputs = document.querySelectorAll('input[type="tel"]');
            phoneInputs.forEach(input => {
                input.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.startsWith('968')) {
                        value = '+' + value;
                    } else if (value.length > 0 && !value.startsWith('968')) {
                        value = '+968' + value;
                    }
                    e.target.value = value;
                });
            });
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i>Processing...';
                submitBtn.disabled = true;
                
                // Simulate form submission (replace with actual submission logic)
                setTimeout(() => {
                    alert('Registration submitted successfully! You will receive payment instructions via email.');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        });
    </script>
</body>
</html>