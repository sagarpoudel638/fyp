@extends('MasterAdmin')
@section('container')

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
                <div style="display:inline; margin:150px 0px 30px 250px ">
                            <div class="buttons" style="margin-top:0px; height:60px ; margin-bottom:80px">
                                        <button href="#" class="btn effect01" target="_blank"><span>Update Password</span></button>
                            </div>


                     </div>


           </div>
     </div>

     <div class="buttons" style="
margin-left:350px; ">
    <a class="btn effect01" href="logoutadmin" style="height:60px;
    color: #FFF;
border: 4px solid red;
box-shadow: 0px 0px 0px 1px red inset;
background-color: red;
overflow: hidden;
position: relative;
transition: all 0.3s ease-in-out;
    "><span>Logout</span></a>
</div>
</div>


@endsection
