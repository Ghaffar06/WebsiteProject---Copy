<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EVA</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EVA') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">

</head>

<body class="mt-5 rtl">
    <div class="layer"></div>
    <div id="top-menu">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-3">
                <i class="fas fa-bars fa-lg" id="toggler"> </i>
                <b>
                    <a class="navbar-brand" href="{{route('home')}}">
                        <span class="video-icon p-1"><i class="fas fa-play-circle"></i></span>
                        EVA

                    </a>
                    &nbsp
                </b>

                @guest
                <div style="width: 60em;"></div>
                <a href="{{ route('register') }}" class="nav-link login" data-toggle="modal" data-target="#loginModal">
                    Login</a>
                <a class="nav-link login" href="{{ route('register') }}">
                    {{ __('Register')}}
                </a>

                @else
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mx-lg-auto">
                        <li class="nav-item">
                        <a class="nav-link px-3 ml-1" href="\profile\{{Auth::user()->id}}"> {{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 ml-1" href="\viewSongs\1"> Newest</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 ml-1" href="\viewSongs\1"> Trending </a>
                        </li>
                        <li class="nav-item first-list-element">
                            <a class="nav-link px-3 ml-1 mr-3" href="\viewSongs\1">Suggested Songs </span></a>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </div>
                    <i class="fas fa-search mr-4 search-icon"></i>
                </div>
                @endguest

            </nav>
            <input type="search" class="form-control search-input" placeholder=" Search ...">

            <!-- Modal -->
            @guest
            @if (Route::has('login'))
            <div class="modal fade" id="loginModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Login</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text "
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif


            <div class="modal fade" id="loginModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="nav-link" href="{{ route('register') }}">
                                <h5 class="modal-title" id="exampleModalLabel"> {{__('Register')}}</h5>
                            </a>
                            <div style="width:100em">
                            </div>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row pt-4">
                <div id="wrap">
                    <div class="sidebar">
                        <ul class="list-group list-group-flush pl-0">
                            <a href="/home" class="list-group-item list-group-item-action">
                                <i class="fas fa-home mr-2 purple"></i>Home
                            </a>
                            <a href="/about" class="list-group-item list-group-item-action">
                                <i class="fas fa-question-circle mr-2 purple"></i>Help
                            </a>
                            <a href="https://hiast.edu.sy" class="list-group-item list-group-item-action pb-4">
                                &copy; HIAST <br>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            @else

            <div class="row pt-4">
                <div id="wrap">
                    <div class="sidebar">
                        <ul class="list-group list-group-flush pl-0">
                            <a href="index.html" class="list-group-item list-group-item-action">
                                <i class="fas fa-home mr-2 purple"></i>Home
                            </a>
                            <a href="\viewSongs\1" class="list-group-item list-group-item-action">
                                <i class="fab fa-algolia mr-2 purple"></i>Suggested Songs
                            </a>
                            <a href="\viewSongs\1" class="list-group-item list-group-item-action">
                                <i class="far fa-plus-square mr-2 purple"></i> Newest
                            </a>
                            <a href="\viewSongs\1" class="list-group-item list-group-item-action">
                                <i class="fas fa-fire-alt mr-2 purple"></i> Trending
                            </a>
                            <a href="\viewPlaylists" class="list-group-item list-group-item-action">
                                <i class="fas fa-fire-alt mr-2 purple"></i> My Playlists
                            </a>
                            <a href="\viewGroups" class="list-group-item list-group-item-action">
                                <i class="fas fa-fire-alt mr-2 purple"></i> My Groups
                            </a>
                            <a href="{{ route('about') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-history mr-2 purple"></i>History
                            </a>

                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fas fa-cog mr-2 purple"></i>Profile
                            </a>
                            <a href="{{ route('about') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-question-circle mr-2 purple"></i>Help
                            </a>
                            <a href="https://hiast.edu.sy" class="list-group-item list-group-item-action pb-4">
                                &copy; HIAST <br>

                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            @endguest

            <!--  Home Body -->

        </div>
    </div>
    <div style="height:1em;"></div>
    <main>
        @yield('content')
    </main>
    <!-- Scripts -->
    <script src="{{ asset('../../js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" defer></script>
    <script src="{{ asset('js/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/597cb1f685.js" crossorigin="anonymous"></script>

</body>

</html>