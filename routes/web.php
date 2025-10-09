<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

// Frontend Routes
Route::get('/', function () {
    return view('index');
});

// Registration Routes
Route::get('/register', function () {
    return view('frontend.register');
})->name('register');

Route::post('/register', function () {
    // Handle registration form submission
    // This will be implemented later with proper controller logic
    return redirect()->route('login')->with('success', 'Registration successful! Please login.');
})->name('register.submit');

// Login Routes
Route::get('/login', function () {
    return view('frontend.login');
})->name('login');

Route::post('/login', function () {
    // Handle login form submission
    // This will be implemented later with proper controller logic
    return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
})->name('login.submit');

// Password Reset Routes
Route::get('/forgot-password', function () {
    return view('frontend.forgot-password');
})->name('password.request');

Route::get('/registration', function () {
    return view('frontend.registration');
})->name('registration');

Route::post('/registration', function () {
    // Handle registration form submission
    // This will be implemented later with proper controller logic
    return redirect()->back()->with('success', 'Registration submitted successfully!');
})->name('registration.submit');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/students', function () {
        return view('admin.students.index');
    })->name('students');
    
    // Section Management Routes
    Route::get('/hero', function () {
        return view('admin.hero.index');
    })->name('hero');
    
    Route::get('/about', function () {
        return view('admin.about.index');
    })->name('about');
    
    Route::get('/courses', function () {
        return view('admin.courses.index');
    })->name('courses');
    
    Route::get('/speakers', function () {
        return view('admin.speakers.index');
    })->name('speakers');
    
    Route::get('/gallery', function () {
        return view('admin.gallery.index');
    })->name('gallery');
    
    Route::get('/testimonials', function () {
        return view('admin.testimonials.index');
    })->name('testimonials');
    
    Route::get('/news', function () {
        return view('admin.news.index');
    })->name('news');
    
    Route::get('/tabs', function () {
        return view('admin.tabs.index');
    })->name('tabs');
    
    Route::get('/why-choose', function () {
        return view('admin.why_choose.index');
    })->name('why_choose');
    
    Route::get('/settings', function () {
        return view('admin.settings.index');
    })->name('settings');

    
});

// Student Panel Routes
Route::prefix('student')->name('student.')->group(function () {
    // Authentication Routes
    Route::get('/login', [StudentController::class, 'login'])->name('login');
    Route::post('/login', [StudentController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
    
    // Protected Student Routes (add middleware later)
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/courses', [StudentController::class, 'courses'])->name('courses');
    Route::get('/schedule', [StudentController::class, 'schedule'])->name('schedule');
    Route::get('/attendance', [StudentController::class, 'attendance'])->name('attendance');
    Route::get('/assignments', [StudentController::class, 'assignments'])->name('assignments');
    Route::get('/grades', [StudentController::class, 'grades'])->name('grades');
    Route::get('/certificates', [StudentController::class, 'certificates'])->name('certificates');
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::get('/settings', [StudentController::class, 'settings'])->name('settings');
});
