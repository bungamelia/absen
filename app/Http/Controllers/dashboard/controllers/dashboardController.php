<?php
/**
  * @author  Bunga A. Restuputri <bungamelia@hotmail.com>
  * @package App\Http\Controllers\dashboard\controllers
  * @version $id dev 
  */
namespace App\Http\Controllers\dashboard\controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Controllers\absen\models\absenModel as Absen;
use App\Http\Controllers\laporan\models\laporanModel as Laporan;
use App\Http\Controllers\dashboard\models\dashboardModel as Dashboard;
use App\Http\Controllers\pengumuman\models\pengumumanModel as Notice;
use App\Http\Controllers\shift\models\shiftModel as Shift;
use App\Http\Controllers\login\models\Login as Login;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
		
    public function index()
    {
        if (Auth::check()) {
			$id_karyawan = Auth::user()->id_karyawan;
			$absen       = Absen::where("id_karyawan","=",$id_karyawan)
						        ->orderBy("id_absen", "DESC")
						        ->first();

			$today       = date('Y-m-d');
			$report      = Laporan::where("id_karyawan","=",$id_karyawan)
							       ->where("tanggal","=",$today)
							       ->first();

			$note        = Dashboard::where("id_karyawan","=",$id_karyawan)
								    ->first();

			$getNotice   = Notice::where("id_karyawan","=",$id_karyawan)
								          ->where("tanggal","=",$today)
										  ->get();

			$shiftLine   = Shift::join("shift","shift_line.id_shift","=","shift.id_shift")
							    ->where("tanggal_shift","=",$today)
							    ->where("id_karyawan","=",$id_karyawan)
							    ->first();

			$yesterday   = date("Y-m-d", time()-86400);
			$shiftKmrn   = Shift::join("shift","shift_line.id_shift","=","shift.id_shift")
								->where("tanggal_shift","=",$yesterday)
								->where("id_karyawan","=",$id_karyawan)
								->first();

			$besok       = date("Y-m-d", time()+86400);
			$shiftBesok  = Shift::join("shift","shift_line.id_shift","=","shift.id_shift")
								     ->where("tanggal_shift","=",$besok)
								     ->where("id_karyawan","=",$id_karyawan)
								     ->first();

			$tgl         = explode(" ", $absen->created_at);
			
				if ($absen->status == "masuk" && $tgl[0] == $yesterday) {
					$absen              = new Absen;
					$absen->id_karyawan = $id_karyawan;
					$absen->id_shift    = $shiftKmrn->id_shift;
					$absen->status      = "keluar";
					$absen->save();

					\DB::table('logs')->insert([
							   'id_karyawan' => $id_karyawan, 
			                   'content'     => Auth::user()->username.' absen keluar',
			                   'created_at'  => date('Y-m-d H:i:s'),
			                   'updated_at'  => date('Y-m-d H:i:s')]
								);
				} elseif ($absen->status == "masuk" && $tgl[0] != $today) {
					$absen              = new Absen;
					$absen->id_karyawan = $id_karyawan;
					$absen->id_shift    = "4";
					$absen->status      = "keluar";
					$absen->save();

					\DB::table('logs')->insert([
							   'id_karyawan' => $id_karyawan, 
			                   'content'     => Auth::user()->username.' absen keluar',
			                   'created_at'  => date('Y-m-d H:i:s'),
			                   'updated_at'  => date('Y-m-d H:i:s')]
								);
				}
			
			\DB::table('logs')->insert([
							   'id_karyawan' => $id_karyawan, 
			                   'content'     => Auth::user()->username.' akses halaman dashboard',
			                   'created_at'  => date('Y-m-d H:i:s'),
			                   'updated_at'  => date('Y-m-d H:i:s')]
								);

			return view('dashboard/index')->with("absen",$absen)
										  ->with("report",$report)
										  ->with("note",$note)
										  ->with("getNotice",$getNotice)
										  ->with("shiftLine",$shiftLine)
										  ->with("shiftKmrn",$shiftKmrn)
										  ->with("shiftBesok",$shiftBesok);
		} else {
	    	return \Redirect::to('login');
	    }
    }
	

	/**
     * Menyimpan data catatan ke database.
     *
     * @return integer
     */
	public function store(Request $request)
	{
		if (Auth::check()) {
			$note              = new Dashboard;
			$note->id_karyawan = Auth::user()->id_karyawan;
			$note->content     = \Input::get('content');
			$note->save();
			
			\DB::table('logs')->insert([
							   'id_karyawan' => Auth::user()->id_karyawan, 
			                   'content'     => Auth::user()->username.' tambah catatan']
								);

			return \Redirect::to('dashboard');
		} else {
	    	return \Redirect::to('login');
	    }
	}
	

	/**
     * Update data catatan ke database.
     *
     * @return 
     */
	public function update(Request $request, $id)
    {
        //
		if (Auth::check()) {
			$note          = Dashboard::find($id);
			$note->content = \Input::get('content');
			$note->save();

			\DB::table('logs')->insert([
							   'id_karyawan' => Auth::user()->id_karyawan, 
			                   'content'     => Auth::user()->username.' tulis catatan',
			                   'created_at'  => date('Y-m-d H:i:s'),
			                   'updated_at'  => date('Y-m-d H:i:s')]
								);

			return \Redirect::to('dashboard');
		} else {
	    	return \Redirect::to('login');
	    }
    }


    /**
     * Tampil profile karyawan dengan form edit data karyawan.
     *
     * @return string 
     */
    public function profile()
    {

    	if (Auth::check()) {
	    	$id_karyawan = Auth::user()->id_karyawan;
			$data        = Login::where("id_karyawan","=",$id_karyawan)->first();

			$today       = date('Y-m-d');
	    	$getNotice   = Notice::where("id_karyawan","=",$id_karyawan)
								 ->where("tanggal","=",$today)
								 ->get();

			\DB::table('logs')->insert([
							   'id_karyawan' => $id_karyawan, 
			                   'content'     => Auth::user()->username.' akses halaman profile',
			                   'created_at'  => date('Y-m-d H:i:s'),
			                   'updated_at'  => date('Y-m-d H:i:s')]
								);

			return view('dashboard/profile')->with("data", $data)
											->with("getNotice", $getNotice);
		} else {
	    	return \Redirect::to('login');
	    }
    }


    /**
     * Update profile karyawan.
     *
     * @return string 
     */
    public function updatePro(Request $request, $id)
    {

    	if (Auth::check()) {
	    	$id                     = Auth::user()->id_karyawan;
	    	$profile                = Login::find($id);
			$profile->nama_karyawan = \Input::get('nama');
			$profile->alamat        = \Input::get('alamat');
			$profile->email         = \Input::get('email');
			$tempat			        = \Input::get('tempat');
			$date 					= explode("/", \Input::get('tanggal'));
			$profile->ttl 			= $tempat.", ".$date[1]."-".$date[0]."-".$date[2];
			$profile->save();
			
			\DB::table('logs')->insert([
							   'id_karyawan' => $id, 
			                   'content'     => Auth::user()->username.' update data profile',
			                   'created_at'  => date('Y-m-d H:i:s'),
			                   'updated_at'  => date('Y-m-d H:i:s')]
								);

			return \Redirect::to('profile');
		} else {
	    	return \Redirect::to('login');
	    }
    }

     
}