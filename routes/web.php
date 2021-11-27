<?php

use App\City;
use App\UserCity;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
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


/**
 * De api word gefetched met data van 'yesterday' en doorgestuurd naar de index
 */
Route::get('/', 'HomeController@index')->name('home');

Route::get('/statistics', 'StatisticsController@index')->name('statistics');

Route::get('/uploadphoto', 'PhotohubController@photoform')->name('uploadphoto');

Route::resource('images', 'ImageController');

Route::resource('comment', 'CommentController');

Route::post('user/promote', 'OfficeController@promote')->name('user.promote');

Route::get('/office', 'OfficeController@index')->name('office');


Route::post('upload.image', 'imageController@store')->name('upload.image');

Route::get('/removeFavoriteCity/{id}', 'accountController@deleteFavoriteCity')->name('favoriteCity.delete');

Route::get('/upvote/{id}', [
    'uses' => 'Imagecontroller@upvote',
    'as' => 'image.upvote'
]);

Route::get('/removeUpvote/{id}', [
    'uses' => 'Imagecontroller@removeUpvote',
    'as' => 'image.remove_upvote'
]);

Route::get('/openImage/{id}', [
    'uses' => 'Imagecontroller@openImage',
    'as' => 'open.image'
]);

Route::get('/deleteComment/{id}', [
    'uses' => 'CommentController@delete',
    'as' => 'comment.delete'
]);

Route::get('/deletePost/{id}', [
    'uses' => 'ImageController@delete',
    'as' => 'post.delete'
]);

/** Favorite images routes */
Route::resource('favorite-images', '\\App\\Http\\Controllers\\FavoriteImageController')->only(['index', 'store', 'destroy']);
/**
 * index -> GET (Lijst ophalen) Route::get('entities', 'EntityController::index')->name('entities.index');
 * show -> GET {entity} (Eentje ophalen) Route::get('entities/{entity}', 'EntityController::show')->name('entities.show');
 * create  -> GET (Met leeg formulier) Route::get('entities', 'EntityController::create')->name('entities.create');
 * store -> POST (Om nieuwe te maken) Route::post('entities', 'EntityController::store')->name('entities.store');
 * edit -> GET (Met formulier van bestaande) Route::get('entities/{entity}', 'EntityController::edit')->name('entities.edit');
 * update -> PATCH/PUT (Bestaande bijwerken in de database) Route::patch('entities/{entity}', 'EntityController::update')->name('entities.update');
 * destroy -> DELETE (verwijderen) Route::delete('entities/{entity}', 'EntityController::destroy')->name('entities.destroy');
 */

Route::get('/weather', 'WeatherController@weather')->name('weather');
Route::post('/weather/result', 'Weathercontroller@weatherJson')->name('weather.json');

// Middleware zodat deze routes alleen maar worden gebruikt als je bent ingelogd.
// https://laravel.com/docs/8.x/routing#route-group-middleware
Route::middleware(['auth'])->group(function () {
    // Route wanneer je bent ingelogd zodat je naar je account kan gaan.
    Route::get('/account', 'AccountController@index')->name('accounts.index');
    Route::get('/accountHighlighted', 'AccountController@indexHighlighted')->name('accounts.indexHighlighted');
    Route::patch('/account/{user}', 'AccountController@update')->name('accounts.update');
    Route::delete('/account/{user}', 'AccountController@destroy')->name('accounts.delete');

    Route::get('/photohub', 'PhotohubController@index')->name('photohub');
});

Auth::routes();
