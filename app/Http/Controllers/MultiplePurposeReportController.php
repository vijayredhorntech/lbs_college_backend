<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiplePurposeReportController extends Controller
{
    public function index() {
        return view('reports.multipurpose_report');
    }
}
