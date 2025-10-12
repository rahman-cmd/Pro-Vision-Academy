<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\WhyChooseSectionController;
use App\Http\Controllers\Admin\SettingController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/speakers', [HomeController::class, 'speakers'])->name('speakers');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news/{slug}', [HomeController::class, 'newsDetail'])->name('news.detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Authentication Routes
Route::middleware('guest')->group(function () {
    // Registration Routes
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

    // Login Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Password Reset Routes
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Course Registration Routes (public)
Route::get('/registration', function () {
    return view('frontend.registration');
})->name('registration');

Route::post('/registration', function () {
    // Handle registration form submission
    // This will be implemented later with proper controller logic
    return redirect()->back()->with('success', 'Registration submitted successfully!');
})->name('registration.submit');

// Logout Route (authenticated users)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes - Protected by admin middleware
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Students Management
    Route::get('/students', [\App\Http\Controllers\Admin\StudentController::class, 'index'])->name('students');
    
    // Hero Section Management
    Route::resource('hero', HeroSectionController::class);
    
    // About Section Management  
    Route::resource('about', AboutSectionController::class);
    
    // Course Management
    Route::resource('courses', AdminCourseController::class);
    
    // Speaker Management
    Route::resource('speakers', SpeakerController::class);
    
    // Gallery Management
    Route::resource('gallery', GalleryController::class);
    
    // Testimonial Management
    Route::resource('testimonials', TestimonialController::class);
    
    // News Management
    Route::resource('news', NewsController::class);
    
    // Why Choose Section Management
    Route::resource('why-choose', WhyChooseSectionController::class);
    
    // Settings Management
    Route::resource('settings', SettingController::class);
});

// Student Panel Routes - Protected by student middleware
Route::prefix('student')->name('student.')->middleware(['auth', 'student'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/courses', [StudentController::class, 'courses'])->name('courses');
    Route::get('/schedule', [StudentController::class, 'schedule'])->name('schedule');
    Route::get('/attendance', [StudentController::class, 'attendance'])->name('attendance');
    Route::get('/assignments', [StudentController::class, 'assignments'])->name('assignments');
    Route::get('/grades', [StudentController::class, 'grades'])->name('grades');
    Route::get('/certificates', [StudentController::class, 'certificates'])->name('certificates');
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::get('/settings', [StudentController::class, 'settings'])->name('settings');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
