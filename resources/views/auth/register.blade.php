<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pro Vision Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <!-- Logo and Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <img src="/images/logo.png" alt="Pro Vision Academy" class="h-16 w-16">
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Create Account</h1>
            <p class="text-gray-600 mt-2">Join Pro Vision Academy</p>
        </div>

        <!-- Registration Form -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- First Name -->
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user text-gray-400 mr-2"></i>First Name
                    </label>
                    <input type="text" id="first_name" name="first_name" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="Enter your first name"
                           value="{{ old('first_name') }}">
                    @error('first_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user text-gray-400 mr-2"></i>Last Name
                    </label>
                    <input type="text" id="last_name" name="last_name" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="Enter your last name"
                           value="{{ old('last_name') }}">
                    @error('last_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope text-gray-400 mr-2"></i>Email Address
                    </label>
                    <input type="email" id="email" name="email" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="your_email@example.com"
                           value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-phone text-gray-400 mr-2"></i>Phone Number
                    </label>
                    <input type="tel" id="phone" name="phone" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="+968 XXXXXXXX"
                           value="{{ old('phone') }}">
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- WhatsApp Available -->
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" id="whatsapp_available" name="whatsapp_available" value="1" 
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                               {{ old('whatsapp_available') ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-700">
                            <i class="fab fa-whatsapp text-green-500 mr-1"></i>This number is available on WhatsApp
                        </span>
                    </label>
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-calendar text-gray-400 mr-2"></i>Date of Birth
                    </label>
                    <input type="date" id="date_of_birth" name="date_of_birth" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           value="{{ old('date_of_birth') }}">
                    @error('date_of_birth')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-venus-mars text-gray-400 mr-2"></i>Gender
                    </label>
                    <select id="gender" name="gender" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        <option value="">Select Gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                        <option value="prefer_not_to_say" {{ old('gender') == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                    </select>
                    @error('gender')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nationality -->
                <div>
                    <label for="nationality" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-flag text-gray-400 mr-2"></i>Nationality <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nationality" name="nationality" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="Enter your nationality"
                           value="{{ old('nationality') }}">
                    @error('nationality')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                

                <!-- Clinical Experience -->
                <div>
                    <label for="clinical_experience" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-stethoscope text-gray-400 mr-2"></i>How many years of clinical experience do you have? <span class="text-red-500">*</span>
                    </label>
                    <select id="clinical_experience" name="clinical_experience" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        <option value="">Select experience level</option>
                        <option value="1-4" {{ old('clinical_experience') == '1-4' ? 'selected' : '' }}>1-4 years</option>
                        <option value="5-9" {{ old('clinical_experience') == '5-9' ? 'selected' : '' }}>5-9 years</option>
                        <option value="10+" {{ old('clinical_experience') == '10+' ? 'selected' : '' }}>10 years +</option>
                    </select>
                    @error('clinical_experience')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Oman License -->
                <div>
                    <label for="oman_license" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-certificate text-gray-400 mr-2"></i>Do you have a license to practice Dentistry in Oman? <span class="text-red-500">*</span>
                    </label>
                    <select id="oman_license" name="oman_license" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        <option value="">Select option</option>
                        <option value="yes" {{ old('oman_license') == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ old('oman_license') == 'no' ? 'selected' : '' }}>No</option>
                    </select>
                    @error('oman_license')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dental Degree -->
                <div>
                    <label for="dental_degree" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-graduation-cap text-gray-400 mr-2"></i>Which Dental Degree do you have? <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="dental_degree" name="dental_degree" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="e.g., BDS, Masters, PhD, etc."
                           value="{{ old('dental_degree') }}">
                    @error('dental_degree')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Graduation Institute -->
                <div>
                    <label for="graduation_institute" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-university text-gray-400 mr-2"></i>Which Institute did you graduate from? <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="graduation_institute" name="graduation_institute" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="Enter your graduation institute"
                           value="{{ old('graduation_institute') }}">
                    @error('graduation_institute')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Graduation Year -->
                <div>
                    <label for="graduation_year" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-calendar-alt text-gray-400 mr-2"></i>Which year did you graduate?
                    </label>
                    <input type="number" id="graduation_year" name="graduation_year" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="e.g., 2020"
                           min="1950" max="{{ date('Y') }}"
                           value="{{ old('graduation_year') }}">
                    @error('graduation_year')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Workplace -->
                <div>
                    <label for="current_workplace" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-building text-gray-400 mr-2"></i>What is the institution or practice name where you currently work?
                    </label>
                    <input type="text" id="current_workplace" name="current_workplace" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="Enter your current workplace"
                           value="{{ old('current_workplace') }}">
                    @error('current_workplace')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Implantology Experience -->
                <div>
                    <label for="implantology_experience" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-tooth text-gray-400 mr-2"></i>Have you had any previous training or experience related to Implantology? <span class="text-red-500">*</span>
                    </label>
                    <select id="implantology_experience" name="implantology_experience" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        <option value="">Select experience level</option>
                        <option value="very_little_to_none" {{ old('implantology_experience') == 'very_little_to_none' ? 'selected' : '' }}>Very little to none</option>
                        <option value="basic" {{ old('implantology_experience') == 'basic' ? 'selected' : '' }}>Basic</option>
                        <option value="intermediate" {{ old('implantology_experience') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="advanced" {{ old('implantology_experience') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                    </select>
                    @error('implantology_experience')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- How heard about course -->
                <div>
                    <label for="how_heard_about_course" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-bullhorn text-gray-400 mr-2"></i>How did you hear about this course?
                    </label>
                    <input type="text" id="how_heard_about_course" name="how_heard_about_course" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="e.g., Social media, colleague, website, etc."
                           value="{{ old('how_heard_about_course') }}">
                    @error('how_heard_about_course')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Enrollment Reason -->
                <div>
                    <label for="enrollment_reason" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-question-circle text-gray-400 mr-2"></i>Why do you wish to enroll on the Dental Implantology course?
                    </label>
                    <textarea id="enrollment_reason" name="enrollment_reason" rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                              placeholder="Please explain your motivation for enrolling in this course">{{ old('enrollment_reason') }}</textarea>
                    @error('enrollment_reason')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock text-gray-400 mr-2"></i>Password
                    </label>
                    <input type="password" id="password" name="password" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="Create a strong password">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock text-gray-400 mr-2"></i>Confirm Password
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="Confirm your password">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full gradient-bg text-white py-3 px-4 rounded-lg font-semibold hover:opacity-90 transition-opacity focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <i class="fas fa-user-plus mr-2"></i>Create Account
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-6">
                <p class="text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                        Sign In
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>