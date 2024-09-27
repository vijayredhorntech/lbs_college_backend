<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsYearWiseController extends Controller
{
    public function index(Request $request){
        $year = $request->input('year'); // Get the input year

        // Fetch the students based on the input year
        if ($year) {
            $StudentList = Student::whereYear('date_of_birth', $year)->get();
        } else {

            $StudentList = Student::get()->take(10);
        }

        return view('reports.student_yearwise', compact('StudentList', 'year'));
    }
}
