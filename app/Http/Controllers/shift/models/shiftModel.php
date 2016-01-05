<?php

namespace App\Http\Controllers\shift\models;

use Illuminate\Database\Eloquent\Model;

class shiftModel extends Model
{
    //
	protected $table 			= 'shift_line';
	protected $primaryKey 		= "id_shiftline";
	public static $tblShift 	= 'shift';

	public static function nama_shift($id)
	{
		$data 	= \DB::table(self::$tblShift)
					->where('id_shift','=',$id)
					->first();
		if($data == null):
			return "-";
		else:
			return $data->nama_shift;
		endif;
	}

	public static function shift()
	{
		$data 	= \DB::table(self::$tblShift)
					->get();
		return $data;
	}
	
}
