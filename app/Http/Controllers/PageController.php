<?php

namespace App\Http\Controllers;

use App\Helpers\WeatherApiHelper;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return response()->view('index', [
            'userCities' => auth()->check() ? auth()->user()->cities : [],
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
