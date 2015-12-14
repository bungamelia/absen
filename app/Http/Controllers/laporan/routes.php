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
Route::get       ('laporan', 'laporan\controllers\laporanController@index');
Route::post      ('laporan', 'laporan\controllers\laporanController@store');
Route::post      ('laporan/{id}/edit',  'laporan\controllers\laporanController@update');
