<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $courses = Course::where('published', true)->get();
        return view('welcome', compact('courses'));
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
        $title = "All Courses";
        return view('all_courses', compact('categories', 'courses', 'category_id', 'title'));
    }

    public function courses_by_category($category_id)
    {
        $title = "Category: " . Category::find($category_id)->name;
        $courses = Course::where(['published' => true, 'category_id' => $category_id])->get();
        $categories = Category::all();
        return view('all_courses', compact('categories', 'courses', 'category_id', 'title'));
    }
}
