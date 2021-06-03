<!DOCTYPE html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="../resources/css/app.css">
        <script src="https://kit.fontawesome.com/269ab4fa37.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>title</title>
    </head>
    <body>
        <header id='index_header' class='header_top header'>
            <div id='index_header_content'>
                <a href='/'>about us</a>
                <a href='/'>weather</a>
                <a href='/'>history</a>
                <a href='/'>photo's</a>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a href="">Profile</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

            </div>
        </header>
        <div id='index_content_1'>
            <h1>26 °C</h1>
            <h1><i class="fas fa-sun"></i></h1>

            <div id='index_cards_wrapper'>
                <div id='index_cards_wrapper_card_1' class='index_cards'>
                    <div>
                        <h2>Yesterday</h2>
                        <h3>20°</h3>
                        <h4>warm</h4>
                        <i class="fas fa-sun"></i>
                    </div>
                </div>
                <div id='index_cards_wrapper_card_2' class='index_cards'>
                    <div>
                        <h2>today</h2>
                        <h3>26°</h3>
                        <h4>extra warm</h4>
                        <i class="fas fa-sun"></i>
                    </div>
                </div>
                <div id='index_cards_wrapper_card_3' class='index_cards'>
                    <div>
                        <h2>Tomorrow</h2>
                        <h3>22°</h3>
                        <h4>warm</h4>
                        <i class="fas fa-sun"></i>
                    </div>
                </div>
            </div>
        </div>
        <div id='temp_filler'></div>


    <script src='../resources/js/animations_index.js'></script>
    </body>
</html>
