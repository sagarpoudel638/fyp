<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    function AdminSettingsDashboard(){
        return view('admin.AdminSettings');
    }
}
