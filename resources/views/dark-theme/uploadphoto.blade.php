<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{asset('css/animations.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="https://kit.fontawesome.com/269ab4fa37.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">

        <script src="https://kit.fontawesome.com/269ab4fa37.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <title>awesome photo - almanac</title>
    </head>
    <body>
        <img id="output_img1"/>
    
 
        <header id='header' class='header_top header'>
            <div id='header_content'>
                <a class='header_button' href='{{Route("home")}}'>home</a>
                <a class='header_button' href='/'>about us</a>
                <a class='header_button' href='{{Route("statistics")}}'>weather</a>
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

        <div id='upload_image_form_wrapper' class='upload_image_form_wrapper'>
            @if (Route::has('login'))
                @auth
                <form class='upload_photo_form' method="POST" action="{{url('upload.image') }}" enctype="multipart/form-data">
                    @csrf
                    <img id="output_img2"/>
                    <div class="form_row">
                        <i class="far fa-user"></i>
                        <input disabled value='{{Auth::user()->name}}'>
                    </div>
                    <div class="form_row">
                        <i class="fas fa-camera"></i>
                        <input type="file" name="file" required accept="image/*" onchange="loadFile(event)" style="display: none;" id="selectedFile">
                        <input id='file' type="button" value="Browse" onclick="document.getElementById('selectedFile').click();" />
                    </div>
                    <div class="form_row">
                        <i class="fas fa-heading"></i>
                        <input id='title' type="text" name="name" required  value="A beautiful sky does wonders" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
                    </div>
                    <div class="form_row center no_border">
                        <button type="submit" id='upload_image_form_submit'>Submit</button>
                    </div>
                    @else
                        <p>Please <a>login</a> to upload a post.</p>
                        <p>Not an account yet? <a>register</a> here<, its free!/p>
                    @endauth
                @endif
            </form>
        </div>

        <script>
        var loadFile = function(event) {
            output_img1.src = URL.createObjectURL(event.target.files[0]);
            output_img2.src = URL.createObjectURL(event.target.files[0]);
        };
        </script>

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

            <div class='footer_copyright'>
                <p>copyright project almanac Aya, Mert en Pieterjan: ©2021 - <?= date("Y"); ?></p>
            </div>
        </footer>
        
        <script src="{{ URL::asset('js/header_blur.js') }}"></script>
    
        @if (Auth::user()->darkmode == 0)
            <script src="{{ URL::asset('js/transformLightmode.js') }}"></script>
        @else
        @endif
    </body>
</html>
