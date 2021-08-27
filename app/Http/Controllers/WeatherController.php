<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public const BASE_URL = 'https://weather.visualcrossing.com/';
    public const BASE_PATH = 'VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL';
    public const API_KEY = '7SXFUD7ARDRC9KTR6ETCRYGFG';

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function forecast(Request $request)
    {
        $url = $this->buildUrl('forecast', \Carbon\Carbon::createFromFormat('Y-m-d', '2021-08-27'), \Carbon\Carbon::createFromFormat('Y-m-d', '2021-09-26'));

        $weather = Http::get($url)->json();
        $weather = current($weather['locations']);

        $maxDays = $request->get('days', 7);

        if ($maxDays < 1) {
            $maxDays = 1;
        }

        if ($maxDays > count($weather['values'])) {
            $maxDays = count($weather['values']);
        }

        dd($weather['values']);

        return view('weather.forecast')
            ->with('forecast', $weather)
            ->with('days', $maxDays);
    }


    public function history(Request $request)
    {
        $url = $this->buildUrl('history', \Carbon\Carbon::createFromFormat('Y-m-d', '2021-07-27'), \Carbon\Carbon::createFromFormat('Y-m-d', '2021-08-26'));

        $weather = Http::get($url)->json();
        $weather = current($weather['locations']);

        $maxDays = $request->get('days', 7);

        if ($maxDays < 1) {
            $maxDays = 1;
        }

        if ($maxDays > count($weather['values'])) {
            $maxDays = count($weather['values']);
        }

        dd($weather['values']);

        return view('weather.forecast')
            ->with('forecast', $weather)
            ->with('days', $maxDays)
            ->with('title', __('History'));
    }

    /**
     * // https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/weatherdata/history?aggregateHours=24&startDateTime=2019-06-13T00:00:00&endDateTime=2019-06-20T00:00:00&unitGroup=uk&contentType=csv&dayStartTime=0:0:00&dayEndTime=0:0:00&location=Sterling,VA,US&key=YOURAPIKEY
     * @todo make more accurate location
     * @todo start en end date variable maken
     */
    protected function buildUrl($action, $start, $end, $aggregateHours = 24, $location = 'Gorinchem, SH, NL', $contentType = 'json', $unitGroup = 'metric', $include = 'obs,stats,current')
    {
        $base = 'https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/weatherdata/';

        $params = [
            'aggregateHours' => $aggregateHours,
            'location' => $location,
            'contentType' => $contentType,
            'startDateTime' => $start->format("Y-m-d\TH:i:s"),
            'endDateTime' => $end->format("Y-m-d\TH:i:s"),
            'unitGroup' => $unitGroup,
            'include' => $include,
            'key' => self::API_KEY,
        ];

        return $base . $action . '?' . http_build_query($params);
    }
}
