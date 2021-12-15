<?php

namespace App\Helpers;

use DateTime;
use Illuminate\Support\Facades\Http;

class WeatherApiHelper
{
    public const BASE_URL = 'https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline';
    public const API_KEY = 'WAQ7TNDNXCZQJ74JARJ6W94QZ';
    // public const API_KEY = '7SXFUD7ARDRC9KTR6ETCRYGFG';
    public const MAX_RANGE = 14;

    protected static $params = [
        'key' => self::API_KEY,
        'unitGroup' => 'metric', // us (united states, imperial), metric, uk (united kingdom, semi imperial), base (scientific notation)
        'lang' => 'en', // language
        // 'include' => '', // obs, fcst, stats, days, hours, alerts, current, events, histfcst
        // 'elements' => '', // bijv: tempmax,tempmin,temp (optioneel) welke waardes je krijgt in days
        // 'options' => '', // nonulls = lege waardes weglaten.
        'contentType' => 'json', // csv of json
        'iconSet' => 'icons1'
    ];

    protected static $startDate;
    protected static $endDate;
    protected static $city = 'Gorinchem Netherlands';

    /**
     * WeatherApiHelper constructor.
     * @param string $startDate
     * @param string $endDate
     * @param string $city
     * @param array $params
     */
    public function __construct(
        string $startDate,
        string $endDate,
        string $city = null,
        array $params = []
    )
    {
        self::$startDate = $startDate;
        self::$endDate = $endDate;

        if ($city) {
            self::$city = $city;
        }

        self::$params = array_merge(self::$params, $params);
    }

    /**
     * @param string $startDate
     * @return $this
     */
    public function setStartDate(string $startDate)
    {
        self::$startDate = $startDate;
        return $this;
    }

    /**
     * @param string $endDate
     * @return $this
     */
    public function setEndDate(string $endDate)
    {
        self::$endDate = $endDate;
        return $this;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity(string $city)
    {
        self::$city = $city;
        return $this;
    }

    /**
     * @param array $params
     * @return $this
     */
    public function setParams(array $params)
    {
        self::$params = $params;
        return $this;
    }

    public function getApiResult()
    {
        $url = implode('/', [self::BASE_URL, self::$city, self::$startDate, self::$endDate])
            . '?'
            . http_build_query(self::$params);

        $response = Http::get($url);

        // als er een error is dan lezen we de error uit
        // anders lezen we de json uit.
        if ($response->status() !== 200) {
            $data = $response->body();
        } else {
            $data = $response->json();
        }

        return $data;
    }
}
