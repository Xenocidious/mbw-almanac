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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/animations.css')}}">
</head>
<body>
<div id="app" class="bg-dark">
    <header id="header" class="header_top header">
        <div id="header_content">
            <a class="header_button" href="{{ route("home") }}">home</a>
            <a class="header_button" href="/">about us</a>
            <a class="header_button" href="{{ route("statistics") }}">weather</a>
            <a class="header_button" href="{{ route("history") }} ">history</a>
            <a class="header_button" href="{{ route("photohub") }}">photo's</a>

            <div class="dropdown header_button">
                <a>account</a>
                <div class="dropdown-content w3-bar-block w3-card-4 w3-animate-opacity">

                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{route('accounts.index')}}"
                                   class="header_dropdown_button dropdown-item w3-bar-item">{{Auth::user()->name}}</a>
                                <a href="{{ route('logout') }}"
                                   class="header_dropdown_button dropdown-item w3-bar-item" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Uitloggen</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                   class="header_dropdown_button dropdown-item w3-bar-item w3-button">login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="header_dropdown_button dropdown-item w3-bar-item w3-button">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
            {{-- Dit hoort een rout te zijn  en niet hardcoded "uploadphoto" als text --}}
            <a href="uploadphoto"><i id="add_image_photohub" class="fas fa-image"></i></a>
            @auth
                {{-- dit hoort in een middleware te zitten, of een view composer gebruiker. --}}
                @if (Auth::user()->role == 'admin')
                    <a class="header_button" href="{{ route("office") }}">office</a>
        @endif
        @endauth
    </header>

    <main class="py-4">
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
</div>

<footer>
    <div class='footer_left_items'>
        <a>Frequently Asked Questions</a><br>
        <hr style="width:50%;text-align:left;margin-left:0">
    </div>
    <div class='footer_left_items'>
        <a>Contact</a><br>
        <hr style="width:50%;text-align:left;margin-left:0">
    </div>
    <div class='footer_left_items'>
        <a>Lorem Ipsum</a><br>
        <hr style="width:50%;text-align:left;margin-left:0">
    </div>
    <div class='footer_left_items'>
        <a>Lorem Ipsum</a><br>
        <hr style="width:50%;text-align:left;margin-left:0">
    </div>
    <div class='footer_left_items'>
        <a>Lorem Ipsum</a><br>
        <hr style="width:50%;text-align:left;margin-left:0">
    </div>

    <div class='footer_right_items'>
        <div id='social_media_wrapper'>
            <ul>
                <li id='facebook_link'>
                    <a href="#">
                        <span></span><span></span><span></span><span></span>
                        <span class="fa fa-facebook"></span>
                    </a>
                </li>
                <p>follow us on facebook</p>
            </ul>
            <hr style="width:50%;text-align:left;margin-left:2.5vw">
        </div>
    </div>
    <div class='footer_right_items'>
        <div id='social_media_wrapper'>
            <ul>
                <li id='twitter_link'>
                    <a href="#">
                        <span></span><span></span><span></span><span></span>
                        <span class="fa fa-twitter"></span>
                    </a>
                </li>
                <p>follow us on <a>twitter</a></p>
            </ul>
            <hr style="width:50%;text-align:left;margin-left:2.5vw">
        </div>
    </div>
    <div class='footer_right_items'>
        <div id='social_media_wrapper'>
            <ul>
                <li id='instagram_link'>
                    <a href="#">
                        <span></span><span></span><span></span><span></span>
                        <span class="fa fa-instagram"></span>
                        <span class="fa fa-instagram insta_button"></span>
                    </a>
                </li>
                <p id='footer_p'>follow us on instagram</p>
            </ul>
            <hr style="width:50%;text-align:left;margin-left:2.5vw">
        </div>
    </div>
    <div class='footer_right_items'>
        <div id='social_media_wrapper'>
            <ul>
                <li id='linkedin_link'>
                    <a href="#">
                        <span></span><span></span><span></span><span></span>
                        <span class="fa fa-linkedin"></span>
                    </a>
                </li>
                <p>follow us on linkedin</p>
            </ul>
            <hr style="width:50%;text-align:left;margin-left:2.5vw">
        </div>
    </div>

    <div class='footer_copyright'>
        <p>copyright project almanac Aya, Mert en Pieterjan: ©2021 - <?= date("Y"); ?></p>
    </div>
</footer>

<script src="{{ asset('js/header_blur.js') }}"></script>

</body>
</html>
