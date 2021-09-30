@extends("layouts.app")

@section('content')
    <div id='index_content_1'>
        <h1>{{$todayData[0]['tempmax']}}°C</h1>
        <h1><i class="fas fa-sun"></i></h1>

        <div id='index_cards_wrapper'>


            @foreach ($yesterdayData as $item)
                <div id='index_cards_wrapper_card_1' class='index_cards'>
                    <div>
                        <h2>Yesterday</h2>
                        <h3>{{$yesterdayData[0]['tempmax']}}°</h3>
                        <h4>{{$yesterdayData[0]['conditions']}}</h4>
                        <i class="fas fa-sun"></i>
                    </div>
                </div>
            @endforeach


            <div id='index_cards_wrapper_card_2' class='index_cards'>
                <div>
                    <h2>Today</h2>
                    <h3>{{$todayData[0]['tempmax']}}°</h3>
                    <h4>{{$todayData[0]['conditions']}}</h4>
                    <i class="fas fa-sun"></i>
                </div>
            </div>
            <div id='index_cards_wrapper_card_3' class='index_cards'>
                <div>
                    <h2>Tomorrow</h2>
                    <h3>{{$forecastData[1]['tempmax']}}°</h3>
                    <h4>{{$forecastData[1]['conditions']}}</h4>
                    <i class="fas fa-sun"></i>
                </div>
            </div>
        </div>
    </div>



    <?php

    $check = false;

if (Auth::check()) {
    foreach ($userCities as $userCity) {
        if($userCity->user_id == Auth::user()->id){
            foreach ($cities as $city) {
                if ($city->id == $userCity->city_id) {
                    echo $city->name;
                    echo '<br>';
                }
            }
        }
    }
}

    // foreach ($cities as $city) {
    //     foreach ($userCities as $userCity) {
    //         if($userCity->user_id == Auth::user()->id && $city->id == $userCity->city_id){
    //             echo $city->name . '<br>';

    //         }
    //     }
    // array_push($chosenCities, $city);
    // }

    ?>


    <h1 id='chart_index'>Check our data</h1>
    <a href='statistics'>
        <div id="curve_chart" style="width: 900px; height: 500px"></div>
    </a>

    <div id='index_content_2'>
        <h1>Check our historical weather data</h1>
        <div>
            <p>Hey there! Ever wondered what the weather looked like 6 moths ago in your city? Or maybe a year, a
                decade?! This is your chance! Our very precise weather API has the historical data of 30+ years. What
                are you waiting for?</p>
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
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum."</p>
        </div>

        <div id='content_2' class='text'>
            <h1>What do we do</h1>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum."</p>
        </div>
        <div id='img_2' class='images'></div>

        <div id='img_3' class='images'></div>
        <div id='content_3' class='text'>
            <h1>What we can provide for your company</h1>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum."</p>
        </div>

        <div id='content_4' class='text'>
            <h1>Our team</h1>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum."</p>
        </div>
        <div id='img_4' class='images'></div>

    </div>
@endsection

@section('body-scripts')

    @parent()

    <script src="{{ asset('js/animations_index.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ asset('js/chart_test.js') }}"></script>


@endsection
