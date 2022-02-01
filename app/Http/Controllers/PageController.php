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
        $randomDates = [];

        for ($i = 0; $i < 5; $i++) {
            $randomDates[] = strtotime(date("Y-m-d", mt_rand(1, time())));
        }

        return response()->view('index', [
            'userCities' => auth()->check() ? auth()->user()->cities : [],
            'randomDates' => $randomDates,
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
