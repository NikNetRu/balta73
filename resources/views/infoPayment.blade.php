@extends('template')

@section('content')
@php

dd(Session::get('cart'));
echo('testing');
@endphp

@endsection