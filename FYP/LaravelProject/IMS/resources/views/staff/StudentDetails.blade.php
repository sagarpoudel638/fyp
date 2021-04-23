@extends('master')
@section('container')
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
<div class="tablecontainer" style="margin:0px;width:100%">

     <form action="{{ route('search') }}" method="GET">
        <div class="search" style="margin:5% 0 0 43%">
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

            <th colspan="2">Action</th>



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




                <td style="width:100%;" colspan="6">

                    <a style ="width:100%" href="{{route('editStudent').'/'.$studentdatum->id}}" class="edit">Edit</a>
                    <a style ="width:100%" href="{{route('deleteStudent').'/'.$studentdatum->id}}"  class="delete">Delete</a>
                    <a  style ="width:100%" href="{{route('payStudent').'/'.$studentdatum->id}}" class="edit">Pay</a>

                </td>


            </tr>

        @endforeach
        </tbody>
    </table>
    {{$studentdata->links()}}



</div>




@endsection
