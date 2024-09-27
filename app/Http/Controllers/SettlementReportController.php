<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettlementReportController extends Controller
{
    public function index()
    {
        return view('reports.settlement_report');
    }
}
