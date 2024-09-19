<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\CourseMaterialsController;
use App\Http\Controllers\Dashboard\CoursesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WebsiteController::class, 'index']);
Route::get('/course/{course}', [WebsiteController::class, 'course'])->name('course.show');
Route::get('/courses', [WebsiteController::class, 'courses'])->name('courses');
Route::get('/courses/{category_id}', [WebsiteController::class, 'courses_by_category'])->name('courses_by_category');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('lang/{locale}', [LanguageController::class, 'switchLang'])->name('lang.switch');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/courses', CoursesController::class);
    Route::resource('/{course_id}/materials', CourseMaterialsController::class);
});
