<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoavaluació</title>
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>

    @include('layouts.navbar')

    <div class="container mt-4">
        @yield('welcome')
    </div>

    @yield('authContent')

    @yield('content')




    
</body>
</html>