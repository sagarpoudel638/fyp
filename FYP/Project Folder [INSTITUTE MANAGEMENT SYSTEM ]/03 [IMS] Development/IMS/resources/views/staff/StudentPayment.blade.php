@extends('master')
@section('container')
<div style="display:inline;border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); margin-left:300px; height:100%; margin-top:20px; width:700px">

        <h2 style="margin-left: 37%">Fee Payment</h2>
        <form action="{{route('payStudentAction')}}" method="post">
        <input type="hidden" name="student_id" value="{{ $paystudent ->id }}">
        <div class="selectdiv" style="margin-left:35%">
            <label>
                <select id="courselist"  name="course" required>
                    <option value="" hidden> Course Enrolled</option>
                    @foreach($course as $courses)
                          <option value="{{$courses->id}}" name="selectedcourse"> {{$courses->Course}}</option>
                    @endforeach
                </select>
            </label>
        </div>
<br>

<br>
<br>
<br>

                <div class="form__group field" style="width:50%">
                    <input type="text"  class="form__field" id="TotalFee" placeholder="Total Fee" name="TotalFee"  disabled/>
                    <label for="name" class="form__label">Total Fee</label>
                </div>
                <div class="form__group field" style="width:50%">
                    <input type="input" class="form__field" id ="FeePaid" placeholder="Fee Paid" name="Payment"  />
                    <label for="name" class="form__label">Fee Paid</label>
                </div>
                <div class="form__group field" style="width:50%">
                    <input type="input" class="form__field" id ="FeeDue"placeholder="Fee Due" name="FeeDue"  disabled/>
                    <label for="name" class="form__label">Fee Due</label>
                </div>


                 <div class="buttons" style="">

                    <button type="submit" class="btn effect01"><span>Pay</span></button>

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
</script>


@endsection
