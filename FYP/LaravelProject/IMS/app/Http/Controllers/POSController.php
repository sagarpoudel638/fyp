<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class POSController extends Controller
{
function POSDashboard(){return view('staff.POS');}
}
