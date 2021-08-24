<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public const BASE_URL = 'https://weather.visualcrossing.com/';
    public const BASE_PATH = 'VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL';

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @todo vul de forecast data met data uit de API.
     */
    public function forecast(Request $request)
    {
        $weather = Http::get(self::BASE_URL . self::BASE_PATH . '?unitGroup=metric&key=7SXFUD7ARDRC9KTR6ETCRYGFG&include=fcst%2Cstats%2Ccurrent')->json();
        $maxDays = $request->get('days', 7);

        if ($maxDays < 1) {
            $maxDays = 1;
        }

        if ($maxDays > count($weather['days'])) {
            $maxDays = count($weather['days']);
        }

        return view('weather.forecast')
            ->with('forecast', $weather)
            ->with('days', $maxDays);
    }


    public function history()
    {
        $history = Http::get(self::BASE_URL . self::BASE_PATH . '/yesterday?unitGroup=metric&key=7SXFUD7ARDRC9KTR6ETCRYGFG&include=obs%2Ccurrent%2Chistfcst');
    }
}
