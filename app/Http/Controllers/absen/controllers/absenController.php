<?php
/**
  * @author  Bunga A. Restuputri <bungamelia@hotmail.com>
  * @package App\Http\Controllers\absen\controllers
  * @version $id dev 
  */
namespace App\Http\Controllers\absen\controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Controllers\absen\models\absenModel as Absen;
use App\Http\Controllers\pengumuman\models\pengumumanModel as Notice;
use App\Http\Controllers\laporan\models\laporanModel as Laporan;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class absenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string Data absen karyawan dan pengumuman.
     */
    public function index()
    {
        if (Auth::check()) {
	        $id_karyawan = Auth::user()->id_karyawan;
			$today       = date("Y-m-d");

			$absen       = Absen::where("id_karyawan","=",$id_karyawan)
							     ->orderBy("id_absen", "DESC")
							     ->paginate(10);

			$getNotice   = Notice::where("id_karyawan","=",$id_karyawan)
								 ->where("tanggal","=",$today)
								 ->get();

	        return view('absen/index')->with("absen",$absen)
	        						  ->with("getNotice",$getNotice);
	    } else {
	    	return \Redirect::to('login');
	    }
	}
	

	/**
     * Input data absen masuk dan upload foto absen masuk.
     *
     * @return integer Data absen masuk berhasil disimpan akses ke halaman dashboard.
     */
	public function upload(Request $request)
	{
		if (Auth::check()) {
			$id_karyawan = Auth::user()->id_karyawan;
			$tahun 		 = date('Y');
			$bulan 		 = date('m');
			$tanggal 	 = date('d');
			$path 		 = "uploads/".$id_karyawan."/".$tahun."/".$bulan."/".$tanggal;
			$imageStr    = \Input::get('foto_absen');
			$array		 = explode(',', $imageStr);
			$image 		 = base64_decode($array[1]);
			
			\File::makeDirectory($path, $mode = 0777, true, true);

			file_put_contents("{$path}/{$id_karyawan}-".date('d-m-Y').".jpeg", $image);

			$absen 				= new Absen;
			$absen->id_karyawan = Auth::user()->id_karyawan;
			$absen->id_shift    = \Input::get('id_shift');
			//$absen->id_shift    = "4";
			$absen->status      = "masuk";
			$absen->save();

			return \Redirect::to('dashboard');
		} else {
	    	return \Redirect::to('login');
	    }
	}


	/**
     * Input data absen masuk keluar dan update status laporan karyawan
     *
     * @return integer Data absen keluar berhasil disimpan akses ke halaman dashboard.
     */
	public function store(Request $request)
	{
		//print_r($_POST);
		if (Auth::check()) {
			$id     = Auth::user()->id_karyawan;
			$today  = date("Y-m-d");
			$report = Laporan::where("id_karyawan","=",$id)
								  ->where("tanggal","=",$today)
								  ->where("state","=","Draft")
							      ->orderBy("id_laporan", "DESC")
							      ->first();

				if (!empty($report)) {
					$id_laporan     = \Input::get('id_laporan');
					$laporan        = Laporan::find($id_laporan);
					$laporan->state = "Publish";
					$laporan->save();
				}

			$absen              = new Absen;
			$absen->id_karyawan = Auth::user()->id_karyawan;
			$absen->id_shift    = \Input::get('id_shift');
			$absen->status      = "keluar";
			$absen->save();

			return \Redirect::to('dashboard');
		} else {
	    	return \Redirect::to('login');
	    }
	}
}