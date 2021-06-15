<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'home');


Route::get('/', function () {
    return view('index');
});

Route::get('/index', 'WelcomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/statistics', 'StatisticsController@index')->name('statistics');

Route::get('/photohub', 'PhotohubController@index')->name('photohub');

// Middleware zodat deze routes alleen maar worden gebruikt als je bent ingelogd.
// https://laravel.com/docs/8.x/routing#route-group-middleware
Route::middleware(['auth'])->group(function() {
    // Route wanneer je bent ingelogd zodat je naar je account kan gaan.
    Route::get('/account', 'AccountController@index')->name('accounts.index');
    Route::patch('/account/{user}', 'AccountController@update')->name('accounts.update');
    Route::delete('/account/{user}', 'AccountController@destroy')->name('accounts.delete');
});

Auth::routes();
