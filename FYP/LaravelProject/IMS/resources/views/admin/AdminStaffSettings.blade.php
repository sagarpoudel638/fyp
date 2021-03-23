@extends('MasterAdmin')
@section('container')

<div style="display:inline;margin-left:200px">
    <div style="display:flex;">
    <h2>Settings</h2>


    </div>

    <form action="{{route('auth.create')}}" method="post">
    <div style="display:flex; margin-left:100px; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); ">
        <div style="display:inline">
            <h3>Staff</h3>
            @csrf
            @if (Session::get('success'))
        {{Session::get('success')}}
        @endif
        @if (Session::get('fail'))
        {{Session::get('fail')}}
        @endif
                <div style="display:flex;">
                    <div style="display:inline">
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Name Of User" name="name"  required />
                                    <label for="name" class="form__label">Name Of User</label>
                                    <span class="text-danger">@error('name'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                <input type="text" class="form__field" placeholder="Email" name="email"  required />
                                <label for="name" class="form__label">Email</label>
                                <span class="text-danger">@error('email'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="password" class="form__field" placeholder="Create Password" name="password"  required />
                                    <label for="name" class="form__label">Create Password</label>
                                    <span class="text-danger">@error('password'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="password" class="form__field" placeholder="Confirm Password" name="password_confirmation"  required />
                                    <label for="name" class="form__label">Confirm Password</label>
                                    <span class="text-danger">@error('password_confirmation'){{ $message}} @enderror </span>
                        </div>

                    </div>
                    <div style="display:inline; margin:200px 0px 10px 300px ">
                                <div class="buttons" style="margin-top:0px; height:60px">
                                <button type="submit" class="btn effect01"><span>Add Staff</span></button>
                                </div>


                    </div>


               </div>
         </div>
    </div>
    </form>


</div>
@endsection
