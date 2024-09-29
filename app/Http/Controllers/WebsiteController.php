<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class WebsiteController extends Controller
{
    public function index()
    {
        $courses = Course::where('published', true)->get();
        $articles = Article::latest()->get();
        return view('welcome', compact('courses', 'articles'));
    }

    public function course(Course $course)
    {
        return view('course', compact('course'));
    }

    public function courses()
    {
        $courses = Course::where('published', true)->get();
        $categories = Category::all();
        $category_id = -1;
        $title = __('site.all_courses');
        return view('all_courses', compact('categories', 'courses', 'category_id', 'title'));
    }

    public function courses_by_category($category_id)
    {
        $title = __('site.category') . ": " . Category::find($category_id)->name;
        $courses = Course::where(['published' => true, 'category_id' => $category_id])->get();
        $categories = Category::all();
        return view('all_courses', compact('categories', 'courses', 'category_id', 'title'));
    }
    public function my_courses()
    {
        $title = __('site.my_courses');
        $courses = auth()->user()->courses;
        // dd($courses);
        $category_id = 0;
        $categories = Category::all();
        return view('all_courses', compact('categories', 'courses', 'title', 'category_id'));
    }

    public function material($courseId, $materialId)
    {
        $material = CourseMaterial::findOrFail($materialId);
        $comments = $material->comments;
        return view('material', compact('material', 'comments'));
    }

    public function article(Article $article)
    {
        $article->nb_views++;
        $article->save();
        return view('article', compact('article'));
    }

    public function articles()
    {
        $articles = Article::latest()->paginate(5);
        $title = "Blog";
        return view('all_articles', compact('articles', 'title'));
    }
}
