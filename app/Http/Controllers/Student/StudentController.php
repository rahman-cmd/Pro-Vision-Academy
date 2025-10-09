<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display the student dashboard.
     */
    public function dashboard()
    {
        return view('student.dashboard');
    }

    /**
     * Display the student courses.
     */
    public function courses()
    {
        return view('student.courses');
    }

    /**
     * Display the student class schedule.
     */
    public function schedule()
    {
        return view('student.schedule');
    }

    /**
     * Display the student attendance.
     */
    public function attendance()
    {
        return view('student.attendance');
    }

    /**
     * Display the student assignments.
     */
    public function assignments()
    {
        return view('student.assignments');
    }

    /**
     * Display the student grades.
     */
    public function grades()
    {
        return view('student.grades');
    }

    /**
     * Display the student certificates.
     */
    public function certificates()
    {
        return view('student.certificates');
    }

    /**
     * Display the student profile.
     */
    public function profile()
    {
        return view('student.profile');
    }

    /**
     * Display the student settings.
     */
    public function settings()
    {
        return view('student.settings');
    }

    /**
     * Display the student login page.
     */
    public function login()
    {
        return view('student.login');
    }

    /**
     * Handle student login.
     */
    public function authenticate(Request $request)
    {
        // Login logic will be implemented later
        return redirect()->route('student.dashboard');
    }

    /**
     * Handle student logout.
     */
    public function logout()
    {
        // Logout logic will be implemented later
        return redirect()->route('student.login');
    }
}