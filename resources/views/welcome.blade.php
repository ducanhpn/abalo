<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:7400,600&display=swap" rel="stylesheet" />
        <link href="{{asset('/style.css')}}" rel="stylesheet"  />

        <!-- Styles -->

        @vite(['resources/js/data.js'])

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        @vite(['resources/js/create-nav.js'])

        <nav id="nav"></nav>
        <h1>Hello</h1>
        <label for="function-name">Bitte geben Sie den Funktion-Namen ein: </label>
        <input type="text" id="function-name">
        <button onclick="showResult()">OK</button>
        <h3 id="title"></h3>
        <p id="result"></p>

        @vite(['resources/js/cookiecheck.js'])
    </body>
</html>
