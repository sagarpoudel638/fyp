@extends('MasterAdmin')
@section('container')
<div style="display:inline;margin-left:200px">
    <h2>Settings</h2>
    <div style="display:flex; margin-bottom:20px;margin-left:100px;border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); width:fit-content">
        <div style="display:inline;">
            <h3>Fee Determinaton</h3>
            <div style="display:flex; ">
                <div class="form__group field">
                            <input type="input" class="form__field" placeholder="Course Name" name="CourseName"  required />
                            <label for="name" class="form__label">Course Name</label>
                </div>
                <div class="form__group field">
                            <input type="input" class="form__field" placeholder="Set Fee" name="SetFee"  required />
                            <label for="name" class="form__label">Set Fee</label>
                </div>
                <div class="buttons" style="margin: 25px 30px 0px 30px">
                            <a href="#" class="btn effect01" target="_blank"><span>Set Fee</span></a>
                </div>
            </div>
        </div>
    </div>
    <div style="display:flex; margin-left:100px; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); ">
        <div style="display:inline">
            <h3>Staff</h3>
                <div style="display:flex;">
                    <div style="display:inline">
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Name Of User" name="NameofUser"  required />
                                    <label for="name" class="form__label">Name Of User</label>
                        </div>
                        <div class="form__group field">
                                <input type="text" class="form__field" placeholder="Email" name="Email"  required />
                                <label for="name" class="form__label">Email</label>
                        </div>
                        <div class="form__group field">
                                    <input type="password" class="form__field" placeholder="Create Password" name="CreatePassword"  required />
                                    <label for="name" class="form__label">Create Password</label>
                        </div>
                        <div class="form__group field">
                                    <input type="password" class="form__field" placeholder="Confirm Password" name="ConfirmPassword"  required />
                                    <label for="name" class="form__label">Confirm Password</label>
                        </div>
                        
                    </div>
                    <div style="display:inline; margin:240px 0px 10px 300px ">
                                <div class="buttons" style="margin-top:0px; height:60px">
                                            <a href="#" class="btn effect01" target="_blank"><span>Add Staff</span></a>
                                </div>
                                <div class="buttons" style="margin-top:0px; height:60px ; margin-bottom:80px">
                                            <a href="#" class="btn effect01" target="_blank"><span>View Staff</span></a>
                                </div>
                                
                         </div>
                    
                    
               </div>
         </div>
    </div>
    <div style="display:flex; margin-left:100px; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); ">
        <div style="display:inline">
            <h3>Update Admin Password</h3>
                <div style="display:flex;">
                    <div style="display:inline">
                        <div class="form__group field">
                                <input type="password" class="form__field" placeholder="Old Password" name="OldPassword"  required />
                                <label for="name" class="form__label">Old Password</label>
                        </div>
                        <div class="form__group field">
                                    <input type="password" class="form__field" placeholder="New Password" name="NewPassword"  required />
                                    <label for="name" class="form__label">New Password</label>
                        </div>
                        <div class="form__group field">
                                    <input type="password" class="form__field" placeholder="Confirm New Password" name="ConfirmNewPassword"  required />
                                    <label for="name" class="form__label">Confirm New Password</label>
                        </div>
                        
                    </div>
                    <div style="display:inline; margin:200px 0px 10px 250px ">
                                <div class="buttons" style="margin-top:0px; height:60px ; margin-bottom:80px">
                                            <a href="#" class="btn effect01" target="_blank"><span>Update Password</span></a>
                                </div>
                                
                                
                         </div>
                    
                    
               </div>
         </div>
    </div>
</div>
@endsection
