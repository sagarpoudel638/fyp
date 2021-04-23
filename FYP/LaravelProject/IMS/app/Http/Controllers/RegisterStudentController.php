<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\payment;
use App\Models\student;
use App\Models\Users;
use Illuminate\Http\Request;


class RegisterStudentController extends Controller
{
    function RegisterStudentDashboard(){
        $course=Course::all();
        if(Session()->has('LoggedUser')){

            $user = Users::where('id','=', session('LoggedUser'))->first();
            $userdata = [
                'LoggedUserInfo'=> $user
            ];


        }
        //get data from table
		return view('staff.RegisterStudent',['course'=>$course],$userdata);

    }





    function registerStudent(Request $request)
    {

        if ($request->isMethod('get')) {
            return redirect()->back();

        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'StudentName' => 'required|min:3',
                'Address' => 'required|min:3',
                'PrimaryNumber' => 'required|min:3|numeric',
                'Email' => 'required|email',




            ]);
            $data['StudentName'] = $request->StudentName;
            $data['Address'] = $request->Address;
            $data['PrimaryNumber'] = $request->PrimaryNumber;
            $data['Email'] = $request->Email;
            $data['Gender'] = $request->gender;
            $data['course_id'] = $request->course;
            $data['user_id']=$request->user_id;







            if (student::create($data)) {
                return redirect()->route('RegisterStudentDashboard')->with('success', 'Student Registered Successfully');
            }
        }


    }









}
