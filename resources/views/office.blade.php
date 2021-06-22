<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="../resources/css/animations.css">
        <link rel="stylesheet" href="../resources/css/app.css">
        <script src="https://kit.fontawesome.com/269ab4fa37.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">

        <script src="https://kit.fontawesome.com/269ab4fa37.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <title>title</title>
    </head>
    <body>
    
        <header id='header' class='header_top header'>
            <div id='header_content'>
                <a class='header_button' href='index'>home</a>
                <a class='header_button' href='/'>about us</a>
                <a class='header_button' href='statistics'>weather</a>
                <a class='header_button' href='/'>history</a>
                <a class='header_button' href='{{Route("photohub")}}'>photo's</a>
                
                <div class="dropdown header_button">
                    <a>account</a>
                    <div class="dropdown-content w3-bar-block w3-card-4 w3-animate-opacity">
                        <!-- <a class='header_dropdown_button' href="#">Link 1</a>
                        <a class='header_dropdown_button' href="#">Link 2</a>
                        <a class='header_dropdown_button' href="#">Link 3</a> -->

                        @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a class='header_dropdown_button' href="{{route('accounts.index')}}" class="dropdown-item w3-bar-item">{{Auth::user()->name}}</a>
                                <a class='header_dropdown_button' href="{{ route('logout') }}" class="dropdown-item w3-bar-item" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Uitloggen</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a class='header_dropdown_button' href="{{ route('login') }}" class="dropdown-item w3-bar-item w3-button">login</a>
                                @if (Route::has('register'))
                                    <a class='header_dropdown_button' href="{{ route('register') }}" class="dropdown-item w3-bar-item w3-button">Registrer</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    </div>
            </div>
            @auth
                @if (Auth::user()->role == 'admin')
                    <a class='header_button' href='{{Route("office")}}'>office</a>
                @endif
            @endauth
            <div class="content_office">
                <h1>Welcome to the office, {{Auth::user()->name}}</h1>
                <div class="office_roles_wrapper">
                    <h2>promote/demote users</h2>
                    <form action="{{ route('user.promote') }}" method="POST" class="office_roles_form">
                    @CSRF
                        <label>search for user</label>
                        <input id='username' type="text" class="username" name='username' required>
                        
                        <label for="role">Choose a role:</label>
                        <select id='role' id="role" name="role" required>
                        <option value="admin">admin</option>
                        <option value="moderator">moderator</option>
                        <option value="user" selected>user</option>
                        </select>

                        <input type='submit' name='submit' value='submit' onclick='return confirm("are you sure that you want to promote/demote " + document.getElementById("username").value + " to " + document.getElementById("role").value + "?")'></input>
                    </form>
                </div>
                <div class="office_statistics">
                    <h3>Current amount of registered users: {{count($users)}}</h3>
                </div>            
            </div>
        </header>
        <script src='../resources/js/header_blur.js'></script>
    </body>
</html>
