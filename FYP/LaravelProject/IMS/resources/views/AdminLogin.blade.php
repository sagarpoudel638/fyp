<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="/css/login.css">

</head>
<body>
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
<form action="{{route('admin.check')}}" method="post" class="login">
    @csrf
        <center><h2>Institute Management System</h2></center>
        <center><h4>Admin Panel</h4></center>



        <input type="text" name="email" placeholder="Email">
        <span class="text-danger">@error('email')
            <div id="failtoast">
            {{$message}}
         </div>@enderror
        </span>

        <input type="password" name="password" placeholder="Password">
        <span class="text-danger">@error('password')
            <div id="failtoast">
            {{$message}}
         </div>@enderror
        </span>
        <button type="submit">Sign In</button>
    </form>
</body>
</html>
