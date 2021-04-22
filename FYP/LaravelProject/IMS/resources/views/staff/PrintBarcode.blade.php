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
        {!! DNS1D::getBarcodeSVG($book->id, 'C39',3,33); !!}

    </div>

    <div style="display:flex">
        <a style="margin-left:60%" class="btn btn-success" href="{{route('RegisterStudentDashboard')}}" role="button">Back</a>
    <a style="margin-left:2%" class="btn btn-primary" href="#" role="button">Print</a>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>


<script type="text/javascript">
$("a.btn").on('click',function () {
    $("#barcode").print();
});
</script>
</body>
</html>

