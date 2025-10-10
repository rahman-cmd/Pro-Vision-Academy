<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\User;
use App\Models\News;
use App\Models\Speaker;
use App\Models\Testimonial;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Get basic statistics
        $stats = [
            'total_courses' => Course::count(),
            'active_courses' => Course::where('status', 'active')->count(),
            'total_students' => User::where('role', 'student')->count(),
            'total_registrations' => CourseRegistration::count(),
            'confirmed_registrations' => CourseRegistration::where('status', 'confirmed')->count(),
            'pending_registrations' => CourseRegistration::where('status', 'pending')->count(),
            'total_revenue' => CourseRegistration::where('payment_status', 'paid')->sum('amount_paid'),
            'total_speakers' => Speaker::count(),
            'active_speakers' => Speaker::where('status', 'active')->count(),
            'total_news' => News::count(),
            'published_news' => News::where('status', 'published')->count(),
            'total_testimonials' => Testimonial::count(),
            'active_testimonials' => Testimonial::where('status', 'active')->count(),
            'total_gallery_items' => Gallery::count(),
        ];

        // Recent registrations
        $recentRegistrations = CourseRegistration::with(['user', 'course'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Popular courses (by registration count)
        $popularCourses = Course::withCount('registrations')
            ->orderBy('registrations_count', 'desc')
            ->limit(5)
            ->get();

        // Monthly registration statistics
        $monthlyRegistrations = CourseRegistration::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('COUNT(*) as count'),
            DB::raw('SUM(amount_paid) as revenue')
        )
        ->where('created_at', '>=', now()->subMonths(12))
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();

        // Course status distribution
        $courseStatusDistribution = Course::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');

        // Registration status distribution
        $registrationStatusDistribution = CourseRegistration::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');

        // Upcoming courses
        $upcomingCourses = Course::where('start_date', '>', now())
            ->where('status', 'active')
            ->orderBy('start_date')
            ->limit(5)
            ->get();

        // Recent news
        $recentNews = News::where('status', 'published')
            ->orderBy('published_date', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentRegistrations',
            'popularCourses',
            'monthlyRegistrations',
            'courseStatusDistribution',
            'registrationStatusDistribution',
            'upcomingCourses',
            'recentNews'
        ));
    }

    /**
     * Get dashboard statistics for AJAX requests.
     */
    public function getStats()
    {
        $stats = [
            'total_courses' => Course::count(),
            'active_courses' => Course::where('status', 'active')->count(),
            'total_students' => User::where('role', 'student')->count(),
            'total_registrations' => CourseRegistration::count(),
            'confirmed_registrations' => CourseRegistration::where('status', 'confirmed')->count(),
            'pending_registrations' => CourseRegistration::where('status', 'pending')->count(),
            'total_revenue' => CourseRegistration::where('payment_status', 'paid')->sum('amount_paid'),
            'monthly_revenue' => CourseRegistration::where('payment_status', 'paid')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('amount_paid'),
        ];

        return response()->json($stats);
    }

    /**
     * Get chart data for dashboard.
     */
    public function getChartData(Request $request)
    {
        $type = $request->get('type', 'registrations');
        $period = $request->get('period', '12'); // months

        switch ($type) {
            case 'registrations':
                $data = CourseRegistration::select(
                    DB::raw('DATE_FORMAT(created_at, "%Y-%m") as period'),
                    DB::raw('COUNT(*) as count')
                )
                ->where('created_at', '>=', now()->subMonths($period))
                ->groupBy('period')
                ->orderBy('period')
                ->get();
                break;

            case 'revenue':
                $data = CourseRegistration::select(
                    DB::raw('DATE_FORMAT(created_at, "%Y-%m") as period'),
                    DB::raw('SUM(amount_paid) as count')
                )
                ->where('payment_status', 'paid')
                ->where('created_at', '>=', now()->subMonths($period))
                ->groupBy('period')
                ->orderBy('period')
                ->get();
                break;

            case 'courses':
                $data = Course::select(
                    DB::raw('DATE_FORMAT(created_at, "%Y-%m") as period'),
                    DB::raw('COUNT(*) as count')
                )
                ->where('created_at', '>=', now()->subMonths($period))
                ->groupBy('period')
                ->orderBy('period')
                ->get();
                break;

            default:
                $data = collect();
        }

        return response()->json($data);
    }
}
