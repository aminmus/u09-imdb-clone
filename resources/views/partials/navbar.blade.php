

<div class="container">
    <div class="row ">

    <div class="">
            IMDB Clone Dragones
    </div>
    <div class="column align-self-center">
        <form method="POST" action="{{ route('searchMovie') }}">
        <input type="text" name="search">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <button type="submit">Search Movie</button>
        </form>
    </div>
    </div>
</div>
  

<div class="position-ref full-height">
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

          