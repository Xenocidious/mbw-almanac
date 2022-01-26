<?php

namespace App\Providers;

use App\Helpers\WeatherApiHelper;
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

    // Get theme from the user
    public function GetTheme() {
        if (auth()->check()) {
            $theme = Auth()->user()->theme;
            return $theme;
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with(['userImageSeen' => UserImageSeen::get(), 'theme' => AppServiceProvider::GetTheme()]);
        });
        
    }
}
