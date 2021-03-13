<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminReportsController extends Controller
{
    function AdminReportsDashboard(){
        return view('admin.AdminReports');
    }
}
