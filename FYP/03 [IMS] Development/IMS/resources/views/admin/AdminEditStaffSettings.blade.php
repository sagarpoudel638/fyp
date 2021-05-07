
 @extends('MasterAdmin')
 @section('container')








    <form action="{{route('editActionUser')}}" method="post">
    <div style="display:flex; margin-left:50px; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); ">
        <div style="display:inline">
            <h3>Edit Staff</h3>
            @csrf
            @if (Session::get('success'))
        {{Session::get('success')}}
        @endif
        @if (Session::get('fail'))
        {{Session::get('fail')}}
        @endif
                <div style="display:flex;">
                    <div style="display:inline">
                        <input type="hidden" name="Users_id" value="{{$editUser->id}}">
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Name Of User" name="name" value="{{$editUser->name}}" />
                                    <label for="name" class="form__label">Name Of User</label>
                                    <span class="text-danger">@error('name'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field"  style=" margin-bottom:20px">
                                <input type="text" class="form__field" placeholder="Email" name="email"   value="{{$editUser->email}}" />
                                <label for="name" class="form__label">Email</label>
                                <span class="text-danger">@error('email'){{ $message}} @enderror </span>
                        </div>

                    </div>
                    <div style="display:inline; margin:60px 20px 10px 300px ">
                                <div class="buttons" style="margin-top:0px; height:60px">
                                <button type="submit" class="btn effect01"><span>Update</span></button>
                                </div>


                    </div>


               </div>
         </div>
    </div>
    </form>
@endsection
