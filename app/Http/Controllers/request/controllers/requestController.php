<?php
/**
  * @author  Bunga A. Restuputri <bungamelia@hotmail.com>
  * @package App\Http\Controllers\request\controllers
  * @version $id dev 
  */
namespace App\Http\Controllers\request\controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Http\Controllers\request\models\requestModel as rModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class requestController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return 
   */
  public function index()
  {
    //
		
  }


  /**
   * Input data request ganti jadwal shift.
   *
   * @return 
   */
  public function store(Request $request)
  {
      if (Auth::check()) {
        $req              = new rModel;
        $req->id_karyawan = Auth::user()->id_karyawan;
        $req->shift_lama  = \Input::get('shiftLama');
        $shift            = \Input::get('shift');
        $tgl              = explode("/", \Input::get('tanggal'));
        $tanggal          = $tgl[2]."-".$tgl[0]."-".$tgl[1];
        $req->shift_baru  = $shift." - ".$tanggal;
        $req->alasan      = \Input::get('alasan');
        $req->status      = "Waiting";
        $req->save();

        \DB::table('logs')->insert([
                           'id_karyawan' => Auth::user()->id_karyawan, 
                           'content'     => Auth::user()->username.' input data request ganti jadwal shift',
                           'created_at'  => date('Y-m-d H:i:s'),
                           'updated_at'  => date('Y-m-d H:i:s')]
                           );
        
        return \Redirect::to('shift');
      } else {
        return \Redirect::to('login');
      } 
  }

  
}