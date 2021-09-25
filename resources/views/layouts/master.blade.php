<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SkyLight</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
</head>
<body class="master-body">
    @section('satrs')
    <div id="stars" style="position: fixed; width: 100vw; height: 100wh; z-index:-1;">
    </div>
    @show
    @include('layouts.header')
    
    @yield('content')
    
    @include('layouts.footer')
    <script src="{{ asset('js/particles.min.js') }}"></script>
    <script src="{{ asset('js/master-custom.js') }}"></script>
</body>
</html>
