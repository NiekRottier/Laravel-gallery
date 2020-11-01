@extends('layouts.main')

@section('content')
    <form id="search" method="post" action="/">
        @csrf
        <input type="search" name="search" placeholder="Search for a title here..">
        <button type="submit">Search</button>

        <div>
            <label for="kitten">Kitten
                <input type="radio" id="kitten" name="tags" value="kitten"><br></label>
            <label for="bunny">Bunny
                <input type="radio" id="bunny" name="tags" value="bunny"><br></label>
            <label for="chicken">Chicken
                <input type="radio" id="chicken" name="tags" value="chicken"><br></label>
            <label for="pinguin">Pinguin
                <input type="radio" id="pinguin" name="tags" value="pinguin"><br></label>
            <label for="panda">Panda
                <input type="radio" id="other" name="tags" value="panda"></label>
        </div>
    </form>

    <div id="card-box">
        @foreach($posts as $post)
            <div class="card">
                <h2>{{ $post->title }}</h2>
                <img src="{{ $post->img }}" alt="{{ $post->img }}"/>
                <a href="/posts/{{ $post->id }}">Read more..</a>
            </div>
        @endforeach
    </div>
@endsection
