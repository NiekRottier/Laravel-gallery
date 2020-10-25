@extends ('layout')

@section ('content')
    <h1>"{{ $post->title }}"!</h1>
    <img src="{{ $post->img }}" alt="{{ $post->img }}">
    <p>{{ $post->descr }}</p>
@endsection
