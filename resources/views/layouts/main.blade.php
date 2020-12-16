
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta charset="UTF-8" />

       <meta name="viewport" content="width=device-width, initial-scale=1.0" />

       <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
       <script src="{{ asset('js/app.js') }}"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased bg-gray-100">
        @yield('content')
    </body>
</html>