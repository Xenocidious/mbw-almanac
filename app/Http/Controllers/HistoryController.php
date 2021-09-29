<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class historyController extends Controller
{
    function index(){

        return view('history');

    }

    /*
    function getDate(Request $selected){

        dd($selected);
     }
     */

     /**
      * Request date from form 'date' and put it in $selectedDate
      * Request weekday with Carbon and put it in $day
      * Make API request with parameter $selectedDate as date and put response in $resultedDate
      * Send the $resulted Date and $day to view as variable fetchedDate and weekDay
      */
    function getDate(Request $request){

        $selectedDate = $request->get('date');
        $day = Carbon::parse($selectedDate)->format('l');

        //https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/2021-6-21?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH
        $resultedDate = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/'.$selectedDate.'?unitGroup=metric&key=7SXFUD7ARDRC9KTR6ETCRYGFG')['days'];

        return view('history', ['fetchedDate'=> $resultedDate], ['weekDay'=> $day]);
     }
}
