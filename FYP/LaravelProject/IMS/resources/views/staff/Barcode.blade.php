
@extends('master')
@section('container')
<?php header('Access-Control-Allow-Origin: *'); ?>
    <h2> Barcode </h2>
    <form action="{{route('generatebarcodeAction')}}" method="post">
        <input type="hidden" name="book_id" value="{{ $book ->id }}">
        <div class="buttons" style="height:100px; margin-top:0px; margin-left:43%">
            <button type="submit" class="btn effect01"style="height:60px; margin-top:0px"><span>Print Report</span></button>
        </div>

    </form>
<!--
    <script type="text/javascript"
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <script  src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>


  <script type="text/javascript">

  $(document).ready(function(){
  $('button.btn').printPage();
  });
  </script>
-->

@endsection
