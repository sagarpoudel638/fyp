<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminStaffSettingsController extends Controller
{
    function AdminStaffSettingsDashboard(){
        return view('admin.AdminStaffSettings');
    }
}
