@extends('form')

@section('content')
    <h1>Create account</h1>

    <form method="post" action="/users">
        @csrf

        <div class="field">
            <label for="title">Username
                <input class="@error('username') errorField @enderror" type="text" name="username" placeholder="Username here..">
            </label>

            @error('username')
                <p class="errorText">{{ $errors->first('username') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="user_id">Password
                <input class="@error('password') errorField @enderror" type="password" name="password" placeholder="Password here..">
            </label>

            @error('password')
                <p class="errorText">{{ $errors->first('password') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="user_id">Confirm password
                <input class="@error('repeatPassword') errorField @enderror" type="password" name="repeatPassword" placeholder="Repeat password here..">
            </label>

            @error('repeatPassword')
                <p class="errorText">{{ $errors->first('repeatPassword') }}</p>
            @enderror
        </div>

        <button type="submit">Register!</button>
    </form>
    <a href="{{ route('users.login') }}">Already got an account?</a>
@endsection
