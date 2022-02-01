<?php

namespace App\Http\Controllers;

use App\Helpers\WeatherApiHelper;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\UserImageSeen;

class WeatherController extends Controller
{
    public const BASE_URL = 'https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline';
    public const API_KEY = 'WAQ7TNDNXCZQJ74JARJ6W94QZ';
//    public const API_KEY = 'GQXN9FLLR9DNHAPNTW49E6BGH';
//     public const API_KEY = '7GMWKWQNTVQL4F6RUBKLAAGMA';
//     public const API_KEY = '7SXFUD7ARDRC9KTR6ETCRYGFG';
    public const MAX_RANGE = 14;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function weather(Request $request)
    {
        // Variablen voor defineren.
        $error = '';
        $data = [];
        $params = [
            'key' => self::API_KEY,
            'unitGroup' => 'metric', // us (united states, imperial), metric, uk (united kingdom, semi imperial), base (scientific notation)
            'lang' => 'en', // language
            // 'include' => '', // obs, fcst, stats, days, hours, alerts, current, events, histfcst
            // 'elements' => '', // bijv: tempmax,tempmin,temp (optioneel) welke waardes je krijgt in days
            // 'options' => '', // nonulls = lege waardes weglaten.
            'contentType' => 'json', // csv of json
            'iconSet' => 'icons1'
        ];

        // Datums defineren, als geen datums zijn, pak alleen vandaag.
        // gebruik van timestamp omdat het makkelijk is met formatten vanwege de input die seconden
        // weg kan laten als niet is ingevuld.
        $startDate = strtotime($request->get('start', 'now'));
        $endDate = strtotime($request->get('end', 'now'));

        $diffInDays = round(($endDate - $startDate) / (60 * 60 * 24));
        // Mag niet meer dan 14 dagen
        if ($diffInDays > self::MAX_RANGE) {
            $error = __('Cannot pick a date range larger than %i days', self::MAX_RANGE);
            // mag niet de verkeerde volgorde doen.
        } else if ($startDate > $endDate) {
            $error = __('Start date can not be after end date');
        } else {
            // haal de gegevens op vanuit de api
            $url = implode('/', [self::BASE_URL, 'Gorinchem Netherlands', $startDate, $endDate]) . '?' . http_build_query($params);
            $response = Http::get($url);

            // als er een error is dan lezen we de error uit
            // anders lezen we de json uit.
            if ($response->status() !== 200) {
                $error = $response->body();
            } else {
                $data = $response->json();
            }
        }

        // stuur alle gegevens naar de view file.
        return view('weather.forecast', [
            'forecast' => $data,
            'error' => $error,
            'start' => Carbon::createFromTimestamp($startDate)->format('Y-m-d\TH:i:s'),
            'end' => Carbon::createFromTimestamp($endDate)->format('Y-m-d\TH:i:s'),
            'UserImageSeen' => UserImageSeen::get(),
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function weatherJson(Request $request): JsonResponse
    {
        return response()->json((new WeatherApiHelper(
            $request->get('startDate') ?? strtotime('now'),
            $request->get('endDate') ?? strtotime('now'),
            $request->get('city') ?? 'Gorinchem Netherlands',
            []
        ))->getApiResult());
    }
}
