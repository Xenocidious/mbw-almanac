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

    function getDate(Request $request){

        $selectedDate = $request->get('date');

        $resultedDate = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/[selectedDate]?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH')->json();


        return view('history', ['fetchedDate'=> $resultedDate]);
     }
}
