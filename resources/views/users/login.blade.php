@extends('layouts.main')

@section('content')
    <h1>Login</h1>

    <form method="post" action="/users/login">
        @csrf

        <div class="field">
            <label for="title">Username
            <input type="text" name="username" placeholder="Username here.."></label>

            @error('username')
            <p class="errorText">{{ $errors->first('username') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="user_id">Password
            <input type="password" name="password" placeholder="Password here.."></label>

            @error('password')
            <p class="errorText">{{ $errors->first('password') }}</p>
            @enderror
        </div>

        <button type="submit">Submit!</button>
    </form>
    <a href="{{ route('users.create') }}">Don&#39;t have an account yet?</a>
@endsection
