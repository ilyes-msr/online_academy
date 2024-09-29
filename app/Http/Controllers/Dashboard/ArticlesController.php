<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:6',
            'body' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        $article = new Article;
        $article->title = $validated['title'];
        $article->body = $validated['body'];
        $article->image_path = $request->file('image_path')->store('images/articles', 'public');

        $article->slug = $this->createUniqueSlug($validated['title'], Article::class);

        $article->save();

        return redirect(route('articles.index'))->with('success', __('site.item_created_successfully'));
    }

    public function createUniqueSlug($title, $model)
    {
        // Generate initial slug
        $slug = Str::slug($title);

        // Check if the slug already exists in the database
        $originalSlug = $slug;
        $count = 1;

        // Keep appending a number until we find a unique slug
        while ($model::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|min:6',
            'body' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        $article->title = $validated['title'];
        $article->body = $validated['body'];

        if ($request->hasFile('image_path')) {
            // Delete old image
            if (file_exists(public_path('storage/' . $article->image_path))) {
                unlink(public_path('storage/' . $article->image_path));
            }
            // Store new image
            $article->image_path = $request->file('image_path')->store('images/articles', 'public');
        }

        $article->slug = $this->createUniqueSlug($validated['title'], Article::class);
        $article->save();

        return redirect(route('articles.index'))->with('success', __('site.item_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {

        if (file_exists(public_path('storage/' . $article->image_path))) {
            unlink(public_path('storage/' . $article->image_path));
        }

        $article->delete();
        return redirect(route('articles.index'))->with('success', __('site.item_deleted_successfully'));
    }
}
