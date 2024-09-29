<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module59 test</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <header>
        <p align="center">header</p>
        <x-menu color="primary"></x-menu>
    </header>
    @yield('content')
    <footer>
        <p align="center">footer</p>
        <x-menu color="secondary"></x-menu>
    </footer>
</body>
</html>
