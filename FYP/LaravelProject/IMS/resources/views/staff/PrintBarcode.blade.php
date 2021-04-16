<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IMS</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Chivo:300,700|Playfair+Display:700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<script type='text/javascript' src='/js/boootstrap.js'></script>
</head>
<body>
<center>

    <h2> Barcode </h2>
    <div class="barcode">
        <p class="name">{{$book->BookName}}</p>
        <p class="price">Author: {{$book->Author}}</p>
        <p class="price">Publication: {{$book->Publication}}</p>
        <p class="price">Price: {{$book->Price}}</p>
        {!! DNS1D::getBarcodeSVG($book->id, 'C39'); !!}

    </div>
</body>
</html>

