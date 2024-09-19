<?php

namespace App\Http\Controllers;

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
}
