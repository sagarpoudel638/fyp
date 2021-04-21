@extends('master')
@section('container')



<form action="{{ route('searchBooks') }}" method="GET">
    <div class="search">
        <div>
          <input type="text" placeholder="Search . . ."  name="search" id="search" required>
        </div>
      </div>

      <div class="buttons" style="">

        <button  hidden type="submit" class="btn effect01"><span>Search</span></button>

    </div>

</form>
<form id ="AddOrder" action="{{ route('AddOrder') }}" method="POST">
<table  style="width:100%">
    <thead>
    <tr>
        <th>S.N </th>
        <th>Book Name</th>
        <th>Author</th>
        <th>Publication</th>

        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th colspan="3">Action</th>



    </tr>
    </thead>
    <tbody style="width:100%">
        @foreach($bookdata as $key=>$bookdatum)
        <tr>
            <td><input hidden name="Book_id" value="{{$bookdatum->id}}"></td>
            <td >{{++$key}}</td>
            <td>{{$bookdatum->BookName}}</td>
            <td>{{$bookdatum->Author}}</td>
            <td>{{$bookdatum->Publication}}</td>
            <td><input type="quantity" id="Price" name="quantity" placeholder="{{$bookdatum->Price}}" value="{{$bookdatum->Price}}" disabled></td>
            <td><input type="quantity" id="quantity" name="quantity"></td>
            <td><input type="quantity" id="total" name ="total" value="" readonly="true" ></td>




            <td style="width:100%;">


                <button  type="submit" class="edit">Add</a>

            </td>


        </tr>

    @endforeach
    </tbody>
</table>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">

$(document).on('change','#quantity',function () {
    var Qty=$(this).val();
    console.log(Qty);
    var a=$(this).parent().parent().parent().parent().parent();
    var Price = a.find('#Price').val();
    console.log(Price);



    $.ajax({

        success:function(){

            var Total = Price * Qty;
            console.log(Total);
            a.find('#total').val(Total);




        },
        error:function(){

        }
    });


});
</script>



@endsection
