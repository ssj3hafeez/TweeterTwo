<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Tweeter</title>

    <!-- Scripts -->
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">

</head>
<body>
<div class= "has-background-primary">
    <div id="app">
        <nav class="navbar - message is-primary">
            <div class="column">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <nav ul class="navbar is-primary has-text-centered">
                        <!-- Authentication Links -->
                        @guest
                           <ul> <li><div class="navbar-dropdown has-text-danger" style="padding-left: 5px;" >
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                            @if (Route::has('register'))
                               <li> <div class="navbar-dropdown has-text-danger" style="padding-left: 5px;">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </div>
                            </li>
                            </ul>

                            @endif
                        @else
                            <li class="nav-item dropdown">

                                <div class="dropdown is-active" aria-controls="dropdown-menu ">
                                    <a class="dropdown-item - has-text-danger - has-text-weight-bold" href="/profile/show/{{{Auth::user()->id}}}">Profile</a>
                                    <a class="dropdown-item - has-text-danger - has-text-weight-bold" href="/tweetFeed/">News Feed </a>

                                    <a class="dropdown-item - has-text-danger - has-text-weight-bold" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf


                                    </form>
                                </div>
                            </li>
                        </nav>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="column">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
