<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get ('/',                    'QrController@getIndex');
Route::get ('key/{key}',            'QrController@getKey');
Route::post('check_key',            'QrController@postCheckKey');
Route::get ('create_user/{key}',    'QrController@getCreateUser');
Route::post('save_user',            'QrController@postSaveUser');
Route::get ('logged_in/{key}',      'QrController@getLoggedIn');
