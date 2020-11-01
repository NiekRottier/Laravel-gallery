@extends('layouts.main')

@section('content')
    <h1>Welcome to the user index!</h1>

    <h2>Users</h2>
    <hr />
    @foreach($users as $user)
        <div>
            <h3>Username: {{ $user->username }}</h3>
            <p>ID: {{ $user->id }}</p>
            <hr />
        </div>
    @endforeach
@endsection
