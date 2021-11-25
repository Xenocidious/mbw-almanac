<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\UserImageSeen;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $today = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Kerkenveld%2C%20DR%2C%20NL/today?unitGroup=metric&key=7SXFUD7ARDRC9KTR6ETCRYGFG&include=stats,current')['days'];
            // $view->with('todayData', $today);
            $view->with('USerImageSeen', UserImageSeen::get());
        });
    }
}
