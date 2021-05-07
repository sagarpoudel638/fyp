@extends('master')
@section('container')

<div style="display:inline;">
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
    <h2>Book Details</h2>

    <div style="display:flex; margin-left:30%; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); width:500px">
        <div style="display:inline">
            <h3 style="margin-left:35%">Register Book</h3>
            <form action="{{route('registerBook')}}" method="POST">
                <div style="display:flex;margin-bottom:10%">
                    <div style="display:inline; margin-bottom:25px">
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Name Of Book" name="BookName"   />
                                    <label for="name" class="form__label">Name Of Book</label>
                                    <span>@error('name'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                <input type="text" class="form__field" placeholder="Author" name="Author"   />
                                <label for="name" class="form__label">Author</label>
                                <span>@error('author'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Publication" name="Publication"   />
                                    <label for="name" class="form__label">Publication</label>
                                    <span>@error('publication'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Price" name="Price"   />
                                    <label for="name" class="form__label">Price</label>
                                    <span>@error('price'){{$message}} @enderror </span>
                        </div>




                    </div>
                    <div style="display:inline; margin:380px 0px 10px 30px ">
                                <div class="buttons" style="margin-top:0px; height:60px">
                                <button type="submit" class="btn effect01"><span>Register</span></button>
                                </div>
                    </div>
               </div>
            </form>
        </div>
    </div>
            <table  style="width:100%; margin-left:10%">
                <thead>
                <tr>
                    <th>S.N </th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Publication</th>

                    <th>Price</th>

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

                        <td>{{$bookdatum->Price}}</td>




                        <td style="width:100%;">

                            <a href="{{route('editBook').'/'.$bookdatum->id}}" class="edit">Edit</a>
                            <a href="{{route('deleteBook').'/'.$bookdatum->id}}"  class="delete">Delete</a>
                            <a  href="{{route('generatebarcode').'/'.$bookdatum->id}}" class="edit">Generate BarCode</a>

                        </td>


                    </tr>

                @endforeach
                </tbody>
            </table>
            {{$bookdata->links()}}








</div>

@endsection
