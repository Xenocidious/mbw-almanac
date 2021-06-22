<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="../../resources/css/animations.css">
        <link rel="stylesheet" href="../../resources/css/app.css">
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
            </div>
        </header>

        <div id='spacefiller'></div>
        <div id='spacefiller'></div>

        <?php

            $upvotes = 0;
            $disable_upvote = false;
            for($i=0; $i<count($votes); $i++){
                if($votes[$i]->image_id == $image[0]->id && $votes[$i]->user_id == Auth::user()->id){
                    $disable_upvote = true;
                }
                if($votes[$i]->image_id == $image[0]->id){
                    $upvotes++;
                }
            }

        ?>


        <div id="image_container_wrapper">
            <div id="image_overlay">
                <h1>{{$image[0]->name}}</h1>
            </div>
            <img src="../../storage/app/public/image/{{$image[0]->file_path}}" alt="image">
            
            <div id="commentsection_top_bar">
                <div id="image_like_section">
                    <div>

                        <?
                        if($disable_upvote == false){
                            ?>      
                            <a href='{{Route("image.upvote", ["id" => $image[0]->id])}}'><i class="fas fa-arrow-circle-up"></i></a>
                        <?php }else{ ?>
                            <a href='{{Route("image.remove_upvote", ["id" => $image[0]->id])}}'><i class="fas fa-arrow-circle-up upvoted"></i></a>
                        <?php } ?>
                    </div>
                    <p>{{$upvotes}}</p>
                </div>
                    <div id="image_comment_section">
                    <i class="far fa-comments"></i>

                    <?php
                    $commentCount = 0;
                        foreach($comments as $comment){
                            if($comment->image_id == $image[0]->id){
                                $commentCount++;
                            }
                        }
                    ?>

                    <p>{{$commentCount}}</p>
                </div>
                <div id="image_favourite_section">
                    <i class="far fa-heart"></i>
                    <!-- <i class="fas fa-heart"></i> -->
                </div>
                <div class="image_OP_section">
                    <i class="fas fa-user"></i>
                    <p>{{$image[0]->user_name}}</p>
                </div>
                <?php
                    if($image[0]->user_id == Auth::user()->id){?>
                        <div class="image_delete_section">
                            <a href="{{ route('post.delete', ['id' => $image[0]->id]) }}" onclick='return confirm("are you sure that you want to delete this post?")'><i class="fas fa-minus-circle comment_delete"></i></a>
                        </div>
                    <?php } ?>
                        
                    @auth @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator')
                        <div class="image_delete_section">
                            <a href="{{ route('post.delete', ['id' => $image[0]->id]) }}" onclick='return confirm("are you sure that you want to delete post `{{$image[0]->name}}` from user `{{$image[0]->user_name}}`?")'><i class="fas fa-minus-circle comment_delete"></i></a>
                        </div>
                    @endif @endif
            </div>
            <div id="comment_section">

                <?php
                    foreach($comments as $comment){
                        if($comment->image_id == $image[0]->id){ ?>       
                <div class="comment user" id='comment{{$comment->id}}'>
                    <div class="commenter_profile">
                        <i class="fas fa-user"></i>
                        <h3>{{$comment->user_name}}</h3>
                    </div>
                    <div class="commenter_comment">
                        <p>{{$comment->comment}}</p>
                        <?php
                            if($comment->user_id == Auth::user()->id){ ?>
                                <a href="{{ route('comment.delete', ['id' => $comment->id]) }}" onclick="return confirm('Are you sure that you want to delete your comment?')"><i class="fas fa-minus-circle comment_delete"></i></a>
                        <?php } ?>
                        @auth @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator')
                            <a href="{{ route('comment.delete', ['id' => $comment->id]) }}" onclick="return confirm('Are you sure that you want to delete your comment?')"><i class="fas fa-minus-circle comment_delete"></i></a>
                        @endif @endif
                    </div>
                    @auth @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator')
                        <a href="{{ route('comment.delete', ['id' => $comment->id]) }}" onclick="return confirm('Are you sure that you want to delete your comment?')"><i class="fas fa-minus-circle comment_delete"></i></a>
                    @endif @endif
                </div><?php
                        }
                    }
                ?>
                <form action="{{ route('comment.store') }}" method="post" enctype="multipart/form-data" id='commenting_form'>
                    <input type="hidden" name='image_id' value='{{$image[0]->id}}'>
                    @csrf
                    <input type="body" name="comment" id='body_comment' required>
                    <button type="submit">Submit</button>
                </form>
            </div>
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
        <script src='../../resources/js/header_blur.js'></script>
    </body>
</html>
