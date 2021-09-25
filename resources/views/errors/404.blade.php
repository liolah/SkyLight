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
<body class="master-body" style="background-image: url('/imgs/BackGrounds/bg (2).jpg')">
    {{-- <div id="stars" style="position: fixed; width: 100vw; height: 100wh; z-index:-1;">
    </div> --}}
    @include('layouts.header')
    <div style="height: 100px"> </div>
    <div class="container" style="">
    <div class="row justify-content-between col-8 offset-2 mr-2" style="position: relative; bottom: 60px; right: 10px; color: rgba(251, 217, 255, 0.8);">
      <div class="error-code text-xl-left " style="font-size: 300px">4</div>
      <div class="error-code text-xl-left " style="font-size: 300px">4</div>
    </div>
    <div class="row justify-content-between col-8 offset-2 mr-2" style="position: relative; bottom: 60px; right: 10px">
      <div class="error-code text-xl-left text-white text-center offset-1" style="font-size: 20px">The requested page couldn't be found in the observable universe</div>
      <div class="error-code text-xl-left text-white text-center offset-4 mr-5" style="font-size: 20px"><a href="{{ route("posts.index") }}">Return while you still can</a></div>
    </div>
    </div>
    @include('layouts.footer')
    <script src="{{ asset('js/particles.min.js') }}"></script>
    <script src="{{ asset('js/master-custom.js') }}"></script>
</body>
</html>
