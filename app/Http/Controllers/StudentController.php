<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return view('admin.student.index');
    }

    public function create(Student $student = null)
    {
       return view('admin.student.form')->with('student', $student);
    }
}
