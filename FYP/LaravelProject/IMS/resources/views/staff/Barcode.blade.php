
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


@endsection
