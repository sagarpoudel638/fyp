<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffSettingsController extends Controller
{
    function StaffSettingsDashboard(){
        return view('staff.Settings');
    }
}
