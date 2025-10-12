<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'student');

        if ($request->filled('search')) {
            $search = trim($request->get('search'));
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Optional filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        $students = $query->orderBy('created_at', 'desc')->paginate(15)->withQueryString();

        $stats = [
            'total' => User::where('role', 'student')->count(),
            'active' => User::where('role', 'student')->where('status', 'active')->count(),
            'pending' => User::where('role', 'student')->where('status', 'pending')->count(),
            'inactive' => User::where('role', 'student')->where('status', 'inactive')->count(),
        ];

        return view('admin.students.index', compact('students', 'stats'));
    }
}