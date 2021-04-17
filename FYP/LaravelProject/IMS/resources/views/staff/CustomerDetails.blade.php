@extends('master')
@section('container')
<div style="height: max; width:max; display:flex">
<div style="display:flex;border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); margin-left:100px;height:max; margin-top:20px; width:500px">


    <form action="{{route('registerCustomer')}}" method="post">


        <div class="form__group field" style="width:50%">
            <input type="input" class="form__field" placeholder="CustomerName" name="CustomerName"  required />
            <label for="name" class="form__label">Customer Name</label>
        </div>

        <div class="form__group field" style="width:50%">
            <input type="input" class="form__field" placeholder="Address" name="ContactNumber" required />
            <label for="name" class="form__label">ContactNumber</label>
        </div>

        <div class="buttons" style="margin:100px 0px 100px 100px; height:60px">

            <button type="submit" class="btn effect01"><span>Register</span></button>

        </div>

    </form>
</div>

<div style="display:inline; margin-left:100px">
    <div class="tablecontainer" style="margin:0px;">
        @if (session('success'))

        <a href="" style="color: rgb(66, 197, 136);"> {{session('success')}}</a>

         @endif
         <form action="{{ route('searchcustomer') }}" method="GET">
            <div class="search" style="margin-top:50px">
                <div>
                  <input type="text" placeholder="Search . . ."  name="search" id="search" required>
                </div>
              </div>

              <div class="buttons" style="margin-top:0px">

                <button type="submit" class="btn effect01"><span>Search</span></button>

            </div>

        </form>
    </div>
    <table  style="width:100%">
        <thead>
        <tr>
            <th>S.N </th>
            <th> Customer Name</th>
            <th>Contact Number</th>
            <th colspan="3">Action</th>



        </tr>
        </thead>
        <tbody style="width:100%">
            @foreach($customerData as $key=>$customerdatum)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$customerdatum->CustomerName}}</td>
                <td>{{$customerdatum->ContactNumber}}</td>


                <td style="width:100%;">

                    <a href="" class="edit">Edit</a>
                    <a href=""  class="delete">Delete</a>
                    <a href="{{route('POSCustomer').'/'.$customerdatum->id}}"  class="edit">Select</a>


                </td>



            </tr>

        @endforeach
        </tbody>
    </table>


</div>



</div>






@endsection
