<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReportsController extends Controller
{
    function AdminReportsDashboard(){
        $studentdata = DB::table('students')
        ->select(
         DB::raw('count(*) as TotalStudent'),)
        ->get();

        $paymentdata = DB::table('payments')
        ->select(
         DB::raw('SUM(payments.Payment) as TotalPayment'),)
        ->get();


      return view('admin.AdminReports')->with (compact('studentdata', 'paymentdata'));
     }

     function AdminStudentReportsDashboard(){
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



      return view('admin.AdminStudentReports')->with('Course', json_encode($array));
     }



     function AdminFeeReportsDashboard(){
        $data = DB::table('courses')
        ->select(

         DB::raw('courses.Course as Course'),
         DB::raw('SUM(payments.Payment) as TotalFeeCollected '),)
         ->join('students','courses.id','students.course_id')
         ->join('payments','payments.student_id','students.id')

        ->groupBy('Course')
        ->get();
      $array[] = ['Course', 'TotalFeeCollected'];
      foreach($data as $key => $value)
      {
       $array[++$key] = [$value->Course, $value->TotalFeeCollected];
      }



      return view('admin.AdminFeeReport')->with('Course', json_encode($array));
     }


     public function StudentReportPrint()
     {
        $students = DB::table('courses')
        ->select(

         DB::raw('courses.Course as Course'),
         DB::raw('count(*) as number'),)
         ->join('students','courses.id','students.course_id')

        ->groupBy('Course')
        ->get();
           return view('admin.StudentReportPrint')->with('students', $students);;
     }


     public function FeeReportPrint()
     {
        $fee = DB::table('courses')
        ->select(

            DB::raw('courses.Course as Course'),
            DB::raw('SUM(payments.Payment) as TotalFeeCollected '),)
            ->join('students','courses.id','students.course_id')
            ->join('payments','payments.student_id','students.id')

           ->groupBy('Course')
           ->get();
           return view('admin.FeeReportPrint')->with('fee', $fee);;
     }


    }

