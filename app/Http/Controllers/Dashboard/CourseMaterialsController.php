<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMaterialRequest;
use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;

class CourseMaterialsController extends Controller
{
    public $course_material;

    public function __construct(CourseMaterial $course_material)
    {
        $this->course_material = $course_material;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($course_id)
    {
        $course = Course::find($course_id);
        if ($course) {
            $materials = $this->course_material::where('course_id', $course_id)->get();
            return view('admin.materials.index', compact('materials', 'course'));
        } else {
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($course_id)
    {
        $course = Course::find($course_id);
        if ($course) {
            return view('admin.materials.create', compact('course_id'));
        } else {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMaterialRequest $request, $course_id)
    {
        $data = $request->validated();
        $exists = Course::find($course_id);

        if ($exists) {
            $material = new CourseMaterial;
            $material->title = $data['title'];
            $material->description = $data['description'];
            $material->video_path = $data['video_path'];
            $material->course_id = $course_id;
            $material->save();

            return redirect(route('materials.index', $course_id))->with('success', 'Material created successfully');
        } else {
            return redirect(route('materials.index', $course_id));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $course_id, CourseMaterial $material)
    {
        return redirect(route('materials.index', $course_id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $course_id, CourseMaterial $material)
    {
        return view('admin.materials.edit', compact('course_id', 'material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateMaterialRequest $request, string $course_id, CourseMaterial $material)
    {

        $data = $request->validated();

        $material->title = $data['title'];
        $material->description = $data['description'];
        $material->video_path = $data['video_path'];

        $material->save();

        return redirect(route('materials.index', $course_id))->with('success', 'material updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $course_id, CourseMaterial $material)
    {
        $material->delete();
        return redirect(route('materials.index', $course_id))->with('success', 'materials deleted successfully');
    }
}
