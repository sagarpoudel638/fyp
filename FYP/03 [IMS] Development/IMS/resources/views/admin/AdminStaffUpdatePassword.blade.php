@extends('MasterAdmin')
@section('container')
<form action="{{route('updatePasswordAction')}}" method="post">
    <div style="display:flex; margin-left:50px; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); ">
        <div style="display:inline">
            <h3>Update  Password</h3>
            @csrf
            @if (Session::get('success'))
        {{Session::get('success')}}
        @endif
        @if (Session::get('fail'))
        {{Session::get('fail')}}
        @endif
                    <input type="hidden" name="user_id" value="{{$updatePassword->id}}">
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
                                        <button type="submit" class="btn effect01"><span>Change</span></button>
                            </div>


                     </div>


           </div>
     </div>
@endsection
