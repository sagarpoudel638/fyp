<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReportsController extends Controller
{
    function AdminReportsDashboard(){
        $data = DB::table('courses')
        ->select(

         DB::raw('courses.Course as Course'),
         DB::raw('count(*) as number'),)
         ->join('students','courses.id','students.course_id')

        ->groupBy('Course')
        ->get();
      $array[] = ['Course', 'Number'];
      foreach($data as $key => $value)
      {
       $array[++$key] = [$value->Course, $value->number];
      }



      return view('admin.AdminReports')->with('Course', json_encode($array));
     }
    }

