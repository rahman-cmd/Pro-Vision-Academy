<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Speaker;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\News;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\WhyChooseSection;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        // Get hero sections
        $heroSections = HeroSection::active()->ordered()->get();

        // Get featured courses
        $featuredCourses = Course::where('is_featured', true)
            ->where('status', 'active')
            ->orderBy('start_date')
            ->limit(6)
            ->get();

        // Get upcoming courses
        $upcomingCourses = Course::where('start_date', '>', now())
            ->where('status', 'active')
            ->orderBy('start_date')
            ->limit(3)
            ->get();

        // Get international speakers
        $internationalSpeakers = Speaker::international()
            ->active()
            ->ordered()
            ->limit(4)
            ->get();

        // Get local speakers
        $localSpeakers = Speaker::local()
            ->active()
            ->ordered()
            ->limit(4)
            ->get();

        // Get featured testimonials
        $testimonials = Testimonial::featured()
            ->active()
            ->ordered()
            ->limit(6)
            ->get();

        // Get why choose sections
        $whyChooseSections = WhyChooseSection::active()
            ->ordered()
            ->get();

        // Get recent news
        $recentNews = News::published()
            ->latest()
            ->limit(3)
            ->get();

        // Get featured gallery items
        $galleryItems = Gallery::featured()
            ->active()
            ->ordered()
            ->limit(8)
            ->get();

        // Get about section
        $aboutSection = AboutSection::active()->first();

        return view('frontend.home', compact(
            'heroSections',
            'featuredCourses',
            'upcomingCourses',
            'internationalSpeakers',
            'localSpeakers',
            'testimonials',
            'whyChooseSections',
            'recentNews',
            'galleryItems',
            'aboutSection'
        ));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        $aboutSection = AboutSection::active()->first();
        $whyChooseSections = WhyChooseSection::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->limit(6)->get();

        return view('frontend.about', compact(
            'aboutSection',
            'whyChooseSections',
            'testimonials'
        ));
    }

    /**
     * Display the courses page.
     */
    public function courses(Request $request)
    {
        $query = Course::where('status', 'active');

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by level
        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Sort options
        $sort = $request->get('sort', 'start_date');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price');
                break;
            case 'price_high':
                $query->orderByDesc('price');
                break;
            case 'title':
                $query->orderBy('title');
                break;
            default:
                $query->orderBy('start_date');
        }

        $courses = $query->paginate(12);

        // Get categories for filter
        $categories = Course::where('status', 'active')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->sort();

        return view('frontend.courses', compact('courses', 'categories'));
    }

    /**
     * Display the speakers page.
     */
    public function speakers()
    {
        $internationalSpeakers = Speaker::international()
            ->active()
            ->ordered()
            ->get();

        $localSpeakers = Speaker::local()
            ->active()
            ->ordered()
            ->get();

        return view('frontend.speakers', compact(
            'internationalSpeakers',
            'localSpeakers'
        ));
    }

    /**
     * Display the news page.
     */
    public function news(Request $request)
    {
        $query = News::published();

        // Filter by category
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        $news = $query->latest()->paginate(9);

        // Get categories for filter
        $categories = News::getCategories();

        // Get featured news
        $featuredNews = News::featured()
            ->published()
            ->latest()
            ->limit(3)
            ->get();

        return view('frontend.news', compact('news', 'categories', 'featuredNews'));
    }

    /**
     * Display single news article.
     */
    public function newsDetail($slug)
    {
        $article = News::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Increment views
        $article->incrementViews();

        // Get related news
        $relatedNews = News::published()
            ->byCategory($article->category)
            ->where('id', '!=', $article->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('frontend.news-detail', compact('article', 'relatedNews'));
    }

    /**
     * Display the gallery page.
     */
    public function gallery(Request $request)
    {
        $query = Gallery::active();

        // Filter by category
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        $galleryItems = $query->ordered()->paginate(12);

        // Get categories for filter
        $categories = Gallery::getCategories();

        return view('frontend.gallery', compact('galleryItems', 'categories'));
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    /**
     * Handle contact form submission.
     */
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Here you would typically send an email or store the contact message
        // For now, we'll just return a success message

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }

    /**
     * Search functionality.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return redirect()->route('home');
        }

        // Search in courses
        $courses = Course::where('status', 'active')
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->limit(5)
            ->get();

        // Search in news
        $news = News::published()
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->limit(5)
            ->get();

        // Search in speakers
        $speakers = Speaker::active()
            ->where(function ($q) use ($query) {
                $q->where('full_name', 'like', "%{$query}%")
                  ->orWhere('specialization', 'like', "%{$query}%")
                  ->orWhere('bio', 'like', "%{$query}%");
            })
            ->limit(5)
            ->get();

        return view('frontend.search-results', compact(
            'query',
            'courses',
            'news',
            'speakers'
        ));
    }
}
