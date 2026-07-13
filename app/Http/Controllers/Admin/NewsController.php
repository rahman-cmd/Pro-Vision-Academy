<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('published_date', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('admin.news.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'content'          => 'required|string',
            'excerpt'          => 'nullable|string|max:500',
            'image'            => 'nullable|image|max:2048',
            'category'         => 'nullable|string|max:100',
            'author'           => 'nullable|string|max:100',
            'published_date'   => 'nullable|date',
            'status'           => 'required|in:published,draft,scheduled',
            'is_featured'      => 'sometimes|boolean',
            'meta_description' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = store_public_upload($request->file('image'), 'news');
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['views'] = 0;

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.news.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.news.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'content'          => 'required|string',
            'excerpt'          => 'nullable|string|max:500',
            'image'            => 'nullable|image|max:2048',
            'category'         => 'nullable|string|max:100',
            'author'           => 'nullable|string|max:100',
            'published_date'   => 'nullable|date',
            'status'           => 'required|in:published,draft,scheduled',
            'is_featured'      => 'sometimes|boolean',
            'meta_description' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            delete_public_upload($news->image);
            $validated['image'] = store_public_upload($request->file('image'), 'news');
        }

        $validated['is_featured'] = $request->boolean('is_featured');

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);

        delete_public_upload($news->image);

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News article deleted successfully.');
    }
}
