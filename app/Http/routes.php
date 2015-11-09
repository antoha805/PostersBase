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

Route::get('/', ['as' => 'showAll', 'uses' => 'PosterController@showAll']);
Route::get('poster{id}', ['as' => 'poster', 'uses' => 'PosterController@getPoster']);
Route::get('add', ['as' => 'add', 'uses' => 'PosterController@getAdd']);
Route::post('add', 'PosterController@postAdd');
Route::post('sort{direction}', ['as' => 'sort', 'uses' => 'PosterController@sortPosters'])->where('direction', 'asc|desc');

