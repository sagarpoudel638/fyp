@extends('master')
@section('container')



    <div style="display:inline; height:100%;">
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
        <div style="display:flex;border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); margin-left:100px;height:500px; margin-top:20px; width:1150px">

            <div style="display:inline">
                <h2>Registration</h2>
                <form action="{{route('registerStudent')}}" method="post">
                <input type="hidden" name="user_id" value="{{ $LoggedUserInfo ->id }}">

                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Student Full name" name="StudentName"  />
                    <label for="name" class="form__label">Student Full Name</label>
                    <span class="text-danger" style="color: Red"> @error('StudentName')* {{ $message}} @enderror </span>
                </div>

                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Address" name="Address"  />
                    <label for="name" class="form__label">Address</label>
                    <span class="text-danger" style="color: Red"> @error('Address')* {{ $message}} @enderror </span>
                </div>

                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Primary Number" name="PrimaryNumber"  />
                    <label for="name" class="form__label">Primary Number</label>
                    <span class="text-danger" style="color: Red"> @error('PrimaryNumber')* {{ $message}} @enderror </span>
                </div>

                <div class="form__group field" style="margin-bottom:20%">
                    <input type="input" class="form__field" placeholder="Email " name="Email"  />
                    <label for="name" class="form__label">Email</label>
                    <span class="text-danger" style="color: Red;"> @error('Email')* {{ $message}} @enderror </span>
                </div>
            </div>
            <div style="display:inline; margin-left:200px; margin-top:50px;">
                <div class="selectdiv">
                    <label>
                        <select name="gender" required>
                            <option value="" hidden> Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </label>
                </div>
                <div class="selectdiv" style="margin-top:90px">
                    <label>
                        <select id="courselist"  name="course" required>
                            <option value="" hidden> Course</option>
                            @foreach($course as $courses)
  		                        <option value="{{$courses->id}}" name="selectedcourse"> {{$courses->Course}}</option>
                        	@endforeach


                        </select>
                    </label>
                </div>
            </div>
        </div>


        <div class="buttons" style="margin:50px 0px 100px 465px;">

            <button type="submit" class="btn effect01"><span>Register</span></button>

        </div>


    </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){


            $(document).on('change','#courselist',function () {
                var course_id=$(this).val();
                console.log(course_id);
                var a=$(this).parent().parent().parent().parent().parent();


                var op="";
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findfee')!!}',
                    data:{'id': course_id},
                    dataType:'json',//return data will be json
                    success:function(data){




                        // here price is coloumn name in products table data.coln name

                        a.find('#TotalFee').val(data.Fee);




                    },
                    error:function(){

                    }
                });


            });





        });
    </script>

   <!-- -->

@endsection
