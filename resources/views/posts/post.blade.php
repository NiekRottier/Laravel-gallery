@extends ('layouts.main')

@section ('content')
    <h1>"{{ $post->title }}"</h1>
    <p>{{ $post->descr }}</p>
    <img src="{{ $post->img }}" alt="{{ $post->img }}">

    @can('editPost', $post)
        <a href="/posts/{{ $post->id }}/edit">Edit your post</a>
    @endcan
@endsection
