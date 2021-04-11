@extends('MasterAdmin')
@section('container')

<div style="display:flex; margin-left:100px; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); ">
    <div style="display:inline">
        @csrf
        @if (Session::get('success'))
    {{Session::get('success')}}
    @endif
    @if (Session::get('fail'))
    {{Session::get('fail')}}
    @endif
        <h3>Update Admin Password</h3>
        <form action="{{route('updateAdminPassword')}}" method="post">
            <div style="display:flex;">
                <div style="display:inline">
                    <input type="hidden" name="Admin_id" value="1">
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

                    <div style=" margin:10px 0px 30px 50px ">
                        <div class="buttons" style="margin-left:55%; margin-top:0px; height:60px ; margin-bottom:80px">
                                    <button type="submit" class="btn effect01"><span>Update</span></button>
                        </div>


                 </div>

                </div>



           </div>
        </form>
     </div>

     <div class="buttons" style="
margin-left:350px; ">
    <a class="btn effect01" href="logoutadmin" style="height:60px;
    color: #FFF;
border: 4px solid #c00e19;
box-shadow: 0px 0px 0px 1px #c00e19 inset;
background-color: #c00e19;
overflow: hidden;
position: relative;
transition: all 0.3s ease-in-out;
    "><span>Logout</span></a>
</div>
</div>


@endsection
