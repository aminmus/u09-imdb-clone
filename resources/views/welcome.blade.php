<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
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

            <div class="content">
                <div class="title m-b-md">
                    IMDB Clone
                </div>
                <div>
                    <form method="POST" action="{{ route('searchMovie') }}">
                    <input type="text" name="search">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <button type="submit">Search Movie</button>
                    </form>
                </div>

                                @if(isset($body->results))
                    @foreach ($body->results as $result)

                    <h1>{{$result->title}} </h1>
                    <p>  {{$result->id}}<p>
                    <a href="{{ url('showmovie/' .$result->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $result->poster_path;?>"> </a>
                    
                    <!-- <form method="POST" action="{{ action('WatchlistController@store') }}">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <input name="movie_id" type="hidden" value="<?php echo $result->id;?>"/>
                    <input name="title" type="hidden" value="<?php echo $result->title;?>"/>
                    <input name="poster_path" type="hidden" value="<?php echo $result->poster_path;?>"/>
                    <button type="submit">Save Movie</button>
                    </form> -->
                    @endforeach
                @else
                    <h1></h1>
                @endif

                <div class="links">
                    <a href="{{ url('/watchlist') }}">My Watchlists</a>
                 </div>
            </div>
        </div>
    </body>
</html>
