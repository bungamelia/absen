<?php

namespace App\Http\Controllers\logs\models;

use Illuminate\Database\Eloquent\Model;

class LogsModel extends Model
{
    //
	protected $table      = 'logs';
	protected $primaryKey = "id";

	public static function tulis($data)
	{
		self::insert([
                       'id_karyawan' => $data['id_karyawan'], 
                       'content'     => $data['content'],
                       'created_at'  => date('Y-m-d H:i:s'),
                       'updated_at'  => date('Y-m-d H:i:s')]
                       );
	}
	
}
