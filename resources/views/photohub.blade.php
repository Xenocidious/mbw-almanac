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
                <a class='header_button' href='{{route("home")}}'>home</a>
                <a class='header_button' href='/'>about us</a>
                <a class='header_button' href='statistics'>weather</a>
                <a class='header_button' href='/'>history</a>
                <a class='header_button' href='photohub'>photo's</a>

                <div class="dropdown header_button">
                    <a>account</a>
                    <div class="dropdown-content w3-bar-block w3-card-4 w3-animate-opacity">
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
                <a href='uploadphoto'><i id='add_image_photohub' class="fas fa-image"></i></a>
            </div>
        </header>

        <div id='spacefiller'></div>





        <div id="main_content_photohub">
            <? foreach($images as $image){
            ?>
            <div class='photohub_content_wrapper'>
                <div class="photohub_content" id='photohub_content1'>
                    <a href='{{Route("open.image", ["id" => $image->id])}}'>
                        <img alt='image' src="../storage/app/public/image/{{$image->file_path}}">
                    </a>
                </div>
                <div class='photohub_stats'>
                    <div class="description">
                        <h1>{{$image->name}}</h1>
                        <hr style="width:100%;text-align:left;margin-left:0">
                    </div>
                    <div class="upvote_amount">

                        <?

                        $upvotes = 0;
                        $disable_upvote = false;
                        for($i=0; $i<count($votes); $i++){
                            if($votes[$i]->image_id == $image->id && $votes[$i]->user_id == Auth::user()->id){
                                $disable_upvote = true;
                            }
                            if($votes[$i]->image_id == $image->id){
                                $upvotes++;
                            }
                        }

                        if($disable_upvote == false){
                            ?>      
                            <a href='{{Route("image.upvote", ["id" => $image->id])}}'><i class="fas fa-arrow-circle-up"></i></a>
                        <? }else{ ?>
                            <a href='{{Route("image.remove_upvote", ["id" => $image->id])}}'><i class="fas fa-arrow-circle-up upvoted"></i></a>
                        <? } ?>
                        <p>{{$upvotes}}</p>
                    </div>
                    <div class="comment_amount">
                        <i class="far fa-comments"></i>
                        <?php
                            $commentCount = 0;
                            foreach($comments as $comment){
                                if($comment->image_id == $image->id){
                                    $commentCount++;
                                }
                            }
                        ?>
                        <p>{{$commentCount}}</p>
                    </div>
                    <div class="favourite">
                        <i class="far fa-heart"></i>
                        <!-- <i class="fas fa-heart"></i> -->
                    </div>
                    <div class="user">
                        <i class="fas fa-user"></i>
                        <p>{{$image->user_name}}</p>
                    </div>
                </div>
            </div>
            <? } ?>
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
    </body>
</html>
