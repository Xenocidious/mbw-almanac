<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Helpers\WeatherApiHelper;

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
    function index()
    {
        $yesterday = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/yesterday?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH&include=obs%2Ccurrent%2Chistfcst')['days'];
        $today = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/today?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH&include=stats%2Ccurrent')['days'];
        $forecast = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH&include=fcst%2Cstats%2Ccurrent')['days'];


        // Maak nieuwe instance van de api helper object zodat we makkelijk meer resultaten kunnen opvragen.
        // @todo kijken of de api meerdere cities in 1 call kan doen
        $apiHelper = new WeatherApiHelper(strtotime('now'), strtotime('now'));
        $citiesWeather = [];

        // Kijk of de user favoriete cities heeft.
        $userCities = Auth::check() ? Auth::user()->cities : [];

        // voor alle favoriete cities van de user
        foreach ($userCities as $userCity) {
            // update de city property in de api helper zodat we de juiste city naam gebruiken
            $apiHelper->setCity($userCity->name);
            // Roep de api call aan met de juiste gegevens.
            $citiesWeather[] = $apiHelper->getApiResult();
        }

        return view('index', [
            'yesterdayData' => $yesterday,
            'forecastData' => $forecast,
            'todayData' => $today,
            'cities' => City::all(),
            'userCities' => $citiesWeather,
            'countSeenImages' => Auth::check() ? Auth::user()->images->count() : 0,
        ]);
    }
}
