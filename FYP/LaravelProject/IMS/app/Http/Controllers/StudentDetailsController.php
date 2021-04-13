<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class StudentDetailsController extends Controller
{
    function StudentDetailsDashboard(){


        $studentdata = DB::table('courses')
        ->select('students.StudentName','users.name','payments.Payment','students.Gender','students.Address','students.PrimaryNumber','students.SecondaryNumber','courses.Course','courses.Fee')
        ->join('students','courses.id','students.course_id')
        ->join('users','students.user_id','users.id')
        ->leftjoin('payments','students.id','payments.student_id')->simplepaginate(10);
        return view('Staff.StudentDetails', compact('studentdata'));

    }


    public function simple(Request $request)
    {
        $studentdata = DB::table('courses')
        ->select('students.StudentName','users.name','payments.Payment','students.Gender','students.Address','students.PrimaryNumber','students.SecondaryNumber','courses.Course','courses.Fee')
        ->join('students','courses.id','students.course_id')
        ->join('users','students.user_id','users.id')
        ->leftjoin('payments','students.id','payments.student_id');
        if( $request->input('search')){
            $studentdata = $studentdata->where('StudentName', 'LIKE', "%" . $request->search . "%");
        }
        $studentdata = $studentdata->paginate(10);
        return view('Staff.StudentDetails', compact('studentdata'));
    }










}
