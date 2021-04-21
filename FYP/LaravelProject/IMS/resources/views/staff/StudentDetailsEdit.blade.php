@extends('master')
@section('container')



    <div style="display:inline; height:100%;">
        <div style="display:flex;border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); margin-left:100px;height:500px; margin-top:20px; width:1150px">
            <div style="display:inline">
                <h2>Update Student Details</h2>
                <form action="{{route('editActionStudentDetails')}}" method="post">
                <input type="hidden" name="User_id" value="{{ $editstudent ->id }}">

                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Student Full name" name="StudentName"  value="{{$editstudent->StudentName}}" />
                    <label for="name" class="form__label">Student Full Name</label>
                </div>

                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Address" name="Address" value="{{$editstudent->Address}}" />
                    <label for="name" class="form__label">Address</label>
                </div>

                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Primary Number" name="PrimaryNumber" value="{{$editstudent->PrimaryNumber}}" />
                    <label for="name" class="form__label">Primary Number</label>
                </div>

                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Email " name="Email" value="{{$editstudent->Email}}" />
                    <label for="name" class="form__label">Email </label>
                </div>
            </div>

        </div>

        <div class="buttons" style="margin:50px 0px 100px 465px;">

            <button type="submit" class="btn effect01"><span>Update</span></button>

        </div>


    </form>
    </div>






@endsection
