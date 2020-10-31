@extends('layouts.main')

@section('content')
    <h1>Edit "{{ $user->username }}"</h1>
    <p>If you don't want to change a field, don't add anything</p>
    <form method="post" action="/users/{{ $user->id }}">
        @method('PUT')
        @csrf

        <div class="field">
            <label for="username">Username
                <input class="@error('username') errorField @enderror" type="text" name="username" value="{{ $user->username }}"/>
            </label>

            @error('username')
            <p class="errorText">{{ $errors->first('username') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="password">Current password
                <input class="@error('password') errorField @enderror" type="password" name="password"/>
            </label>

            @error('password')
            <p class="errorText">{{ $errors->first('password') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="newPassword">New password
                <input class="@error('newPassword') errorField @enderror" type="password" name="newPassword"/>
            </label>

            @error('newPassword')
            <p class="errorText">{{ $errors->first('newPassword') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="repeatNewPassword">Repeat new password
                <input class="@error('repeatNewPassword') errorField @enderror" type="password" name="repeatNewPassword"/>
            </label>

            @error('repeatNewPassword')
            <p class="errorText">{{ $errors->first('repeatNewPassword') }}</p>
            @enderror
        </div>

        <button type="submit">Update!</button>
    </form>
@endsection
