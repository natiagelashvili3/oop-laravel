<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body>
    
    <header>
        <a href="{{ route('home') }}">Main</a>
        <a href="{{ route('about') }}">About</a>
    </header>

    @yield('test-content')

    <footer>
        @yield('test-footer')
    </footer>

    <script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>