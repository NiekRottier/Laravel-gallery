@extends ('layout')

@section ('content')
    <h1>Welcome to the homepage!</h1>

    <h2>Posts</h2>
    <div id="card-box">
        @foreach($posts as $post)
            <div class="card">
                <h2>{{ $post->title }}</h2>
                <img src="{{ $post->image }}" alt="{{ $post->image }}"/>
                <a href="{{ route('post', $post->id) }}">Read more..</a>
            </div>
        @endforeach
    </div>
@endsection
