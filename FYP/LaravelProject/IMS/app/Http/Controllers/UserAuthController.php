<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Hash;
use App\Models\Users;

class UserAuthController extends Controller
{
    function login(){
        return view('StaffLogin');
    }



    function create( Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $user =new Users;
        $user->name = $request -> name;
        $user->email = $request -> email;
        $user->password = Hash::make($request -> password);
        $query = $user->save();

        if ($query){
            return back()->with('Success','You have been registered');

        }
        else{return back()->with('fail','Error Occured');}


    }
    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

         $user = Users::where('email', '=', $request->email)->first();
         if($user){
             if(Hash::check($request->password, $user->password)){
                 $request->session()->put('LoggedUser', $user->id );
                 return redirect('/');
             }
             else{
                 return back()->with('fail', 'Incorrect Password');
             }

         }
         else{
            return back()->with('fail','No account found for this username');
        }
    }
    function homedata(){



    }





    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
}
