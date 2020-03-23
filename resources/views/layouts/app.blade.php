<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="min-name" content="{{ env('MIN_NAME') }}"/>
    <meta name="max-name" content="{{ env('MAX_NAME') }}"/>
    <meta name="min-title" content="{{ env('MIN_TITLE') }}"/>
    <meta name="max-title" content="{{ env('MAX_TITLE') }}"/>
    <meta name="min-text" content="{{ env('MIN_TEXT') }}"/>
    <meta name="max-text" content="{{ env('MAX_TEXT') }}"/>


    <script src="https://use.fontawesome.com/571d4201e5.js"></script>


</head>
<body>
    <div id="app">

        @include('parts.nav')

        <main class="container">
            @section('content')

            @show
        </main>

        @section('modal')
            @include('parts.modal')
        @show

        <div class="footer">
            <div class="container">
                <a href="http://www.youtube.com">
                    <span class="fa fa-youtube"></span>
                </a>

                <a href="http://www.instagram.com">
                    <span class="fa fa-instagram"></span>
                </a>

                <a href="http://www.facebook.com">
                    <span class="fa fa-facebook"></span>
                </a>
            </div>
        </div>

    </div>
</body>
</html>
