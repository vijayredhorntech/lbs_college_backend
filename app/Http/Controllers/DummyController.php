<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentDummyImport;
class DummyController extends Controller
{
    public function import(Request $request)
    {
        // Validate the file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        // Import the data
        Excel::import(new StudentDummyImport, $request->file('file'));
       

        return back()->with('success', 'Students imported successfully!');
    }
}
