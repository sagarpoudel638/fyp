@extends('master')
@section('container')

<div style="display:inline">
<div>
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
            <input hidden name="Book_id" value="{{$bookdatum->id}}">
            <td >{{++$key}}</td>
            <td>{{$bookdatum->BookName}}</td>
            <td>{{$bookdatum->Author}}</td>
            <td>{{$bookdatum->Publication}}</td>
            <td><input type="quantity" id="Price" name="quantity" placeholder="{{$bookdatum->Price}}" value="{{$bookdatum->Price}}" disabled></td>
            <td><input type="quantity" id="quantity" name="quantity"></td>
            <td><input type="quantity" id="total" name ="total" value="" readonly="true" ></td>




            <td style="width:100%;">


             <button  type="submit" class="btn effect01"><span>Add</span></button>

            </td>


        </tr>

    @endforeach
    </tbody>
</table>
</form>
</div>



<div>
<table  style="width:100%">
    <thead>
    <tr>
        <th>S.N </th>
        <th>Book Name</th>
        <th>Author</th>
        <th>Publication</th>
        <th>Price</th>
        <th>Quantity</th>
        <th colspan="3">Total</th>




    </tr>
    </thead>
    <tbody style="width:100%">
        @foreach($OrderDetails as $key=>$OrderDetail)
        <tr>

            <td >{{++$key}}</td>
            <td>{{$OrderDetail->BookName}}</td>
            <td>{{$OrderDetail->Author}}</td>
            <td>{{$OrderDetail->Publication}}</td>
            <td>{{$OrderDetail->Price}}</td>
            <td>{{$OrderDetail->Quantity}}</td>
            <td>{{$OrderDetail->Total}}</td>






            <td style="width:100%;">




            </td>


        </tr>

    @endforeach



    </tbody>


</table>
<div style="margin-top:3%; margin-left:0%;">
    <a href="{{route('DeleteOrder')}}" class="delete" style="height:max;"><span>Reset</span></a>
</div>
</div>



<div style="display:flex; height:350px;  width:450px; margin-bottom:20%;margin-left:30%; margin-top:5%; border-radius: 2%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5);" >



<div style="display:inline">
    <form id ="AddTotal" action="{{ route('AddTotal') }}" method="POST">
        <h3 style="margin:15% 0 0 35%" >Your Total: Rs. {{ $OrderTotal[0]-> GrandTotal }}</h3>
        <div class="form__group field" style="width:50%">
            <input type="input" class="form__field" id ="Discount" placeholder="Discount" name="Discount"  />
            <label for="name" class="form__label">Discount</label>
        </div>
        <div class="form__group field" style="width:50%">
            <input type="input" class="form__field" id ="NetTotal"placeholder="AmountPaid" name="AmountPaid"  readonly="true"/>
            <label for="name" class="form__label">Net Total</label>
        </div>

        <div class="buttons" style="height:60px; margin:0 0 0 23%">

            <button type="submit" class="btn effect01"><span>Pay</span></button>

        </div>
    </form>
</div>

</div>
</div>
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




$(document).on('change','#Discount',function () {
    var discount=$(this).val();
    console.log(discount);
    var a=$(this).parent().parent().parent().parent().parent();
    var Total = "{{ $OrderTotal[0]-> GrandTotal }}";
    console.log(Total);



    $.ajax({

        success:function(){

            var NetTotal = Total - discount;
            console.log(NetTotal);
            a.find('#NetTotal').val(NetTotal);




        },
        error:function(){

        }
    });


});
</script>








@endsection
