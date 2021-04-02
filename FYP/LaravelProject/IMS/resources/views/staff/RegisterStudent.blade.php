@extends('master')
@section('container')



    <div style="display:inline; height:100%;">
        <div style="display:flex;border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); margin-left:100px;height:500px; margin-top:20px; width:1150px">
            <div style="display:inline">
                <h2>Registration</h2>
                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Student Full name" name="StudentFullName"  required />
                    <label for="name" class="form__label">Student Full Name</label>
                </div>

                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Address" name="Address" required />
                    <label for="name" class="form__label">Address</label>
                </div>

                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Primary Number" name="PrimaryNumber" required />
                    <label for="name" class="form__label">Primary Number</label>
                </div>

                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Secondary Number" name="SecondaryNumber" required />
                    <label for="name" class="form__label">Secondary Number</label>
                </div>
            </div>
            <div style="display:inline; margin-left:200px; margin-top:50px;">
                <div class="selectdiv">
                    <label>
                        <select required>
                            <option value="" hidden> Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </label>
                </div>
                <div class="selectdiv" style="margin-top:90px">
                    <label>
                        <select id="courselist"  required>
                            <option value="" hidden> Course</option>
                            @foreach($course as $courses)
  		                        <option value="{{$courses->id}}"> {{$courses->Course}}</option>
                        	@endforeach


                        </select>
                    </label>
                </div>
            </div>
        </div>

        <div style="display:flex;border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); margin-left:100px;height:500px; margin-top:20px">
            <div style="display:inline">
                <h2>Fee Payment</h2>
                <div style="display:flex; flex-direction: row-reverse">
                    <div class="buttons" style="margin-top:300px; margin-left:700px">
                                <a href="#" class="btn effect01" style="height:60px;" target="_blank"><span>Print Receipt</span></a>
                    </div>
                  <div style="display:inline">
                        <div class="form__group field">
                            <input type="text"  class="form__field" id="TotalFee" placeholder="Total Fee" name="TotalFee"  disabled/>
                            <label for="name" class="form__label">Total Fee</label>
                        </div>
                        <div class="form__group field">
                            <input type="input" class="form__field" id ="FeePaid" placeholder="Fee Paid" name="FeePaid"  />
                            <label for="name" class="form__label">Fee Paid</label>
                        </div>
                        <div class="form__group field">
                            <input type="input" class="form__field" id ="FeeDue"placeholder="Fee Due" name="FeeDue"  disabled/>
                            <label for="name" class="form__label">Fee Due</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="buttons" style="margin:50px 0px 100px 465px;">

                    <a href="#" class="btn effect01" target="_blank"><span>Register</span></a>

        </div>



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



            $(document).on('change','#FeePaid',function () {
                var FeePaid=$(this).val();
                console.log(FeePaid);
                var a=$(this).parent().parent().parent().parent().parent();
                var TotalFee = a.find('#TotalFee').val();
                console.log(TotalFee);


                var op="";
                $.ajax({

                    success:function(){

                        var FeeDue = TotalFee - FeePaid;
                        console.log(FeeDue);



                        // here price is coloumn name in products table data.coln name

                        a.find('#FeeDue').val(FeeDue);




                    },
                    error:function(){

                    }
                });


            });

        });
    </script>

   <!-- -->

@endsection
