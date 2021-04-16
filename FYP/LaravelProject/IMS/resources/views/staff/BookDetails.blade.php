@extends('master')
@section('container')

<div style="display:inline;margin-left:10%">

    <h2>Book Details</h2>

    <div style="display:flex; margin-left:100px; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); ">
        <div style="display:inline">
            <h3>Register Book</h3>
            <form action="{{route('registerBook')}}" method="POST">
                <input type="hidden" name="user_id" value="{{ $LoggedUserInfo ->id }}">
                <div style="display:flex;">
                    <div style="display:inline; margin-bottom:25px">
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Name Of Book" name="BookName"  required />
                                    <label for="name" class="form__label">Name Of Book</label>
                                    <span>@error('name'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                <input type="text" class="form__field" placeholder="Author" name="Author"  required />
                                <label for="name" class="form__label">Author</label>
                                <span>@error('author'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Publication" name="Publication"  required />
                                    <label for="name" class="form__label">Publication</label>
                                    <span>@error('publication'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="StocksQuantity" name="StockQuantity"  required />
                                    <label for="name" class="form__label">Stock Amount</label>
                                    <span>@error('stockquantity'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Price" name="Price"  required />
                                    <label for="name" class="form__label">Price</label>
                                    <span>@error('price'){{$message}} @enderror </span>
                        </div>




                    </div>
                    <div style="display:inline; margin:380px 25px 10px 180px ">
                                <div class="buttons" style="margin-top:0px; height:60px">
                                <button type="submit" class="btn effect01"><span>Register</span></button>
                                </div>


                    </div>


               </div>
            </form>
            <table  style="width:100%">
                <thead>
                <tr>
                    <th>S.N </th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Publication</th>
                    <th> Stock Quantity</th>
                    <th>Price</th>
                    <th>Registered By </th>
                    <th colspan="3">Action</th>



                </tr>
                </thead>
                <tbody style="width:100%">
                    @foreach($bookdata as $key=>$bookdatum)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$bookdatum->BookName}}</td>
                        <td>{{$bookdatum->Author}}</td>
                        <td>{{$bookdatum->Publication}}</td>
                        <td>{{$bookdatum->StockQuantity}}</td>
                        <td>{{$bookdatum->Price}}</td>
                        <td>{{$bookdatum->name}}</td>



                        <td style="width:100%;">

                            <a href="" class="edit">Edit</a>
                            <a href=""  class="delete">Delete</a>
                            <a  href="{{route('generatebarcode').'/'.$bookdatum->id}}" class="edit">Generate BarCode</a>

                        </td>


                    </tr>

                @endforeach
                </tbody>
            </table>


         </div>
    </div>





</div>

@endsection
