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
Route::get('/', function () { return view('welcome'); });

// Login routes.
Route::auth();

// Search route.
Route::get('search', 'SearchController@search');

// Dashboard routes.
Route::post('home', 'HomeController@enterPerson');
Route::get('home', 'HomeController@index');
Route::get('browse', 'HomeController@browse');

