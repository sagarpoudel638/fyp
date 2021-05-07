@extends('master')
@section('container')

<div style="display:flex; height:500px;width:450px; margin-bottom:20%; margin-left:20%; margin-top:5%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5);" >
    <div style="display:inline;">
        <form action="{{route('CreateOrder')}}" method="post">
        <input type="hidden" name="customer_id" value="{{ $customer ->id }}">
        <h2 style="margin:30% 0 0 100%;">Welcome </h2>
        <h3 style="margin:10% 0 0 120%;">{{$customer->CustomerName}}</h3>

    <div class="buttons" style="height:40px; margin: 50% 0 0 100%">

        <button type="submit" class="btn effect01"><span>Make Order</span></button>

    </div>
        </form>
    </div>
</div>



@endsection
