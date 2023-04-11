<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Maogmang Belly') }}</title>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        {{View::make('components.header')}}
        <main>
            @yield('content')
        </main>
        {{View::make('components.footer')}}
    </div>
</body>
@yield('javascript')
@stack('script')

</html>