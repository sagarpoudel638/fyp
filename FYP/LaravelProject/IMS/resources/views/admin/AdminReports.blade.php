@extends('MasterAdmin')
@section('container')

<div style="display:inline; width:max">
    <h2>Reports</h2>
    <div style="display:flex; width:max">
        <a style="text-decoration:none; color: rgb(71, 226, 92); margin-right:150px; margin-left:50px;" href="{{route('StudentReport')}}">
            <div style="display:flex; align-items:center; height:250px;  width:350px; margin-bottom:20%;margin-left:20%; margin-top:5%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5);" >
                <div style="display:inline; margin-left:80px">
                <h2 style="color:rgb(19, 16, 16); margin-left:20px; margin-right:0px">Total Students</h2>
                <h3 style=" font-size:80px; margin-left:50px; margin-bottom:10px">
                    @foreach($studentdata as $studentdatum)
                    {{ $studentdatum-> TotalStudent}}
                    @endforeach
                </h3>
                </div>



            </div>
        </a>

        <a style="text-decoration:none; color: rgb(71, 226, 92); margin-right:150px; margin-left:50px;" href="{{route('FeeReport')}}">
            <div style="display:flex; align-items:center; height:250px;  width:350px; margin-bottom:20%;margin-left:20%; margin-top:5%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5);" >
                <div style="display:inline; margin-left:80px">
                <h2 style="color:rgb(19, 16, 16); margin-left:20px; margin-right:0px">Total Fee Collected</h2>
                <h3 style=" font-size:80px; margin-left:0px; margin-bottom:10px">
                    @foreach($paymentdata as $paymentdatum)
                    {{ $paymentdatum-> TotalPayment}}
                    @endforeach
                </h3>
                </div>



            </div>
        </a>
    </div>

    <div style="display:flex; width:max">
        <a style="text-decoration:none; color: rgb(71, 226, 92); margin-right:150px; margin-left:50px;" href="{{route('StudentReport')}}">
            <div style="display:flex; align-items:center; height:250px;  width:350px; margin-bottom:20%;margin-left:20%; margin-top:5%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5);" >
                <div style="display:inline; margin-left:80px">
                <h2 style="color:rgb(19, 16, 16); margin-left:20px; margin-right:0px">Total Students</h2>
                <h3 style=" font-size:80px; margin-left:50px; margin-bottom:10px">
                    @foreach($studentdata as $studentdatum)
                    {{ $studentdatum-> TotalStudent}}
                    @endforeach
                </h3>
                </div>



            </div>
        </a>

        <a style="text-decoration:none; color: rgb(71, 226, 92); margin-right:150px; margin-left:50px;" href="{{route('StudentReport')}}">
            <div style="display:flex; align-items:center; height:250px;  width:350px; margin-bottom:20%;margin-left:20%; margin-top:5%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5);" >
                <div style="display:inline; margin-left:80px">
                <h2 style="color:rgb(19, 16, 16); margin-left:20px; margin-right:0px">Total Students</h2>
                <h3 style=" font-size:80px; margin-left:0px; margin-bottom:10px">
                    @foreach($paymentdata as $paymentdatum)
                    {{ $paymentdatum-> TotalPayment}}
                    @endforeach
                </h3>
                </div>



            </div>
        </a>
    </div>



</div>


@endsection
