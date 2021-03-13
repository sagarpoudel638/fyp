<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMSController extends Controller
{
    function SMSDashboard(){
        return view('staff.SMS');
    }
}
