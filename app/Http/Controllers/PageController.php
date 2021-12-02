<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //Create array Random Date to store the randomly generated days
        $randomDate = [];
        //For loop, intY creates a random time, array_push pushed the random time into random date in Y-m-d format
        for ($x = 0; $x <= 4; $x++) {
            $intY= mt_rand(1, time());
            array_push($randomDate,date("Y-m-d",$intY));
        }

        //Create an array to put the returned API requests
        $randomDayWeather = [];
        //Loops over the 5 random dates, prints the $randomDate in the response and pushes the response in the returned API request
        foreach ($randomDate as $randomDate) {
            $response = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Gorinchem/'.$randomDate.'?unitGroup=metric&key=WAQ7TNDNXCZQJ74JARJ6W94QZ')['days'];
            array_push($randomDayWeather, $response);
        }

        return response()->view('index', [
            'userCities' => auth()->check() ? auth()->user()->cities : [],
            'randomDates' =>$randomDate, 'randomizedDayWeather' => $randomDayWeather,
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function statistics()
    {
        return response()->view('statistics');
    }

    /**
     * This function loads the blade file for the weather comparison
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function compare(Request $request)
    {
        return response()->view('compare');
    }
}
