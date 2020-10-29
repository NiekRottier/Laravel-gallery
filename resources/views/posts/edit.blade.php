@extends('form')

@section('content')
    <h1>Welcome to the post editor!</h1>

    <h2>{{ $post->title }}</h2>
    <img src="{{ $post->img }}" alt="{{ $post->img }}" />
    <h2></h2>
    <form method="post" action="/posts/{{ $post->id }}">
        @method('PUT')
        @csrf

        <div class="field">
            <label for="title">Title
                <input class="@error('title') errorField @enderror" type="text" name="title" value="{{ $post->title }}">
            </label>

            @error('title')
                <p class="errorText">{{ $errors->first('title') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="descr">Description
                <input class="@error('descr') errorField @enderror" type="text" name="descr" value="{{ $post->descr }}">
            </label>

            @error('descr')
                <p class="errorText">{{ $errors->first('descr') }}</p>
            @enderror
        </div>

        {{-- NEEDS TO BE REMOVED LATER! --}}
        <div class="field">
            <label for="user_id">User ID
                <input type="text" name="user_id" value="{{ $post->user_id }}">
            </label>
        </div>

        <button type="submit">Submit!</button>
    </form>
@endsection
