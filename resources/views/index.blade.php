<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
        <link rel="stylesheet" href="../resources/css/animations.css">
        <link rel="stylesheet" href="../resources/css/app.css">
        <script src="https://kit.fontawesome.com/269ab4fa37.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>title</title>
    </head>
    <body>
        <header id='header' class='header_top header'>
            <div id='header_content'>
                <a href='/'>about us</a>
                <a href='/'>weather</a>
                <a href='/'>history</a>
                <a href='/'>photo's</a>
                <a href='/'>contact</a>
                <a href='/'>account</a>
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
        <div id='index_content_2'>
            <h1>Check our historical weather data</h1>
            <div>
                <p>Hey there! Ever wondered what the weather looked like 6 moths ago in your city? Or maybe a year, a decade?! This is your chance! Our very precise weather API has the historical data of 30+ years. What are you waiting for?</p>
            </div>
            <a id='historical_data_button' href="#">
                <span>enter now</span>
                <div class="liquid"></div>
            </a>
        </div>






        <div id='index_about_us_wrapper'>

            <div id='img_1' class='images'></div>
            <div id='content_1' class='text'>
                <h1>About us</h1>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>

            <div id='content_2' class='text'>
                <h1>What do we do</h1>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>
            <div id='img_2' class='images'></div>

            <div id='img_3' class='images'></div>
            <div id='content_3' class='text'>
                <h1>What we can provide for your company</h1>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>

            <div id='content_4' class='text'>
                <h1>Our team</h1>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>
            <div id='img_4' class='images'></div>

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

        <script src='../resources/js/animations_index.js'></script>
    </body>
</html>
