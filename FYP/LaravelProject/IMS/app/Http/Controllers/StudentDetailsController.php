<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\payment;
use App\Models\Users;

use Illuminate\Support\Facades\DB;

class StudentDetailsController extends Controller
{
    function StudentDetailsDashboard(){


        $studentdata = DB::table('courses')
        ->select('students.StudentName','students.id','users.name','payments.Payment','students.Gender','students.Address','students.PrimaryNumber','students.SecondaryNumber','courses.Course','courses.Fee')
        ->join('students','courses.id','students.course_id')
        ->join('users','students.user_id','users.id')
        ->leftjoin('payments','students.id','payments.student_id')->simplepaginate(10);
        return view('Staff.StudentDetails', compact('studentdata'));

    }


    public function searchstudents(Request $request)
    {
        $studentdata = DB::table('courses')
        ->select('students.StudentName','students.id','users.name','payments.Payment','students.Gender','students.Address','students.PrimaryNumber','students.SecondaryNumber','courses.Course','courses.Fee')
        ->join('students','courses.id','students.course_id')
        ->join('users','students.user_id','users.id')
        ->leftjoin('payments','students.id','payments.student_id');
        if( $request->input('search')){
            $studentdata = $studentdata->where('StudentName', 'LIKE', "%" . $request->search . "%");
        }
        $studentdata = $studentdata->paginate(10);
        return view('Staff.StudentDetails', compact('studentdata'));
    }



    public function deleteStudent(Request $request)
    {
        $id = $request->User_id;
        if(student::findOrFail($id)->delete()){
            return redirect()->route('student')->with('success', 'Record is Deleted');
        }
    }

    public function editStudent(Request $request){
        $id= $request->User_id;
        $editstudent = student::findOrFail($id);
        return view('staff.StudentDetailsEdit', compact('editstudent'));

    }
    public function editActionStudentDetails(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'StudentName' => 'required|min:3',
                'Address' => 'required|min:3',
                'PrimaryNumber' => 'required|min:3|numeric',
                'SecondaryNumber' => 'required|min:3|numeric',

            ]);
            $data['StudentName'] = $request->StudentName;
            $data['Address'] = $request->Address;
            $data['PrimaryNumber'] = $request->PrimaryNumber;
            $data['SecondaryNumber'] = $request->SecondaryNumber;
            $id = $request->User_id;

            if(student::where('id',$id)->update($data)){
                return redirect()->route('student')->with('success', 'Record is Updated');
            }
        }
    }





    public function payStudent(Request $request){

        $course=Course::all();
        $id= $request->User_id;
        $paystudent = student::findOrFail($id);
        //get data from table
		return view('staff.StudentPayment',['course'=>$course], compact('paystudent'));


    }
    public function payStudentAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'Payment' => 'required',


            ]);
            $data['Payment'] = $request->Payment;
            $data['student_id'] = $request->student_id;
            $id = $request->student_id;

            if (payment::create($data)) {
                return redirect()->route('student')->with('success', 'Record is Inserted');
            }
        }
    }


    public function findFee(Request $request){


		$p=Course::select('Fee')->where('id',$request->id)->first();

    	return response()->json($p);
	}






}
