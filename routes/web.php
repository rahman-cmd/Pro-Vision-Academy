<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

// Frontend Routes
Route::get('/', function () {
    return view('admin.dashboard');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/students', function () {
        return view('admin.students.index');
    })->name('students');
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
