@extends ('layout')

@section ('content')
    <h1>Welcome to the homepage!</h1>

    <h2>Posts</h2>
    <div id="card-box">
        <div class="card">
            <div class="card-content">
                            <h2>Title</h2>
                            <img src="" />
                            <a href="{{ route('posts.post', 1) }}">Post 1 link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <h2>Title</h2>
                <img src="" />
                <a href="{{ route('posts.post', 2) }}">Post 2 link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <h2>Title</h2>
                <img src="" />
                <a href="{{ route('posts.post', 3) }}">Post 3 link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <h2>Title</h2>
                <img src="" />
                <a href="{{ route('posts.post', 4) }}">Post 4 link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <h2>Title</h2>
                <img src="" />
                <a href="{{ route('posts.post', 5) }}">Post 5 link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <h2>Title</h2>
                <img src="" />
                <a href="{{ route('posts.post', 6) }}">Post 6 link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <h2>Title</h2>
                <img src="" />
                <a href="{{ route('posts.post', 7) }}">Post 7 link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <h2>Title</h2>
                <img src="" />
                <a href="{{ route('posts.post', 8) }}">Post 8 link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <h2>Title</h2>
                <img src="" />
                <a href="{{ route('posts.post', 9) }}">Post 9 link</a>
            </div>
        </div>
    </div>
@endsection
