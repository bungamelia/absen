<?php
/**
  * @author  Bunga A. Restuputri <bungamelia@hotmail.com>
  * @package App\Http\Controllers\laporan\controllers
  * @version $id dev 
  */

namespace App\Http\Controllers\laporan\controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Controllers\laporan\models\laporanModel as Laporan;
use App\Http\Controllers\pengumuman\models\pengumumanModel as Notice;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class laporanController extends Controller
{
    /**
     * Menampilkan daftar laporan dan pengumuman berdasarkan user.
     *
     * @return string
     */
    public function index()
    {
        //
        if (Auth::check()) {
			$id_karyawan = Auth::user()->id_karyawan;
			$today       = date("Y-m-d");
			$report      = Laporan::where("id_karyawan","=",$id_karyawan)
								  ->paginate(10);

			$getNotice   = Notice::where("id_karyawan","=",$id_karyawan)
								          ->where("tanggal","=",$today)
										  ->get();

			\DB::table('logs')->insert([
							   'id_karyawan' => $id_karyawan, 
			                   'content'     => Auth::user()->username.' akses halaman daftar laporan',
			                   'created_at'  => date('Y-m-d H:i:s'),
			                   'updated_at'  => date('Y-m-d H:i:s')]
								);

	        return view('laporan/index')->with("report",$report)
	        							->with("getNotice",$getNotice);
	    } else {
	    	return \Redirect::to('login');
	    }
	}
	

	/**
     * Input data laporan ke database.
     *
     * @return integer Data laporan disimpan redirect halaman laporan.
     */
	public function store(Request $request)
    {
        //
        if (Auth::check()) {
			$report				 = new Laporan;
			$report->id_karyawan = Auth::user()->id_karyawan;
			$report->content     = \Input::get('content');
			$report->tanggal     = date("Y-m-d");
			$draft               = \Input::get('draft');
			$publish             = \Input::get('publish');

				if (empty($draft)) {
					$report->state = "Publish";
				} else {
					$report->state = "Draft";
				}

			$report->save();

			return \Redirect::to('laporan');
		} else {
	    	return \Redirect::to('login');
	    }
    }


    /**
     * Edit data laporan.
     *
     * @return integer Data laporan berhasil diupdate redirect halaman laporan.
     */
    public function update(Request $request, $id_laporan)
    {
        //
        if (Auth::check()) {
			$report 		 = Laporan::find($id_laporan);
			$report->content = \Input::get('content');
			$draft               = \Input::get('draft');
			$publish             = \Input::get('publish');

				if (empty($draft)) {
					$report->state = "Publish";
				} 

			$report->save();
			
			return \Redirect::to('laporan');
		} else {
	    	return \Redirect::to('login');
	    }
    }
}