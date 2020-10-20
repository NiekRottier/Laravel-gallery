<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">

    <title>Laravel Gallery - Form</title>
</head>
<body>
    <header>
        <p id="logo">Laravel<br />Gallery</p>
        <a href="{{ url()->previous() }}" id="back"> &lt; Back </a>
    </header>

    @yield ('content')

    <footer>
        <p>Created by Niek Rottier</p>
        <p>CMGT Prog05</p>
    </footer>
</body>
</html>
