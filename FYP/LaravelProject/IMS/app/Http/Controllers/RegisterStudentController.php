<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class RegisterStudentController extends Controller
{
    function RegisterStudentDashboard(){
        $course=Course::all();//get data from table
		return view('staff.RegisterStudent',['course'=>$course]);

    }
    public function course(){

		$course=Course::all();//get data from table
		return view('staff.RegisterStudent',['course'=>$course]);//sent data to view

	}

    public function findFee(Request $request){

		//it will get price if its id match with product id
		$p=Course::select('Fee')->where('id',$request->id)->first();

    	return response()->json($p);
	}


}
