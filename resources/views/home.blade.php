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
        <div class="h-20 bg-gray-700 shadow-lg">
           <p class="text-gray-100 text-xl p-4">Moedas</p>
        </div>
        <div class="justify-items-center grid grid-cols-12 gap-4 p-4">
            @foreach ($coins as $coin)
                <x-coin-card 
                    :coin="$coin"
                />
            @endforeach
        </div>
    <x-coin-modal/>
    </body>
    <script>
        window.axios.get('https://economia.awesomeapi.com.br/json/all').then(({ data }) => {
            console.log(data);
        });
    </script>
</html>
