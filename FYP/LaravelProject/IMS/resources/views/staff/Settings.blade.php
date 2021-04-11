@extends('master')
@section('container')

<div style="display:inline;margin-left:200px">

    <h2>Settings</h2>
    <form action="" method="">
    <div style="display:flex; margin-left:100px; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); ">
        <div style="display:inline">
            <h3>Register Book</h3>

                <div style="display:flex;">
                    <div style="display:inline; margin-bottom:25px">
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Name Of Book" name="bookname"  required />
                                    <label for="name" class="form__label">Name Of Book</label>
                                    <span>@error('name'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                <input type="text" class="form__field" placeholder="Author" name="author"  required />
                                <label for="name" class="form__label">Author</label>
                                <span>@error('author'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Publication" name="publication"  required />
                                    <label for="name" class="form__label">Publication</label>
                                    <span>@error('publication'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="StocksQuantity" name="stocksquantity"  required />
                                    <label for="name" class="form__label">Stock Amount</label>
                                    <span>@error('stockquantity'){{ $message}} @enderror </span>
                        </div>
                        <div class="form__group field">
                                    <input type="text" class="form__field" placeholder="Price" name="price"  required />
                                    <label for="name" class="form__label">Price</label>
                                    <span>@error('price'){{$message}} @enderror </span>
                        </div>

                    </div>
                    <div style="display:inline; margin:365px 25px 10px 180px ">
                                <div class="buttons" style="margin-top:0px; height:60px">
                                <button type="submit" class="btn effect01"><span>Register</span></button>
                                </div>


                    </div>


               </div>
         </div>
    </div>
    </form>
    <div style="display:flex; margin-left:100px; margin-bottom:20px; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); ">
        <div style="display:inline">
            <h3>Update Password</h3>
            <form action="{{route('updateStaffPassword')}}" method="post">
            @csrf
            @if (Session::get('success'))
        {{Session::get('success')}}
        @endif
        @if (Session::get('fail'))
        {{Session::get('fail')}}
        @endif
                <div style="display:flex;">
                    <div style="display:inline">
                        <div class="form__group field">
                                <input type="password" class="form__field" placeholder="Old Password" name="OldPassword"  required />
                                <label for="name" class="form__label">Old Password</label>
                        </div>
                        <input type="hidden" name="user_id" value="{{ $LoggedUserInfo ->id }}">
                        <div class="form__group field">
                                    <input type="password" class="form__field" placeholder="New Password" name="NewPassword"  required />
                                    <label for="name" class="form__label">New Password</label>
                        </div>
                        <div class="form__group field">
                                    <input type="password" class="form__field" placeholder="Confirm New Password" name="ConfirmNewPassword"  required />
                                    <label for="name" class="form__label">Confirm New Password</label>
                        </div>

                    </div>
                    <div style="display:inline; margin:160px 0px 30px 200px ">
                                <div class="buttons" style="margin-top:0px; height:50px ; margin-bottom:80px; margin-left:0px">
                                            <button type="submit" class="btn effect01"><span>Update </span></button>
                                </div>


                         </div>


               </div>
            </form>
         </div>
    </div>
    <div class="buttons" style="
    margin-left:350px; ">
        <a class="btn effect01" href="logout" style="height:60px;
        color: #FFF;
        border: 4px solid #c00e19;
box-shadow: 0px 0px 0px 1px #c00e19 inset;
background-color: #c00e19;
  overflow: hidden;
  position: relative;
  transition: all 0.3s ease-in-out;
        "><span>Logout</span></a>
    </div>
</div>

@endsection
