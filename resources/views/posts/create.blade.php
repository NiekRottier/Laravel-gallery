@extends ('form')

@section ('content')
    <h1>Welcome to the post creator!</h1>

    <form action="" target="">
        <input type="text" name="title" placeholder="Title here..">
        <input type="text" name="description" placeholder="Description here..">
        <input type="file" name="image">
        <button type="submit" name="submit">Post!</button>
    </form>
@endsection
