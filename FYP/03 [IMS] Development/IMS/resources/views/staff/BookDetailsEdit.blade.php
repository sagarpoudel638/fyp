@extends('master')
@section('container')

<div style="display:inline;">
    <h2>Book Details</h2>

    <div style="display:flex; margin-left:30%; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); width:500px">
        <div style="display:inline">
            <h3 style="margin-left:35%">Update Book</h3>
            <form action="{{route('editActionBook')}}" method="POST">
                <input type="hidden" name="book_id" value="{{ $editbook ->id }}">
                <div style="display:flex;margin-bottom:10%">
                    <div style="display:inline; margin-bottom:25px">
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Name Of Book" name="BookName"  value="{{ $editbook ->BookName }}" />
                                    <label for="name" class="form__label">Name Of Book</label>
                                    <span>@error('name'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                <input type="text" class="form__field" placeholder="Author" name="Author"  value="{{ $editbook ->Author }}" />
                                <label for="name" class="form__label">Author</label>
                                <span>@error('author'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Publication" name="Publication"  value="{{ $editbook ->Publication }}" />
                                    <label for="name" class="form__label">Publication</label>
                                    <span>@error('publication'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Price" name="Price"  value="{{ $editbook ->Price }}" />
                                    <label for="name" class="form__label">Price</label>
                                    <span>@error('price'){{$message}} @enderror </span>
                        </div>




                    </div>
                    <div style="display:inline; margin:380px 0px 10px 30px ">
                                <div class="buttons" style="margin-top:0px; height:60px">
                                <button type="submit" class="btn effect01"><span>Update</span></button>
                                </div>
                    </div>
               </div>
            </form>
        </div>
    </div>


</div>

@endsection
