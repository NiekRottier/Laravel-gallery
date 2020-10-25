@extends('form')

@section('content')
    <h1>Welcome to the post editor!</h1>

    <form method="post" action="/posts/{{ $post->id }}">
        @method('PUT')
        @csrf

        <div class="field">
            <label for="title">Title</label>

            <input type="text" name="title" value="{{ $post->title }}">
        </div>

        <div class="field">
            <label for="descr">Description</label>

            <input type="text" name="descr" value="{{ $post->descr }}">
        </div>

        <div class="field">
            <label for="img">Image</label>

            <input type="file" name="img" value="{{ $post->img }}">
        </div>

        <div class="field">
            <label for="user_id">User ID</label>

            <input type="text" name="user_id" value="{{ $post->user_id }}">
        </div>

        <button type="submit">Submit!</button>
    </form>
@endsection
