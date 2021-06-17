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

Route::get('/uploadphoto', 'PhotohubController@photoform')->name('uploadphoto');

Route::resource('images', 'ImageController');

Route::resource('comment', 'CommentController');

Route::get('/office', 'OfficeController@index')->name('office');

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








// Middleware zodat deze routes alleen maar worden gebruikt als je bent ingelogd.
// https://laravel.com/docs/8.x/routing#route-group-middleware
Route::middleware(['auth'])->group(function() {
    // Route wanneer je bent ingelogd zodat je naar je account kan gaan.
    Route::get('/account', 'AccountController@index')->name('accounts.index');
    Route::patch('/account/{user}', 'AccountController@update')->name('accounts.update');
    Route::delete('/account/{user}', 'AccountController@destroy')->name('accounts.delete');
});

Auth::routes();
