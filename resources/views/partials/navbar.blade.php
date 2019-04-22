<nav class="navbar navbar-expand-sm navbar-light navbar-laravel">
      <div class="navbar-nav">
      <a class="navbar-brand" href="{{ url('/')}}">
        <h3 class="nav-item">IMDB-CLONE DRAGONS</h3>
        </a>
      </div>
            <ul class="navbar-nav ml-auto">
                <form class="nav-item" method="POST" action="{{ route('searchMovie') }}">
                    <input class="nav-item" type="text" name="search">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <button class="nav-button" type="submit">Search Movie</button>
                </form>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/watchlist') }}"><b>My Watchlists</b></a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/profile') }}">Profile Dashboard</a>


                        <a class="dropdown-item" href="{{ url('/watchlists') }}">My Watchlists</a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
</nav>
