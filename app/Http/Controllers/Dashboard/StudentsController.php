<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class StudentsController extends Controller
{
    public function index()
    {
        $students = User::where('role_id', 2)->get();
        return view('admin.students', compact('students'));
    }
}
