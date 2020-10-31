@extends ('layouts.main')

@section ('content')

    <div id="card-box">
        @foreach($posts as $post)
            <div class="card">
                <h2>{{ $post->title }}</h2>
                <img src="{{ $post->img }}" alt="{{ $post->img }}"/>
                <a href="{{ route('post', $post->id) }}">Read more..</a>
            </div>
        @endforeach
    </div>
@endsection
