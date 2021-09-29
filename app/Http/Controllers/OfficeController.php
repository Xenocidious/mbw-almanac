<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Image;
use App\Vote;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Http;

class OfficeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = Image::get();
        $votes = Vote::get();
        $comments = Comment::get();
        $users = User::get();

        return view('office', [
            'images' => $images,
            'votes' => $votes,
            'users' => $users
        ]);
    }

    public function promote(Request $request){

        $username = $request->get('username');
        $newRole = $request->get('role'); 

        User::where('name', $username)->update(['role' => $newRole]);

        $yesterday = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/yesterday?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH&include=obs%2Ccurrent%2Chistfcst')['days'];

        $today = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/today?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH&include=stats%2Ccurrent')['days'];

        $forecast = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL?unitGroup=metric&key=GQXN9FLLR9DNHAPNTW49E6BGH&include=fcst%2Cstats%2Ccurrent')['days'];

        return view('index' , ['yesterdayData'=> $yesterday, 'forecastData'=>$forecast, 'todayData'=>$today]);

    }
}
