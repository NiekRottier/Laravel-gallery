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

{{--        <div class="field">--}}
{{--            <label class="@error('img') errorField @enderror" id="fileUpload" for="img"><i class="fas fa-upload"></i> Upload image--}}
{{--                <input type="file" accept="image/*" name="img" id="img" />--}}
{{--            </label>--}}

{{--            @error('img')--}}
{{--                <p class="errorText">{{ $errors->first('img') }}</p>--}}
{{--            @enderror--}}
{{--        </div>--}}

        <div class="field">
            <label for="user_id">User ID&#42;
                <input type="text" name="user_id" value="1">
            </label>
        </div>

        <button type="submit">Submit!</button>
    </form>

@endsection
