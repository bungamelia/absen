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

Route::group(
		array(
			'prefix' => 'admin'
			), 
		function()
		    {		    	
		    	Route::get(
		    		'/',
		    		'admin\controllers\AdminController@index'
		    		);			    	
		    	Route::get(
		    		'dashboard',
		    		'admin\controllers\AdminController@index'
		    		);		    	
		    	Route::get(
		    		'karyawan',
		    		'admin\controllers\KaryawanController@index'
		    		);		    	
		    	Route::get(
		    		'absen',
		    		'admin\controllers\AbsenController@index'
		    		);		    	
		    	Route::get(
		    		'pengumuman',
		    		'admin\controllers\PengumumanController@index'
		    		);			    	
		    	Route::get(
		    		'shift',
		    		'admin\controllers\ShiftController@index'
		    		);		    	
		    	Route::get(
		    		'shift/generator',
		    		'admin\controllers\ShiftController@generator'
		    		);		    	
		    	Route::post(
		    		'shift/generator',
		    		'admin\controllers\ShiftController@postgenerator'
		    		);
		    }
    );