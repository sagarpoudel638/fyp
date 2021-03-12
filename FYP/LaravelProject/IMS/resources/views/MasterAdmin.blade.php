<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IMS Admin</title>
    <link rel="stylesheet" href="/css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Chivo:300,700|Playfair+Display:700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">




</head>
<body>



    
<header>
    <div class="flex-head">
	
        <!--<img src="../../images/logo.png" style=" height:100px; width:100px;" alt="logo">-->
        <div class = "title">IMS Admin Panel</div>
       <!-- <div class = "userdesc">Name of user</div>-->
    </div>
    
</header>
<script>
       var printDate = function () {
	var d = new Date();
	var year = d.getFullYear();
	var month = d.getMonth() + 1;
	var date = d.getDate();
	var hour = d.getHours();
	var minute = d.getMinutes();
	var second = d.getSeconds();
	if (month < 10) {
		month = "0" + month;
	} else {
		month = month;
	}
	if (date < 10) {
		date = "0" + date;
	} else {
		date = date;
	}
	if (hour < 10) {
		hour = "0" + hour;
	} else {
		hour = hour;
	}
	if (minute < 10) {
		minute = "0" + minute;
	} else {
		minute = minute;
	}
	if (second < 10) {
		second = "0" + second;
	} else {
		second = second;
	}
	document.getElementById("dates").innerHTML = month + "-" + date + "-" + year;
	document.getElementById("time").innerHTML = hour + ":" + minute + ":" + second;
};

setInterval(printDate, 1000);

   </script>
 

    
<div class="flex-page">
    
  <div class="side-nav">
    <ul>
	<li>
    <div class="date-border">
        <h1 id="dates"></h1>
        <h1 id="time"></h1>
    </div>
 </li>
      <li><a href="AdminReports">Reports</a></li>
      <li><a href="AdminSettings">Settings</a></li>
     
    </ul>
  </div>
  @yield('container')
</div>






</body>
</html>