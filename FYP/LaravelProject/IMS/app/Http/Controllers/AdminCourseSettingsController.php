<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class AdminCourseSettingsController extends Controller
{
    function AdminCourseSettingsDashboard(){
        return view('admin.AdminCourseSettings');
    }
}
