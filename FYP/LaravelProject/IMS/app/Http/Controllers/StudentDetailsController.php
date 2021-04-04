<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class StudentDetailsController extends Controller
{
    function StudentDetailsDashboard(){
        $this->data['title'] = 'StudentDetails';
        $studentdata = DB::table('courses')
        ->select('students.StudentName','payments.Payment','students.Gender','students.Address','students.PrimaryNumber','students.SecondaryNumber','courses.Course','courses.Fee')
        ->join('students','courses.id','students.course_id')
        ->join('payments','students.id','payments.student_id')


        ->get()
        ;

        return view('staff.StudentDetails', compact('studentdata'), $this->data);

    }





}
