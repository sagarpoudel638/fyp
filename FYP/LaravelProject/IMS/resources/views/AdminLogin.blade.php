<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="/css/login.css">
    
</head>
<body>
<form action="{{route('admin.check')}}" method="post" class="login">
    @csrf
        <center><h2>Institute Management System</h2></center>
        <center><h4>Admin Panel</h4></center>
        @if (Session::get('success'))
        {{Session::get('success')}}
        @endif
        @if (Session::get('fail'))
        {{Session::get('fail')}}
        @endif

        
    <input type="text" name="email" placeholder="Email">

    
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Sign In</button>
    </form>
</body>
</html>