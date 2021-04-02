<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class AdminStaffSettingsController extends Controller
{
    function AdminStaffSettingsDashboard(){
        $this->data['title'] = 'Staff';
        $staffData = Users::orderBy('id', 'desc')->simplePaginate(10);
        return view('admin.AdminStaffSettings', compact('staffData'), $this->data);
    }
}
