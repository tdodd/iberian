<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Tell Laravel the URIs it should respond to and give it the controller to call when that URI is requested.
|
*/

// Homepage and admin dashboard.
Route::get('/', function () { return view('welcome'); });
Route::get('home', 'HomeController@index');

// About page.
Route::get('about', function () { return view('about'); });


// Localization (language).
Route::post('lang', ['as' => 'lang', 'uses' => 'LanguageController@setLocale']);

// Search page and results.
Route::get('advanced', function() { return view('advanced'); });
Route::get('search', 'SearchController@search');
Route::post('search', ['as' => 'search', 'uses' => 'SearchController@search']);
Route::post('advanced-search', ['as' => 'advanced-search', 'uses' => 'SearchController@advancedSearch']);

// User routes (create, delete) and authentication handling.
Route::auth();
Route::resource('user', 'UserController');

// Person routes.
Route::get('person', ['as' => 'person.index', 'uses' => 'PersonController@index']);
Route::get('person/create', ['as' => 'person.create', 'uses' => 'PersonController@create']);
Route::get('person/{id}', ['as' => 'person.show', 'uses' => 'PersonController@show']);
Route::get('person/{id}/edit', ['as' => 'person.edit', 'uses' => 'PersonController@edit']);
Route::patch('person/{id}', ['as' => 'person.update', 'uses' => 'PersonController@update']);
Route::delete('person/{id}', ['as' => 'person.destroy', 'uses' => 'PersonController@destroy']);

// Delete a Relation.
Route::delete('relation-destroy', ['as' => 'relation.destroy', 'uses' => 'PersonController@destroyRelation']);
Route::delete('source-destroy', ['as' => 'source.destroy', 'uses' => 'PersonController@destroySource']);

// All POST requests for route '/person'.
Route::post('store', ['as' => 'person.store', 'uses' => 'PostController@store']);
Route::post('refine', ['as' => 'person.refine', 'uses' => 'PostController@refine']);
Route::post('async-search', ['as' => 'async-search', 'uses' => 'PostController@search']);

Route::post('relations', ['as' => 'person.relations', 'uses' => 'PostController@relations']);
Route::post('relations-edit', ['as' => 'person.relations.edit', 'uses' => 'PostController@editRelation']);

Route::post('sources', ['as' => 'person.add-source', 'uses' => 'PostController@addSource']);
Route::post('source-edit', ['as' => 'person.sources.edit', 'uses' => 'PostController@editSource']);