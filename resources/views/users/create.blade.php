@extends('form')

@section('content')
    <h1>Create account</h1>

    <form method="post" action="/users">
        @csrf

        <div class="field">
            <label for="title">Username</label>

            <input type="text" name="username" placeholder="Username here..">
        </div>

        <div class="field">
            <label for="user_id">Password</label>

            <input type="password" name="password" placeholder="Password here..">
        </div>

        <div class="field">
            <label for="user_id">Confirm password</label>

            <input type="password" name="repeatPassword" placeholder="Repeat password here..">
        </div>

        <button type="submit">Submit!</button>
    </form>
    <a href="{{ route('users.login') }}">Already got an account?</a>
@endsection
