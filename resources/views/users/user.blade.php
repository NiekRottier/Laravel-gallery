@extends('layouts.main')

@section('content')
    <h1>{{ $selectedUser->username }}</h1>
    @can('editUser', $selectedUser)
        <a href="/users/{{ $selectedUser->id }}/edit">Edit username</a>
    @endcan

    <div id="card-box">
        @foreach($posts as $post)
            <div class="card">
                <h2>{{ $post->title }}</h2>
                <img src="{{ $post->img }}" alt="{{ $post->img }}"/>
                <a href="/posts/{{ $post->id }}">Read more..</a>
            </div>
        @endforeach
    </div>
@endsection
