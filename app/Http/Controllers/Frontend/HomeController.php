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
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        // Get single hero section (first active)
        $heroSection = HeroSection::active()->ordered()->first();

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
        $testimonials = Testimonial::active()
            ->latest()
            ->limit(6)
            ->get();

        // Get why choose sections (single-record model; fetch active ones)
        $whyChooseSections = WhyChooseSection::active()->get();

        // Get recent news (raw)
        $newsRaw = News::published()
            ->latest()
            ->limit(3)
            ->get();
        // Prepare view-model for news items
        $newsItems = $this->transformNewsCollection($newsRaw);

        // Get featured gallery items
        $galleryItems = Gallery::active()->get();

        // Get about section
        $aboutSection = AboutSection::active()->first();

        // Settings for layout (footer/header)
        $setting = Setting::current();

        return view('frontend.home', compact(
            'heroSection',
            'featuredCourses',
            'upcomingCourses',
            'internationalSpeakers',
            'localSpeakers',
            'testimonials',
            'whyChooseSections',
            'galleryItems',
            'aboutSection',
            'newsItems',
            'setting'
        ));
    }


    // News

    /**
     * Display the news page.
     */
    public function news()
    {
        $news = News::published()->latest()->paginate(6);
        // Transform only the current page items for the view
        $newsItems = $this->transformNewsCollection($news->getCollection());

        $setting = Setting::current();
        
        return view('frontend.news', compact('news', 'newsItems', 'setting'));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        $aboutSection = AboutSection::active()->first();
        $whyChooseSections = WhyChooseSection::active()->get();
        $testimonials = Testimonial::active()->latest()->limit(6)->get();

        $setting = Setting::current();

        return view('frontend.about', compact(
            'aboutSection',
            'whyChooseSections',
            'testimonials',
            'setting'
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

        $setting = Setting::current();

        return view('frontend.courses', compact('courses', 'categories', 'setting'));
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

        $setting = Setting::current();

        return view('frontend.speakers', compact(
            'internationalSpeakers',
            'localSpeakers',
            'setting'
        ));
    }


    /**
     * Display the gallery page.
     */
    public function gallery(Request $request)
    {
        // Fetch active gallery items, newest first
        $galleryItems = Gallery::active()->get();

        $setting = Setting::current();

        return view('frontend.gallery', compact('galleryItems', 'setting'));
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        $setting = Setting::current();
        return view('frontend.contact', compact('setting'));
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

        $setting = Setting::current();

        return view('frontend.search-results', compact(
            'query',
            'courses',
            'news',
            'speakers',
            'setting'
        ));
    }

    // ---------------------
    // Helpers (Data Layer)
    // ---------------------

    /**
     * Transform a collection of News models into a simple view-model array.
     *
     * @param \Illuminate\Support\Collection|array $collection
     * @return \Illuminate\Support\Collection
     */
    protected function transformNewsCollection($collection)
    {
        return collect($collection)->map(function (News $item) {
            return [
                'title' => $item->title,
                'excerpt' => Str::limit($item->excerpt ?? '', 140),
                'image_url' => $this->resolveImageUrl($item->image),
                'published_date' => $item->published_date ? $item->published_date->format('F d, Y') : null,
                'url' => route('news.detail', $item->slug),
            ];
        });
    }

    /**
     * Resolve final image URL for a stored or external path.
     */
    protected function resolveImageUrl(?string $image): ?string
    {
        if (empty($image)) {
            return null;
        }

        if (preg_match('/^(https?:\\/\\/|data:)/', $image)) {
            return $image;
        }

        if (preg_match('/^(storage\\/|uploads\\/)/', $image)) {
            return asset($image);
        }

        return asset('storage/' . ltrim($image, '/'));
    }
}
