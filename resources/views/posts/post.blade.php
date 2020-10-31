@extends ('layouts.main')

@section ('content')
    <h1>"{{ $post->title }}"</h1>
    <p>{{ $post->descr }}</p>
    <img src="{{ $post->img }}" alt="{{ $post->img }}">
@endsection
