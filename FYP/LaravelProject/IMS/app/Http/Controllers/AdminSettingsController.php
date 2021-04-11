<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Hash;
class AdminSettingsController extends Controller
{
    function AdminSettingsDashboard(){
        return view('admin.Settings');
    }

    function UpdateAdminPassword(Request $request){

        $id = $request->Admin_id;

        $admin = Admin::where('id', '=', $request->Admin_id)->first();
        if($admin){

        if($request->OldPassword == $admin->password){

            if ($request->isMethod('get')) {
                return redirect()->back();
            }

            if ($request->isMethod('post')) {
                $this->validate($request, [
                    'NewPassword' => 'min:6|required_with:password_confirmation|same:ConfirmNewPassword',
                    'ConfirmNewPassword' => 'min:6'

                ]);
                $pwdata['password'] = $request -> NewPassword;


                if(Admin::where('id',$id)->update($pwdata)){
                    return redirect()->route('SettingsAdmin')->with('success', 'Password is Updated');
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
