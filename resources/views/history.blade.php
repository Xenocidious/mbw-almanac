<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{asset('css/animation.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="https://kit.fontawesome.com/269ab4fa37.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


        <script src="https://kit.fontawesome.com/269ab4fa37.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <title>Almanac</title>
    </head>
    <body>

        <header id='header' class='header_top header'>
            <div id='header_content'>
                <a class='header_button' href='{{route("home")}}'>home</a>
                <a class='header_button' href='/'>about us</a>
                <a class='header_button' href='statistics'>weather</a>
                <a class='header_button' href='{{Route("history")}}'>history</a>
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
        </header>

        <div id='spacefiller'></div>
        <div id='spacefiller'></div>
        <div id='spacefiller'></div>

        <form action="{{Route('get.date')}}" autocomplete="off" mindate>
        {{  Form::text('date', '', array('id' => 'datepicker')) }}

        <input type="submit" value="Submit">
        </form>

        @if (isset($fetchedDate))
        @foreach ($fetchedDate as $item)
        <div id='index_cards_wrapper_card_1' class='index_cards'>
            <div>
                <h2>{{$weekDay}}</h2>
                <h6>{{$fetchedDate[0]['datetime']}}</h6>
                <h2>{{$fetchedDate[0]['tempmax']}}°</h2>
                <h3>{{$fetchedDate[0]['conditions']}}</h3>
                <h5>{{$fetchedDate[0]['description']}}</h5>
            </div>
           <button onclick="toggleExpandedData()"> <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
            <div id="expandedData">
                <h3>Max: {{$fetchedDate[0]['tempmax']}}°</h3>
                <h3>Min: {{$fetchedDate[0]['tempmin']}}°</h3>
                <h3>Feels like: {{$fetchedDate[0]['feelslikemax']}}°</h3>
                <h3>Windspeed: {{$fetchedDate[0]['windspeed']}}km/h</h3>
                <h3>Humidity: {{$fetchedDate[0]['humidity']}}</h3>
                <h3>Sunrise: {{$fetchedDate[0]['sunrise']}}</h3>
                <h3>Sunrise: {{$fetchedDate[0]['sunset']}}</h3>
            </div>
        </div>
        @endforeach
        @else
        @endif

        <div id='spacefiller'></div>
        <div id='spacefiller'></div>
        <div id='spacefiller'></div>


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
                <span id='social_media_wrapper'>
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
                </span>
            </div>
            <div class='footer_right_items'>
                <span id='social_media_wrapper'>
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
                </span>
            </div>
            <div class='footer_right_items'>
                <span id='social_media_wrapper'>
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
                </span>
            </div>
            <div class='footer_right_items'>
                <span id='social_media_wrapper'>
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
                </span>
            </div>
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
            <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

        <script>
            $(function() {
    $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: '-46Y',
        maxDate: '0',
        changeMonth: true,
        changeYear: true,
        onSelect: function(){
            var selected = $(this).val();
            alert(h);
         }
            });
                });



                function toggleExpandedData() {
                    var x = document.getElementById("expandedData");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                    }
        </script>

            <div class='footer_copyright'>
                <p>copyright project almanac Aya, Mert en Pieterjan: ©2021 - <?= date("Y"); ?></p>
            </div>
        </footer>


        <script src='../resources/js/animations_index.js'></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src='../resources/js/chart_test.js'></script>
    </body>
</html>
