<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Vue App</title>

        <!-- Fonts -->
        <link href="" rel="stylesheet">

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="antialiased">
    <div id="app">

{{--        @{{ mesaj }} <!-- @ işareti vue js'e ait içerik olduğunu belirtiyor, öbür türlü kafası karışıyor !-->--}}
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
