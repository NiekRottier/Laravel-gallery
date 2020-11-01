@extends('layouts.main')

@section('content')
    <h1>{{ $selectedUser->username }}</h1>

    @can('editUser', $selectedUser)
        <a href="/users/{{ $selectedUser->id }}/edit">Edit username</a>
        @can('seeAllUsers')
            <br /><a href="/users">See all users (Admin)</a>
        @endcan
        <hr />
    @endcan


    <div id="card-box">
        @foreach($posts as $post)
            <div class="card">
                <h2>{{ $post->title }}</h2>
                <img src="{{ $post->img }}" alt="{{ $post->img }}"/>
                <a href="/posts/{{ $post->id }}">Read more..</a>

                @can('editPosts', $post)
                    <form method="POST" action="/users/{{ Auth::id() }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="active" value="@if($post->active) 0 @else 1 @endif">
                        <button type="submit">@if($post->active) On @else Off @endif</button>
                    </form>
                @endcan
            </div>
        @endforeach
    </div>
@endsection
