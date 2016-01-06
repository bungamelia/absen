<?php

namespace App\Http\Controllers\karyawan\models;

use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
	protected $table 			= 'karyawan';
	protected $primaryKey 		= "id_karyawan";
	public static $tblDvs	 	= 'divisi';
	public static $tblJbtn	 	= 'jabatan';

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


	public static function nama_divisi($id)
	{
		$data 	= \DB::table(self::$tblDvs)
					->where('id','=',$id)
					->first();
		if($data == null):
			return "-";
		else:
			return $data->nama_divisi;
		endif;
	}

	public static function nama_jabatan($id)
	{
		$data 	= \DB::table(self::$tblJbtn)
					->where('id_jabatan','=',$id)
					->first();
		if($data == null):
			return "-";
		else:
			return $data->nama_jabatan;
		endif;
	}

	public static function divisi()
	{
		$data = \DB::table(self::$tblDvs)
					->get();
		return $data;
	}

	public static function jabatan()
	{
		$data = \DB::table(self::$tblJbtn)
					->get();
		return $data;
	}

}