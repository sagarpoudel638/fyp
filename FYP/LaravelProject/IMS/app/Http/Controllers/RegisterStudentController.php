<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterStudentController extends Controller
{
    function RegisterStudentDashboard(){
        return view('staff.RegisterStudent');

    }
}
