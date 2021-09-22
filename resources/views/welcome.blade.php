<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SkyLight</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <!-- Styles -->
        <style>
                body {
                /* background-color: #fff; */
                color: #ffffff;
                background-image: url("imgs/BackGrounds/bg (5).jpg");
                background-size: 100vw 100vh;
                background-position: center center;
                /* position: absolute; */
                z-index: -1;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                box-sizing: border-box;
            }

            
            .full-height {
                height: 100vh;
            }
            
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            
            .position-ref {
                position: relative;
            }
            
            .top {
                position: absolute;
                top: 18px;
            }
            
            .content {
                text-align: center;
                position:absolute;
                background-color: rgba(0, 0, 0, 0.4);
                backdrop-filter: blur(3px);
                transform: translate(-50% -50%);
                padding: 60px;
                border-radius: 20px;
                top: 20%;
                z-index: 20;
            }
            
            @media (max-width: 1400px) {
            body {
                background-size: cover;
            }
            }
            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                text-align: center;
            }
            .nav{
                position: absolute;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 2;
                width: 100vw;
                height: 50px;
                background-color: rgba(255, 255, 255,0.05);
                -webkit-backdrop-filter: blur(7px);
                backdrop-filter: blur(7px);
            }
            .header{
                top: 0;
            }
            .footer{
                bottom: 0;
            }
            .text{
                font-size: 1.5rem;
                font-weight: 700;
                padding-top: 30px;
            }
            .bar{
                width: 100%;
                height: 3px;
                background-color: #ffffff;
            }

            #stars{
                z-index: 1;
                width: 100vw;
                height: 100vh;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div id="stars"></div>
            <div class="nav header">
            @if (Route::has('login'))
                <div class="links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
            <div class="content">
                <div class="title">
                    <div>SkyLight</div>
                    <div class="bar"></div>
                    <div class="text">A simple blog for sharing post-midnight thoughts and late nights existential crises</div>
                </div>

            </div>
            <div class="nav footer"><span class="links">© 2021 Copyright
                <a class="text-light" href="mailto:hesham.h3886@gmail.com">Hesham Hany</a></span></div>
        </div>
        <script src="{{ asset('js/particles.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>
