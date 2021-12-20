<?php

namespace App\Http\Controllers;

use App\UserImageSeen;
use App\Helpers\WeatherApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $apiHelper = new WeatherApiHelper(strtotime('now'), strtotime('now'));

        $randomWeather = [];

        for ($i = 0; $i < 5; $i++) {
            $random = mt_rand(1, time());
            $randomDate = date("Y-m-d", $random);
            $apiHelper->setStartDate(strtotime("$randomDate"));
            $apiHelper->setEndDate(strtotime("$randomDate"));
            $randomWeather[] = $apiHelper->getApiResult();
        }

        return response()->view('index', [
            'userCities' => auth()->check() ? auth()->user()->cities : [],
            'randomWeather' => $randomWeather,
            'UserImageSeen' => UserImageSeen::all()
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
        return response()->view('compare', [
            'first' => $request->get('first-date'),
            'second' => $request->get('second-date')
        ]);
    }
}
