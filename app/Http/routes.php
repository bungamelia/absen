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

Route::resource  ('login',      		 'login\controllers\loginController@index');
Route::post      ('login',      		 'login\controllers\loginController@doLogin');
Route::post      ('login',      		 'login\controllers\loginController@doLogin');
Route::get       ('logout',     		 'login\controllers\loginController@doLogout');
Route::get       ('register',   		 'login\controllers\loginController@register');
Route::post      ('register',   		 'login\controllers\loginController@store');
Route::get       ('pengaturan',          'login\controllers\loginController@pengaturan');
Route::post      ('pengaturan/{id}/edit','login\controllers\loginController@gantiPass');

Route::get       ('dashboard',			'dashboard\controllers\dashboardController@index');
Route::post      ('catatan',			'dashboard\controllers\dashboardController@store');
Route::post      ('catatan/{id}/edit',  'dashboard\controllers\dashboardController@update');
Route::get       ('profile',			'dashboard\controllers\dashboardController@profile');
Route::post      ('profile/{id}/edit',  'dashboard\controllers\dashboardController@updatePro');

Route::get       ('absen',  'absen\controllers\absenController@index');
Route::post      ('upload', 'absen\controllers\absenController@upload');
Route::post      ('keluar', 'absen\controllers\absenController@store');

Route::get       ('laporan', 'laporan\controllers\laporanController@index');
Route::post      ('laporan', 'laporan\controllers\laporanController@store');
Route::post      ('laporan/{id}/edit',  'laporan\controllers\laporanController@update');

Route::get       ('pengumuman', 'pengumuman\controllers\pengumumanController@index');

Route::get       ('shift', 'shift\controllers\shiftController@index');

Route::post      ('request', 'request\controllers\requestController@store');