<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <header>
        <a href="http://localhost/example-app/public/">Main</a>
        <a href="http://localhost/example-app/public/about">About</a>
    </header>

    @yield('test-content')

    <footer>
        @yield('test-footer')
    </footer>

</body>
</html>