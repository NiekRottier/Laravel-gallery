@extends ('layouts.main')

@section ('content')
    <h1>"{{ $post->title }}"</h1>
    <p>{{ $post->descr }}</p>
    <img src="{{ $post->img }}" alt="{{ $post->img }}">

    @can('editPost', $post)
        <a href="/posts/{{ $post->id }}/edit">Edit your post</a>
    @endcan

    <p>Rating: <b>{{ $likes }}</b></p>
    @if(Auth::check())
        <form id="vote" method="post" action="/posts/{{ $post->id }}">
            @csrf

            <input type="hidden" name="like" value="1">
            <button type="submit"><i id="like" class="fab fa-gratipay"></i></button>
        </form>
    @endif
@endsection
