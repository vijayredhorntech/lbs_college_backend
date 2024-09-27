<?php

namespace App\Http\Controllers;


use App\Models\StudentDummy;
use Illuminate\Http\Request;
class StudentsReligionWiseController extends Controller
{
    public function index(Request $request){
        $year = $request->input('year'); // Get the input year

        // Fetch the students based on the input year
        if ($year) {
            $StudentList = StudentDummy::whereYear('dob', $year)->get();
        } else {
            $StudentList = StudentDummy::get(); // Fetch all students if no year is provided
        }

        return view('reports.religionwise_report',compact('StudentList', 'year'));
    }
}
