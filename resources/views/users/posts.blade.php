@extends ('layouts.main')

@section ('content')

    <div id="card-box">
        @foreach($posts as $post)
            <div class="card">
                <h2>{{ $post->title }}</h2>
                <img src="{{ $post->img }}" alt="{{ $post->img }}"/>
                <form method="post" action="/users/{{ Auth::id() }}">
                    <label for="activePost">Active
                    <input name="activePost" type="checkbox" checked></label>
                </form>
            </div>
        @endforeach
    </div>
@endsection
