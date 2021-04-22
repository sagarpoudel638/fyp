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

        $TotalCustomer = DB::table('customer_details')
        ->select(
         DB::raw('count(*) as TotalCustomer'),)
        ->get();

        $TotalSales = DB::table('order_details')
        ->select(
         DB::raw('SUM(order_details.AmountPaid) as TotalSales'),)
        ->get();
      return view('admin.AdminReports')->with (compact('studentdata', 'paymentdata','TotalCustomer','TotalSales'));
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


function AdminSalesReportsDashboard(){
        $data = DB::table('order_details')
        ->select(

        DB::raw('updated_at as Date '),
         DB::raw('SUM(order_details.AmountPaid) as TotalSales '),)


        ->groupBy('Date')
        ->get();
      $array[] = ['Date', 'TotalSales'];
      foreach($data as $key => $value)
      {
       $array[++$key] = [$value->Date, $value->TotalSales];
      }



      return view('admin.AdminSalesReport')->with('Sales', json_encode($array));
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


     public function SalesReportPrint()
     {
        $sales = DB::table('order_details')
        ->select(

        DB::raw('updated_at as Date '),
         DB::raw('SUM(order_details.AmountPaid) as TotalSales '),)


        ->groupBy('Date')
        ->get();

           return view('admin.SalesReportPrint')->with('TotalSales', $sales);;
     }

    }

