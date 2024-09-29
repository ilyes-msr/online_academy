<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public const STUDENT = 2;
    public const ADMIN = 1;

    public function index()
    {
        $courses_count = Course::count();
        $articles_count = Article::count();
        $categories_count = Category::count();
        $students_count = User::where('role_id', self::STUDENT)->count();
        return view('admin.dashboard', compact('courses_count', 'categories_count', 'students_count', 'articles_count'));
    }
}
