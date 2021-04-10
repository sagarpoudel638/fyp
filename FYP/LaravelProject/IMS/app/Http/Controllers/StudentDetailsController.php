<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class StudentDetailsController extends Controller
{
    function StudentDetailsDashboard(){


        return view('staff.StudentDetails');

    }



    function searchAction(Request $request)
    {

     if($request->ajax())
     {
      $result = '';

      $queries = $request->get('query');
      if($queries != '')
      {
       $studentdata = DB::table('courses')
       ->select('students.StudentName','users.name','payments.Payment','students.Gender','students.Address','students.PrimaryNumber','students.SecondaryNumber','courses.Course','courses.Fee')
       ->join('students','courses.id','students.course_id')
       ->join('users','students.user_id','users.id')
       ->leftjoin('payments','students.id','payments.student_id')
    ->where('students.StudentName', 'like', '%'.$queries.'%' )
    ->orderBy('students.id', 'desc')
    ->get();


      }
      else
      {

       $studentdata =  DB::table('courses')
       ->select('students.StudentName','users.name','payments.Payment','students.Gender','students.Address','students.PrimaryNumber','students.SecondaryNumber','courses.Course','courses.Fee')
       ->join('students','courses.id','students.course_id')
       ->join('users','students.user_id','users.id')
       ->leftjoin('payments','students.id','payments.student_id')
        ->orderBy('students.id', 'desc')
         ->get();
      }


      $total_row = $studentdata ->count();

      if($total_row > 0)
      {

       foreach($studentdata as $row)
       {

        $result .= '
        <tr id="livesearchcustomer">


        <td>'.$row->StudentName.'</td>
        <td>'.$row->Gender.'</td>
        <td>'.$row->Address.'</td>
        <td>'.$row->PrimaryNumber.'</td>
        <td>'.$row->SecondaryNumber.'</td>
        <td>'.$row->Course.'</td>
        <td>'.$row->Fee.'</td>
        <td>'.$row->Payment.'</td>
        <td>'.$row->name.'</td>



         <td><a href="" class="edit"> Edit</a></td>
        <td> <a href="" class="delete"> Delete</a></td>

        <td><a href="" class="edit" > Pay </a> </td>


        </tr>
        ';
       }
      }
      else
      {
       $result = '
       <tr>
        <td align="center" colspan="10">No Data Found</td>
       </tr>
       ';
      }
      $studentdata = array(
       'table_data_student'  => $result,

      );

      echo json_encode($studentdata);
     }
    }





}
