@extends('layouts.form')

@section('content')
    <h1>Create a post!</h1>

    <form method="post" action="/posts">
        @csrf

        <div class="field">
            <label for="title">Title&#42;
                <input class="@error('title') errorField @enderror" type="text" name="title" placeholder="Title here.." />
            </label>

            @error('title')
                <p class="errorText">{{ $errors->first('title') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="descr">Description
                <input class="@error('descr') errorField @enderror" type="text" name="descr" placeholder="Description here.." />
            </label>

            @error('descr')
                <p class="errorText">{{ $errors->first('descr') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="img">Image
                <input class="@error('img') errorField @enderror" type="text" name="img" placeholder="Image URL here.." />
            </label>

            @error('img')
            <p class="errorText">{{ $errors->first('img') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="kitten">Kitten
            <input type="radio" id="kitten" name="tags" value="kitten"><br></label>
            <label for="bunny">Bunny
            <input type="radio" id="bunny" name="tags" value="bunny"><br></label>
            <label for="panda">Panda
            <input type="radio" id="other" name="tags" value="panda"></label>

            @error('tags')
            <p class="errorText">{{ $errors->first('tags') }}</p>
            @enderror
        </div>

        <button type="submit">Create post!</button>
    </form>

@endsection
