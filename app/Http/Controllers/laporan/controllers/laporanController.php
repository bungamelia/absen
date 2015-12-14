<?php
/**
  * @author  Bunga A. Restuputri <bungamelia@hotmail.com>
  * @package App\Http\Controllers\laporan\controllers
  * @version $id dev 
  */

namespace App\Http\Controllers\laporan\controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Controllers\laporan\models\laporanModel as lModel;
use App\Http\Controllers\pengumuman\models\pengumumanModel as pModel;
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
		$id_karyawan = Auth::user()->id_karyawan;
		$today       = date("Y-m-d");
		$report      = lModel::where("id_karyawan","=",$id_karyawan)
							  ->paginate(10);

		$getNotice   = pModel::where("id_karyawan","=",$id_karyawan)
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
	}
	

	/**
     * Input data laporan ke database.
     *
     * @return integer Data laporan disimpan redirect halaman laporan.
     */
	public function store(Request $request)
    {
        //
		$report				 = new lModel;
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
		
		\DB::table('logs')->insert([
						   'id_karyawan' => Auth::user()->id_karyawan, 
		                   'content'     => Auth::user()->username.' input data laporan hari ini',
		                   'created_at'  => date('Y-m-d H:i:s'),
		                   'updated_at'  => date('Y-m-d H:i:s')]
							);

		return \Redirect::to('laporan');
    }


    /**
     * Edit data laporan.
     *
     * @return integer Data laporan berhasil diupdate redirect halaman laporan.
     */
    public function update(Request $request, $id_laporan)
    {
        //
		$report 		 = lModel::find($id_laporan);
		$report->content = \Input::get('content');
		$report->state   = "Publish";
		$report->save();
		
		\DB::table('logs')->insert([
						   'id_karyawan' => Auth::user()->id_karyawan, 
		                   'content'     => Auth::user()->username.' edit data laporan hari ini',
		                   'created_at'  => date('Y-m-d H:i:s'),
		                   'updated_at'  => date('Y-m-d H:i:s')]
							);

		return \Redirect::to('laporan');
    }
}