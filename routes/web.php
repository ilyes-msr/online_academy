<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Dashboard\ArticlesController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\CourseMaterialsController;
use App\Http\Controllers\Dashboard\CoursesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/course/{course}', [WebsiteController::class, 'course'])->name('course.show');
Route::get('/courses', [WebsiteController::class, 'courses'])->name('courses');
Route::get('/courses/{category_id}', [WebsiteController::class, 'courses_by_category'])->name('courses_by_category');
Route::get('/mycourses', [WebsiteController::class, 'my_courses'])->name('courses.mine');

Route::get('/article/{article:slug}', [ArticlesController::class, 'show'])->name('article.show');
Route::get('/articles', [ArticlesController::class, 'all_articles'])->name('articles');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::redirect('/dashboard', '/')->name('dashboard');
});

Route::get('lang/{locale}', [LanguageController::class, 'switchLang'])->name('lang.switch');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/courses', CoursesController::class);
    Route::resource('/articles', ArticlesController::class);
    Route::resource('/{course_id}/materials', CourseMaterialsController::class);
});

Route::post('credit/checkout', [PurchaseController::class, 'creditCheckout'])->name('credit.checkout')->middleware('auth');
Route::post('/purchase', [PurchaseController::class, 'purchase'])->name('purchase')->middleware('auth');
Route::get('/material', [WebsiteController::class, 'material'])->name('material')->middleware('auth');

Route::post('/add_comment', [CommentsController::class, 'add_comment'])->name('comment.add')->middleware('auth');
Route::post('/add_reply', [CommentsController::class, 'add_reply'])->name('reply.add')->middleware('auth');

Route::middleware(['auth', 'check.purchase:course_id'])->group(function () {
    Route::get('/{course_id}/material/{material_id}', [WebsiteController::class, 'material'])->name('material');
});
