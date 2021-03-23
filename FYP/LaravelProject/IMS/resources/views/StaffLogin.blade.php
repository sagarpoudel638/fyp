<!DOCTYPE html>
<html>
<head>
    <title>Staff Login</title>
    <link rel="stylesheet" href="/css/login.css">

</head>
<body>
    <form action="{{route('auth.check')}}" method="post" class="login">
    @csrf
        <center><h2>Institute Management System</h2></center>
        @if (Session::get('success'))
        {{Session::get('success')}}
        @endif
        @if (Session::get('fail'))
        {{Session::get('fail')}}
        @endif



        <input type="text" name="email" placeholder="Email">
        <span class="text-danger">@error('email'){{$message}}@enderror</span>

        <input type="password" name="password" placeholder="Password">
        <span class="text-danger">@error('password'){{$message}}@enderror</span>
        <button type="submit">Sign In</button>
    </form>
</body>
</html>
