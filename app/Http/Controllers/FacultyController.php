<?php

namespace App\Http\Controllers;

class FacultyController extends Controller
{
    public function index()
    {
        return view('management.faculty.list');

    }
    public function classesList()
    {
        // Return the view for listing faculty classes
        return view('faculty.classes.list'); // Adjust the view path as needed
    }

}
