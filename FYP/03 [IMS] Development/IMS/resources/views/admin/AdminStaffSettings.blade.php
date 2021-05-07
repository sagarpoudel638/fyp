@extends('MasterAdmin')
@section('container')

<div style="display:inline;margin-left:200px">
    <div style="display:flex;">
    <h2 style="margin-left:45%">Settings</h2>


    </div>
    @if (Session::get('success'))
    <div id="successtoast">
        {{Session::get('success')}}
     </div>
    @endif
    @if (Session::get('fail'))
    <div id="failtoast">
        {{Session::get('fail')}}
     </div>
    @endif

    <form action="{{route('auth.create')}}" method="post">
    <div style="display:flex; margin-left:100px; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); ">
        <div style="display:inline">
            <h3 style="margin-left:40%">Add Staff</h3>
            @csrf

                <div style="display:flex;">
                    <div style="display:inline">
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Name Of User" name="name"   />
                                    <label for="name" class="form__label">Name Of User</label>
                                    <span class="text-danger" style="color: Red"> @error('name')* {{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                <input type="text" class="form__field" placeholder="Email" name="email"   />
                                <label for="name" class="form__label">Email</label>
                                <span class="text-danger" style="color: Red">  @error('email')* {{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="password" class="form__field" placeholder="Create Password" name="password"   />
                                    <label for="name" class="form__label">Create Password</label>
                                    <span class="text-danger" style="color: Red"> @error('password')* {{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field" style="margin-bottom:5%">
                                    <input type="password" class="form__field" placeholder="Confirm Password" name="password_confirmation"   />
                                    <label for="name" class="form__label">Confirm Password</label>
                                    <span class="text-danger" style="color: Red"> @error('password_confirmation') * {{ $message}} @enderror </span>
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


    <div class="tablecontainer" style="	margin-top: 20%;
    margin-left: 0%;
    margin-bottom: 10%;">

       <!-- <div class="search">
            <div>
              <input type="text" placeholder="Search . . ." required>
            </div>
          </div>-->
        <table style="width:100%">
            <thead>
            <tr>
                <th>S.No</th>
                <th>Staff Name</th>
                <th>Email</th>
                <th>Action</th>
                <th>Create At</th>

            </tr>
            </thead>
            <tbody>
            @foreach($staffData as $key=>$staffDatum)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$staffDatum->name}}</td>
                    <td>{{$staffDatum->email}}</td>




                    <td>
                        <a href="{{route('editUser').'/'.$staffDatum->id}}" class="edit">Edit</a>

                        <a href="{{route('deleteUser').'/'.$staffDatum->id}}" class="delete">Delete</a>

                        <a href="{{route('updatePassword').'/'.$staffDatum->id}}" class="edit">Update </a>

                    </td>
                    <td>{{$staffDatum->created_at->DiffForHumans()}} </td>

                </tr>

            @endforeach
            </tbody>
        </table>


        {{$staffData->links()}}

    </div>


</div>
@endsection
