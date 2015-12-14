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
Route::get       ('dashboard',			'dashboard\controllers\dashboardController@index');
Route::post      ('catatan',			'dashboard\controllers\dashboardController@store');
Route::post      ('catatan/{id}/edit',  'dashboard\controllers\dashboardController@update');
Route::get       ('profile',			'dashboard\controllers\dashboardController@profile');
Route::post      ('profile/{id}/edit',  'dashboard\controllers\dashboardController@updatePro');