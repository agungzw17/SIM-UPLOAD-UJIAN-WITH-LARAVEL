<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
            type="text/css"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        />
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
        <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>


    </head>
    <body>
    <div class="ui container" style="position: absolute; margin-top: -42%; width: 100%; height: 20%;">
    <div class="ui pointing menu">
        <a class="active item" style="margin-left: 48%;" href="/">
            <h1>Home</h1>
        </a>
    </div>
    </div>

        <div style="position: absolute; margin-top: -35%; margin-left: 32%;" >
            <h1 style="font-size: 70px;">SIM Upload Soal Ujian</h1>
        </div>
        <div class="ui container">
            <img src="{{URL::asset('/images/uii.png')}}" alt="profile Pic" height="400" width="400" style="position: absolute; margin-top: -450px; margin-left: 20%;">
        </div>

        <div>
        <div class="">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <div class="ui container">
                            <button class="fluid ui button" style="margin-top: 70%;"><a href="{{ route('login') }}">Login</a></button>
                        </div>
                        @if (Route::has('register'))
                            <div class="ui container" style="margin-top: 1%;">
                                <button class="fluid ui button"><a href="{{ route('user.create') }}">Register</a></button>
                            </div>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        </div>
    </body>
</html>
