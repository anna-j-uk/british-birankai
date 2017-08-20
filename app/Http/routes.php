<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/about-aikido', 'AboutAikidoController@index');
Route::get('/calendar', 'CalendarController@index');

Route::group([ 'prefix' => 'dojos'], function () {
    Route::get('/', 'DojoController@index');
    Route::put('/', 'DojoController@update');
    Route::post('/', 'DojoController@create');
    Route::get('/{dojo}', 'DojoController@show');
    Route::get('/edit/{dojo}', 'DojoController@edit');
});
