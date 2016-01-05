<?php

namespace App\Http\Controllers\karyawan\models;

use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
	protected $table 			= 'karyawan';
	protected $primaryKey 		= "id_karyawan";

	public static function nama_karyawan($id)
	{
		$data = self::where('id_karyawan','=',$id)
				->first();
		if($data == null):
			return "-";
		else:
			return $data->nama_karyawan;
		endif;
	}

}