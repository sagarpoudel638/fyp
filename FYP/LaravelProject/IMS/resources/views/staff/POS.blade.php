@extends('master')
@section('container')


@foreach($customer as $customerdatum)

{{$customerdatum->CustomerName}}

@endforeach





@endsection
