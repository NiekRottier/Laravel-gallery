@extends ('form')

@section ('content')
    <h1>Welcome to the post creator!</h1>

    <form method="post" action="/posts">
        @csrf

        <div class="field">
            <label for="title">Title</label>

            <input type="text" name="title" placeholder="Title here..">
        </div>

        <div class="field">
            <label for="descr">Description</label>

            <input type="text" name="descr" placeholder="Description here..">
        </div>

        <div class="field">
            <label for="img">Image</label>

            <input type="file" name="img">
        </div>

        <div class="field">
            <label for="user_id">User ID</label>

            <input type="text" name="user_id" value="1">
        </div>

        <button type="submit">Submit!</button>
    </form>
@endsection
