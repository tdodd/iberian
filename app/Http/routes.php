<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Tell Laravel the URIs it should respond to and give it the controller to call when that URI is requested.
|
*/

// Homepage.
Route::get('/', function () {
    return view('welcome');
});

// Admin routes.
Route::auth();
Route::get('home', 'HomeController@index');
Route::get('search', 'SearchController@search');
