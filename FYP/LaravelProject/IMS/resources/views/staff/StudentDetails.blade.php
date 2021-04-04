@extends('master')
@section('container')

<div class="tablecontainer" style="margin-top: 10%; margin-left: 10%;margin-bottom: 10%;">
    @if (session('success'))

    <a href="" style="color: rgb(66, 197, 136);"> {{session('success')}}</a>

     @endif
   <!-- <div class="search">
        <div>
          <input type="text" placeholder="Search . . ." required>
        </div>
      </div>-->
    <table >
        <thead>
        <tr>
            <th>S.No</th>
            <th>Student Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Primary Number</th>
            <th>Secondary Number</th>
            <th>Course Enrolled</th>
            <th>TotalFee</th>
            <th>Fee Paid</th>


        </tr>
        </thead>
        <tbody>
            @foreach($studentdata as $key=>$studentdatum)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$studentdatum->StudentName}}</td>
                <td>{{$studentdatum->Gender}}</td>
                <td>{{$studentdatum->Address}}</td>
                <td>{{$studentdatum->PrimaryNumber}}</td>
                <td>{{$studentdatum->SecondaryNumber}}</td>
                <td>{{$studentdatum->Course}}</td>
                <td>{{$studentdatum->Fee}}</td>
                <td>{{$studentdatum->Payment}}</td>




            </tr>

            @endforeach
        </tbody>
    </table>




</div>

@endsection
