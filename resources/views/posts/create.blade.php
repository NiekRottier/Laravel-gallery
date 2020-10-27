@extends('form')

@section('content')
    <h1>Create a post!</h1>

    <form method="post" action="/posts">
        @csrf

        <div class="field">
            <label for="title">Title&#42;</label>

            <input class="@error('title') errorField @enderror" type="text" name="title" placeholder="Title here..">

            @error('title')
                <p class="errorText">{{ $errors->first('title') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="descr">Description</label>

            <input class="@error('descr') errorField @enderror" type="text" name="descr" placeholder="Description here..">

            @error('descr')
                <p class="errorText">{{ $errors->first('descr') }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="@error('img') errorField @enderror" id="fileUpload" for="img"><i class="fas fa-upload"></i> Upload image</label>

            <input type="file" accept="image/*" name="img" id="img">

            @error('img')
                <p class="errorText">{{ $errors->first('img') }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="user_id">User ID&#42;</label>

            <input type="text" name="user_id" value="1">
        </div>

        <button type="submit">Submit!</button>
    </form>

@endsection
