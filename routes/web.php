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

// je mag door deze middleware
// niet meer dan 15 keer per minuut een pagina laden
// want anders kan je de api spammen
// en dat is niet goed :D
Route::group(['middleware' => 'throttle:15,1'], function () {
    Route::get('/', 'PageController@home')->name('home');
    Route::get('/statistics', 'PageController@statistics')->name('statistics');
    Route::get('/compare', 'PageController@compare')->name('compare');

    // in deze controller word alleen de resource gebruikt voor store,
    // heeft het dan nut om dit als resource te doen, of is het beter om dit als een losse route op te schrijven?
    // als je deze acties alleen kan doen als je ingelogd bent, is het beter
    // om deze onderaan in de guard routes te zetten.
    Route::resource('images', 'ImageController');

    Route::get('/weather', 'WeatherController@weather')->name('weather');
    Route::post('/weather/result', 'Weathercontroller@weatherJson')->name('weather.json');
});

// Middleware zodat deze routes alleen maar worden gebruikt als je bent ingelogd.
// https://laravel.com/docs/8.x/routing#route-group-middleware
Route::middleware(['auth'])->group(function () {
    // Route wanneer je bent ingelogd zodat je naar je account kan gaan.
    Route::get('/account', 'AccountController@index')->name('accounts.index');
    Route::get('/accountHighlighted', 'AccountController@indexHighlighted')->name('accounts.indexHighlighted');
    Route::patch('/account/{user}', 'AccountController@update')->name('accounts.update');
    Route::delete('/account/{user}', 'AccountController@destroy')->name('accounts.delete');
    Route::get('logout', '\App\Http\Controllers\AccountController@logout');


    Route::get('/photohub', 'PhotohubController@index')->name('photohub');
    Route::get('/uploadphoto', 'PhotohubController@photoform')->name('uploadphoto');

    Route::post('upload.image', 'imageController@store')->name('upload.image');

    Route::get('/removeFavoriteCity/{id}', 'accountController@deleteFavoriteCity')->name('favoriteCity.delete');

    // hier word ook maar 1 gebruikt, en kan je deze wel doen als je niet bent ingelogd?
    // beter is dit dan geen resource
    Route::resource('comment', 'CommentController');

    Route::get('/office', 'OfficeController@index')->name('office');
    Route::post('user/promote', 'OfficeController@promote')->name('user.promote');


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
});

Auth::routes();
