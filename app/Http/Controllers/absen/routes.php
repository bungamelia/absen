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

Route::get       ('absen',  'absen\controllers\absenController@index');
Route::post      ('upload', 'absen\controllers\absenController@upload');
Route::post      ('keluar', 'absen\controllers\absenController@store');
