<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Hash;
use App\Models\Admin;


class AdminAuthController extends Controller
{
    function adminlogin(){
        return view('AdminLogin');
    }






    function admincheck(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

         $user = Admin::where('email', '=', $request->email)->first();
         if($user){
             if($request->password == $user->password){
                 $request->session()->put('LoggedAdmin', $user->id );
                 return redirect('AdminReports');
             }
             else{
                 return back()->with('fail', 'Incorrect Password');
             }

         }
         else{
            return back()->with('fail','No account found for this username');
        }
    }






    function adminlogout(){
        if(session()->has('LoggedAdmin')){
            session()->pull('LoggedAdmin');
            return redirect('adminlogin');
        }
    }
}
