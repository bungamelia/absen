<?php
/**
  * @author  Bunga A. Restuputri <bungamelia@hotmail.com>
  * @package App\Http\Controllers\pengumuman\controllers
  * @version $id dev 
  */
namespace App\Http\Controllers\pengumuman\controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Controllers\pengumuman\models\pengumumanModel as pModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class pengumumanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return string Data pengumuman.
   */
  public function index()
  {
    //
    if (Auth::check()) {
        $id_karyawan = Auth::user()->id_karyawan;
    		$today       = date("Y-m-d");

    		$notice      = pModel::where("id_karyawan","=",$id_karyawan)
    							           ->paginate(10);

    		$getNotice   = pModel::where("id_karyawan","=",$id_karyawan)
    							           ->where("tanggal","=",$today)
    								         ->get();

       \DB::table('logs')->insert([
                               'id_karyawan' => $id_karyawan, 
                               'content'     => Auth::user()->username.' akses halaman daftar pengumuman',
                               'created_at'  => date('Y-m-d H:i:s'),
                               'updated_at'  => date('Y-m-d H:i:s')]
                              );

        return view('pengumuman/index')->with("notice",$notice)
                                       ->with("getNotice",$getNotice);
    } else {
        return \Redirect::to('login');
      }
	}
}