@extends('layouts.form')

@section('content')
    <h3>Woops, you entered a wrong password.</h3>
    <a href="{{ url()->previous() }}" id="back"> &lt; Back </a>
@endsection
