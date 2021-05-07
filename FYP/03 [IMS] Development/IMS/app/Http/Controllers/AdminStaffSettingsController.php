<?php

namespace App\Http\Controllers;
use \Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Http\Request;
use Exception;

class AdminStaffSettingsController extends Controller
{
    function AdminStaffSettingsDashboard(){
        $this->data['title'] = 'Staff';
        $staffData = Users::orderBy('id', 'desc')->simplePaginate(10);
        return view('admin.AdminStaffSettings', compact('staffData'), $this->data);
    }

    public function deleteUser(Request $request)
    {
        try{
            $id = $request->user_id;
            if(Users::findOrFail($id)->delete()){
                return redirect()->route('adminstaff')->with('success', 'Record is Deleted');
            }
        }
        catch (Exception $e ){
            return redirect()->back()->with('fail','Unable to DELETE : User data exists on other Table');}

    }


    public function editUser(Request $request){
        $id= $request->user_id;
        $editUser = Users::findOrFail($id);
        return view('admin.AdminEditStaffSettings', compact('editUser'));

    }

    public function editActionUser(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:3',
                'email' => 'required|email',

            ]);
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $id = $request->Users_id;

            if(Users::where('id',$id)->update($data)){
                return redirect()->route('adminstaff')->with('success', 'Record is Updated');
            }
        }
    }



    public function updatePassword(Request $request){
        $id= $request->user_id;
        $updatePassword = Users::findOrFail($id);
        return view('admin.AdminStaffUpdatePassword', compact('updatePassword'));

    }

    public function updatePasswordAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'

            ]);
            $pwdata['password'] = Hash::make($request -> NewPassword);
            $id = $request->user_id;

            if(Users::where('id',$id)->update($pwdata)){
                return redirect()->route('adminstaff')->with('success', 'Record is Updated');
            }
        }
    }

}
