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
Route::get  	 ('/',      		 	 'login\controllers\loginController@index');
Route::resource  ('login',      		 'login\controllers\loginController@index');
Route::post      ('login',      		 'login\controllers\loginController@doLogin');
Route::post      ('login',      		 'login\controllers\loginController@doLogin');
Route::get       ('logout',     		 'login\controllers\loginController@doLogout');
Route::get       ('register',   		 'login\controllers\loginController@register');
Route::post      ('register',   		 'login\controllers\loginController@store');
Route::get       ('pengaturan',          'login\controllers\loginController@pengaturan');
Route::post      ('pengaturan/{id}/edit','login\controllers\loginController@gantiPass');