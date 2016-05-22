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

// Login routes.
Route::auth();

// Dashboard access.
Route::get('home', 'HomeController@index');

// Search route.
Route::get('search', 'SearchController@search');

// Dashboard person entry.
Route::post('home', 'HomeController@enterPerson');
