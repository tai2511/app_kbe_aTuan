<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("assets/img/favicon/favicon-32x32.png") }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rebaudo') }}</title>

    <link rel="stylesheet" href="{{  asset("assets/css/bootstrap.min.css") }}">
    @yield('css_file')
</head>
<body>
    @section('sidebar')
    @show
    <main>
        @yield('content')
    </main>
    <script src="{{  asset("assets/js/jquery.js") }}"></script>
    @yield('js')
</body>
</html>
