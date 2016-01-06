<?php

namespace App\Http\Controllers\logs\controllers;
use DB;
use App\Http\Controllers\Controller;
class LogsController extends Controller
{

	public static function tulis($data)
	{
  	\DB::table('logs')->insert([
                 'id_karyawan' => Auth::user()->id_karyawan, 
                 'content'     => Auth::user()->username.' melakukan login',
                 'created_at'  => date('Y-m-d H:i:s'),
                 'updated_at'  => date('Y-m-d H:i:s')]
                 );
		
	}
}