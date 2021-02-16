<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - {{ env('app_name', 'Laravel') }}</title>

    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    @stack('css')
</head>
<body>
<div id="app">
    @yield('content')
</div>
<script src="{{ asset(mix('js/app.js')) }}"></script>
@stack('js')
</body>
</html>
