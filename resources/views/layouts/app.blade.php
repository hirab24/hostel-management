<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Hostel Manager') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
        }

        .main-content {
            margin-left: 280px;
            width: calc(100% - 280px);
            min-height: 100vh;
            background: #f4f7fb;
        }

        @media (max-width: 900px) {

            .main-content {
                margin-left: 280px;
                width: calc(100% - 280px);
            }

        }

        @media (max-width: 700px) {

            .main-content {
                margin-left: 0;
                width: 100%;
            }

        }

    </style>

</head>


<body>

    {{-- LEFT SIDEBAR --}}

    @include('layouts.navigation')


    {{-- MAIN CONTENT --}}

    <main class="main-content">

        {{ $slot }}

    </main>


</body>

</html>