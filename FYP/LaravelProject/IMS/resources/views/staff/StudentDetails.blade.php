@extends('master')
@section('container')

<div class="tablecontainer" style="margin:0px;">
    @if (session('success'))

    <a href="" style="color: rgb(66, 197, 136);"> {{session('success')}}</a>

     @endif
     <form action="{{ route('search') }}" method="GET">
        <div class="search">
            <div>
              <input type="text" placeholder="Search . . ."  name="search" id="search" required>
            </div>
          </div>

          <div class="buttons" style="">

            <button type="submit" class="btn effect01"><span>Search</span></button>

        </div>

    </form>
    <table  style="width:100%">
        <thead>
        <tr>
            <th>S.N </th>
            <th>Student Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Primary Number</th>
            <th>Email</th>
            <th>Course Enrolled</th>
            <th>TotalFee</th>
            <th>Fee Paid</th>
            <th>Registered By </th>
            <th colspan="3">Action</th>



        </tr>
        </thead>
        <tbody style="width:100%">
            @foreach($studentdata as $key=>$studentdatum)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$studentdatum->StudentName}}</td>
                <td>{{$studentdatum->Gender}}</td>
                <td>{{$studentdatum->Address}}</td>
                <td>{{$studentdatum->PrimaryNumber}}</td>
                <td>{{$studentdatum->Email}}</td>
                <td>{{$studentdatum->Course}}</td>
                <td>{{$studentdatum->Fee}}</td>
                <td>{{$studentdatum->Payment}}</td>
                <td>{{$studentdatum->name}}</td>



                <td style="width:100%;">

                    <a href="{{route('editStudent').'/'.$studentdatum->id}}" class="edit">Edit</a>
                    <a href="{{route('deleteStudent').'/'.$studentdatum->id}}"  class="delete">Delete</a>
                    <a  href="{{route('payStudent').'/'.$studentdatum->id}}" class="edit">Pay</a>

                </td>


            </tr>

        @endforeach
        </tbody>
    </table>




</div>




@endsection
