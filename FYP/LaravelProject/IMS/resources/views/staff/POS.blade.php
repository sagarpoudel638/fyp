@extends('master')
@section('container')

<form action="{{ route('simple_search') }}" method="GET">
    <div class="search">
        <div>
          <input type="text" placeholder="Search . . ."  name="search" id="search" required>
        </div>
      </div>

      <div class="buttons" style="">

        <button type="submit" class="btn effect01"><span>Search</span></button>

    </div>

</form>



<div class="tablecontainer">
    @if (session('success'))

    <a href="" style="color: rgb(66, 197, 136);"> {{session('success')}}</a>

     @endif

    <table>
        <thead>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Action</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($studentdata as $key=>$studentdatum)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$studentdatum->StudentName}}</td>
                <td>{{$studentdatum->Gender}}</td>


                <td>

                    <a href="" class="edit">Edit</a>


                    <a href="" class="delete">Delete</a>

                </td>


            </tr>

        @endforeach
        </tbody>
    </table>


    {{ $studentdata->appends(request()->except('page'))->links() }}

</div>






@endsection
