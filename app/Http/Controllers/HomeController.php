<?php

namespace App\Http\Controllers;

use App\City;
use App\UserCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    function index(){


        $yesterday = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/yesterday?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH&include=obs%2Ccurrent%2Chistfcst')['days'];

        $today = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/today?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH&include=stats%2Ccurrent')['days'];

        $forecast = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH&include=fcst%2Cstats%2Ccurrent')['days'];

        $city = City::get();
        $userCity = UserCity::get();
        $favoriteCityWeather = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/.$city->name;.%2C%20DR%2C%20NL?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH&include=fcst%2Cstats%2Ccurrent')['days'];

        if (Auth::check()) {
            foreach ($userCity as $userCity) {
                if($userCity->user_id == Auth::user()->id){
                    foreach ($city as $city) {
                        if ($city->id == $userCity->city_id) {
                         $favoriteCityWeather;
                        }
                    }
                }
            }
        }
            return view('index' , ['yesterdayData'=> $yesterday, 'forecastData'=>$forecast, 'todayData'=>$today, 'cities'=>$city, 'userCities'=>$userCity]);

    }

}
