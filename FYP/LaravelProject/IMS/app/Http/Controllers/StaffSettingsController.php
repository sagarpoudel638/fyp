<?php

namespace App\Http\Controllers;
use App\Models\Users;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class StaffSettingsController extends Controller
{
    function StaffSettingsDashboard(){
        if(Session()->has('LoggedUser')){

            $user = Users::where('id','=', session('LoggedUser'))->first();
            $userdata = [
                'LoggedUserInfo'=> $user
            ];


        }
        return view('staff.Settings',$userdata);
    }





    function UpdateStaffPassword(Request $request){

        $id = $request->user_id;

        $users = Users::where('id', '=', $request->user_id)->first();
        if($users){

            if(Hash::check($request->OldPassword, $users->password)){

                    if ($request->isMethod('get')) {
                        return redirect()->back();
                    }

                     if ($request->isMethod('post')) {
                        $this->validate($request, [
                            'NewPassword' => 'min:6|required_with:password_confirmation|same:ConfirmNewPassword',
                            'ConfirmNewPassword' => 'min:6'

                ]);
                $pwdata['password'] = Hash::make($request -> NewPassword);


                if(Users::where('id',$id)->update($pwdata)){
                    return redirect()->route('StaffSettings')->with('success', 'Password is Updated');
                }

            }
        }
        else{
            return back()->with('fail', 'Incorrect Password');
        }
    }
    return back()->with('fail', 'SOmething went wrong');
    }




}
