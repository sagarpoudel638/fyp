<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class POSController extends Controller
{
    function POSDashboard(){
        return view('staff.POS');
    }
}
