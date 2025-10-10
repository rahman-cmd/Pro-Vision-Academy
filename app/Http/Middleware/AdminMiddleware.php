<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this area.');
        }

        // Check if user is admin
        if (!Auth::user()->isAdmin()) {
            // If user is student, redirect to student dashboard
            if (Auth::user()->isStudent()) {
                return redirect()->route('student.dashboard')->with('error', 'Access denied. You are not authorized to access admin area.');
            }
            
            // If user has no role or unknown role, redirect to home
            return redirect()->route('home')->with('error', 'Access denied. You are not authorized to access this area.');
        }

        return $next($request);
    }
}