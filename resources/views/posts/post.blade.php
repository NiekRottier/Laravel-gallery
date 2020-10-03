<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>
<body>
<h1>Welcome to the post "{{ $post->title }}"!</h1>
<p>{{ $post->description }}</p>
<a href="{{ route('index') }}">Homepage</a>
</body>
</html>
