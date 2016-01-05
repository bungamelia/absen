<?php
/**
  * @author  Bunga A. Restuputri <bungamelia@hotmail.com>
  * @version $id dev 
  */

namespace App\Http\Controllers\laporan\models;

use Illuminate\Database\Eloquent\Model;

class laporanModel extends Model
{
    //
	protected $table = 'laporan';
	protected $primaryKey = "id_laporan";
	
	public static function tgl_indo($tgl)
	{
		$tanggal   = substr($tgl,8,2);
		$bulan     = self::getBulan(substr($tgl,5,2));
		$tahun     = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;
	}
	
	public static function jam($date)
	{
		$date =  date_create($date);
		return date_format($date,"H:i:s");
	} 

	public static function getBulan($bln)
	{ 
		switch ($bln){ 
			case 1: 
				return "Januari"; 
			break;
			case 2: 
				return "Februari"; 
			break;
			case 3: 
				return "Maret"; 
			break;
			case 4: 
				return "April"; 
			break;
			case 5: 
				return "Mei"; 
			break;
			case 6: 
				return "Juni"; 
			break;
			case 7: 
				return "Juli"; 
			break;
			case 8: 
				return "Agustus"; 
			break;
			case 9: 
				return "September"; 
			break;
			case 10: 
				return "Oktober";
			break;
			case 11: 
				return "November"; 
			break;
			case 12: 
				return "Desember"; 
			break;
		}
	}

	public static function getHari($tgl)
	{ 
		$tgl = date("D", strtotime($tgl));
		switch ($tgl){ 
			case "Mon": 
				return "Senin"; 
			break;
			case "Tue": 
				return "Selasa"; 
			break;
			case "Wed": 
				return "Rabu"; 
			break;
			case "Thu": 
				return "Kamis"; 
			break;
			case "Fri": 
				return "Jumat"; 
			break;
			case "Sat": 
				return "Sabtu"; 
			break;
			case "Sun": 
				return "Minggu"; 
			break;
		}
	}
	
}
