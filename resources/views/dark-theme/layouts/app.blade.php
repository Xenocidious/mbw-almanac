<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/269ab4fa37.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../public/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../public/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../public/plugins/summernote/summernote-bs4.min.css">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark text-white shadow-sm">
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link text-white" href="index">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/">About us</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/statistics">Statistics</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route("photohub") }}">Photo's</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route("weather") }}">Weather</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <i class="fas fa-user"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a href="{{ route('accounts.index') }}"
                               class="dropdown-item">{{ __('Profile') }}
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <main class="py-4 bg-dark">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-dark">
        <div class='footer_left_items'>
            <a class="text-light">Frequently Asked Questions</a><br>
            <hr style="width:50%;text-align:left;margin-left:0">
        </div>
        <div class='footer_left_items'>
            <a class="text-light">Contact</a><br>
            <hr style="width:50%;text-align:left;margin-left:0">
        </div>
        <div class='footer_left_items'>
            <a class="text-light">Lorem Ipsum</a><br>
            <hr style="width:50%;text-align:left;margin-left:0">
        </div>
        <div class='footer_left_items'>
            <a class="text-light">Lorem Ipsum</a><br>
            <hr style="width:50%;text-align:left;margin-left:0">
        </div>
        <div class='footer_left_items'>
            <a class="text-light">Lorem Ipsum</a><br>
            <hr style="width:50%;text-align:left;margin-left:0">
        </div>

        <div class='footer_right_items'>
            <div id='social_media_wrapper'>
                <ul>
                    <li id='facebook_link'>
                        <a href="#" class="text-light">
                            <span></span><span></span><span></span><span></span>
                            <span class="fa fa-facebook"></span>
                        </a>
                    </li>
                    <p class="text-light">follow us on facebook</p>
                </ul>
                <hr style="width:50%;text-align:left;margin-left:2.5vw">
            </div>
        </div>
        <div class='footer_right_items'>
            <div id='social_media_wrapper'>
                <ul>
                    <li id='twitter_link'>
                        <a href="#" class="text-light">
                            <span></span><span></span><span></span><span></span>
                            <span class="fa fa-twitter"></span>
                        </a>
                    </li>
                    <p class="text-light">follow us on <a>twitter</a></p>
                </ul>
                <hr style="width:50%;text-align:left;margin-left:2.5vw">
            </div>
        </div>
        <div class='footer_right_items'>
            <div id='social_media_wrapper'>
                <ul>
                    <li id='instagram_link'>
                        <a href="#" class="text-light">
                            <span></span><span></span><span></span><span></span>
                            <span class="fa fa-instagram"></span>
                            <span class="fa fa-instagram insta_button"></span>
                        </a>
                    </li>
                    <p id='footer_p' class="text-light">follow us on instagram</p>
                </ul>
                <hr style="width:50%;text-align:left;margin-left:2.5vw">
            </div>
        </div>
        <div class='footer_right_items'>
            <div id='social_media_wrapper'>
                <ul>
                    <li id='linkedin_link'>
                        <a href="#" class="text-light">
                            <span></span><span></span><span></span><span></span>
                            <span class="fa fa-linkedin"></span>
                        </a>
                    </li>
                    <p class="text-light">follow us on linkedin</p>
                </ul>
                <hr style="width:50%;text-align:left;margin-left:2.5vw">
            </div>
        </div>

        <div class='footer_copyright'>
            <p class="text-light">copyright project almanac Aya, Mert en Pieterjan: ©2021 - <?= date("Y"); ?></p>
        </div>
    </footer>
</div>

@section('body-scripts')
    {{-- Defineer alle scripts die op het einde van de pagina ingeladen moeten worden voor Alle paginas. --}}
@show

</body>
</html>
}