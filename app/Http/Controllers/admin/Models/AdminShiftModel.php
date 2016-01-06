<?php

namespace App\Http\Controllers\admin\models;

use Illuminate\Database\Eloquent\Model;

class AdminShiftModel extends Model
{
    //
	protected $table      = 'shift_line';
	protected $primaryKey = "id_shiftline";
	
	public static function CreateShift($data)
	{
		if(self::insert($data)):
			return 1;
		else:
			return 0;
		endif;
	}
}