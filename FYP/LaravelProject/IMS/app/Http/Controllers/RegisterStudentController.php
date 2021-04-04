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


    public function findFee(Request $request){

		//it will get price if its id match with product id
		$p=Course::select('Fee')->where('id',$request->id)->first();

    	return response()->json($p);
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
                'SecondaryNumber' => 'required|min:3|numeric',




            ]);
            $data['StudentName'] = $request->StudentName;
            $data['Address'] = $request->Address;
            $data['PrimaryNumber'] = $request->PrimaryNumber;
            $data['SecondaryNumber'] = $request->SecondaryNumber;
            $data['Gender'] = $request->gender;
            $data['course_id'] = $request->course;
            $data['user_id']=$request->user_id;







            if (student::create($data)) {
                return redirect()->route('RegisterStudentDashboard')->with('success', 'Record is Inserted');
            }
        }


    }





}
