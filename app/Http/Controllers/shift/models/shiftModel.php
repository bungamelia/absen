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

	public static function ExplodeDate($date,$output)
	{
		$data 	= explode("/",$date);
		if($output == 'bulan'):
			return $data['0'];
		elseif($output == 'tahun'):
			return $data['2'];
		elseif($output == 'hari'):
			return $data['1'];
		else:
			return $date;
		endif;
	}

	public static function returnDates($fromdate, $todate) 
	{
		    $fromdate 		= \DateTime::createFromFormat('d/m/Y', $fromdate);
		    $todate 		= \DateTime::createFromFormat('d/m/Y', $todate);
		    return new \DatePeriod(
		        $fromdate,
		        new \DateInterval('P1D'),
		        $todate->modify('+1 day')
	    );
	}
}
