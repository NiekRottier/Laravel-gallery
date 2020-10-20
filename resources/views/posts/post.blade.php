@extends ('layout')

@section ('content')
    <h1>Welcome to the post "{{ $post->title }}"!</h1>
    <img src="{{ $post->image }}" alt="{{ $post->image }}">
    <p>{{ $post->description }}</p>
@endsection
