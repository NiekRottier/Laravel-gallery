@extends('layout')

@section('content')
    <h1>{{ $user->username }}</h1>

    <a href="/users/{{ $user->id }}/edit">Edit username and/or password</a>
@endsection
