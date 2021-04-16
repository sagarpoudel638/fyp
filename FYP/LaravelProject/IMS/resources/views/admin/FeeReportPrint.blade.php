<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IMS Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Chivo:300,700|Playfair+Display:700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<script type='text/javascript' src='/js/boootstrap.js'></script>
</head>
<body>
<center>
    <h2> Student Report </h2>
    <table class="table table-striped">
        <thead>
        <tr><th scope="col"> Course</th><th scope="col">Fee Collected</th></tr>
        </thead>
        @foreach($fee as $fee)
        <tr>
            <td scope="row">{{ $fee->Course }}</td>
            <td scope="row">{{ $fee-> TotalFeeCollected}}</td>

        </tr>
    @endforeach
</center>
</body>
</html>

