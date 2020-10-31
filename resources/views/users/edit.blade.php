@extends('layouts.main')

@section('content')
    <h1>Edit "{{ $user->username }}"</h1>
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

        <button type="submit">Update!</button>
    </form>
@endsection
