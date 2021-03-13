<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDetailsController extends Controller
{
    function StudentDetailsDashboard(){
        return view('staff.StudentDetails');
    }
}
