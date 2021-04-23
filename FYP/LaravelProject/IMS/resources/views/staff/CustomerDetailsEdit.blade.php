
@extends('master')
@section('container')
<div style="display:flex;border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); margin-left:100px;height:max; margin-top:20px; width:500px">


    <form action="{{route('editActionCustomer')}}" method="post">

        <input type="hidden" name="customer_id" value="{{ $editcustomer ->id }}">
        <div class="form__group field" style="width:50%">
            <input type="input" class="form__field" placeholder="CustomerName" name="CustomerName"  value="{{$editcustomer->CustomerName}}" />
            <label for="name" class="form__label">Customer Name</label>
            <span class="text-danger" style="color: Red"> @error('CustomerName')* {{ $message}} @enderror </span>
        </div>

        <div class="form__group field" style="width:50%">
            <input type="input" class="form__field" placeholder="Address" name="ContactNumber" value="{{$editcustomer->ContactNumber}}" />
            <label for="name" class="form__label">ContactNumber</label>
            <span class="text-danger" style="color: Red"> @error('ContactNumber')* {{ $message}} @enderror </span>
        </div>

        <div class="buttons" style="margin:100px 0px 100px 100px; height:60px">

            <button type="submit" class="btn effect01"><span>Update</span></button>

        </div>

    </form>
</div>
@endsection
