
@extends('master')
@section('container')
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
@endsection
