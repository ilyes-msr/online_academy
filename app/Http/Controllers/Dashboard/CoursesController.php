<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{

    public $courses;

    public function __construct(Course $courses)
    {
        $this->courses = $courses;
    }

    public function index()
    {
        $courses = $this->courses::with('category')->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.courses.create', compact('categories'));
    }

    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();

        $course = new Course;
        $course->title = $data['title'];
        $course->description = $data['description'];
        $course->price = $data['price'];
        $course->category_id = $data['category_id'];
        $course->image_path = $request->file('image_path')->store('images/courses', 'public');
        $course->published = false;

        $course->save();

        return redirect(route('courses.index'))->with('success', __('site.item_created_successfully'));
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('admin.courses.edit', compact('categories', 'course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {

        $data = $request->validated();

        $course->title = $data['title'];
        $course->description = $data['description'];
        $course->price = $data['price'];
        $course->category_id = $data['category_id'];
        $course->published = $data['published'];

        if ($request->hasFile('image_path')) {
            // Delete old image
            if (file_exists(public_path('storage/' . $course->image_path))) {
                unlink(public_path('storage/' . $course->image_path));
            }
            // Store new image
            $course->image_path = $request->file('image_path')->store('images/courses', 'public');
        }

        $course->save();

        return redirect(route('courses.index'))->with('success', __('site.item_updated_successfully'));
    }

    public function destroy(Course $course)
    {
        if (file_exists(public_path('storage/' . $course->image_path))) {
            unlink(public_path('storage/' . $course->image_path));
        }
        $course->delete();
        return redirect(route('courses.index'))->with('success', __('site.item_deleted_successfully'));
    }
}
