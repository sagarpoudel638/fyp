@extends('master')
@section('container')

<div class="tablecontainer" style="margin:0px;">
    @if (session('success'))

    <a href="" style="color: rgb(66, 197, 136);"> {{session('success')}}</a>

     @endif
   <div class="search">
        <div>
          <input type="text" placeholder="Search . . ."  name="searchstudent" id="searchstudent" required>
        </div>
      </div>
    <table  >
        <thead>
        <tr>

            <th>Student Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Primary Number</th>
            <th>Secondary Number</th>
            <th>Course Enrolled</th>
            <th>TotalFee</th>
            <th>Fee Paid</th>
            <th>Registered By </th>
            <th colspan="3">Action</th>



        </tr>
        </thead>
        <tbody  id="livesearch">

        </tbody>
    </table>




</div>


<script>
    $(document).ready(function(){
     fetch_item_data();
     function fetch_item_data(query = '')
     {
      $.ajax({
       url:"{{ route('live_search_student.searchAction') }}",
       method:'GET',
       data:{query:query},
       dataType:'json',
       success:function(studentdata)
       {
        $('#livesearch').html(studentdata.table_data_student);

       }
      })
     }
     $(document).on('keyup', '#searchstudent', function(){
      var query = $(this).val();
      fetch_item_data(query);
     });
    });


    </script>

@endsection
