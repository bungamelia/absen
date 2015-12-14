<?php
/**
  * @author  Bunga A. Restuputri <bungamelia@hotmail.com>
  * @package App\Http\Controllers\shift\controllers
  * @version $id dev 
  */
namespace App\Http\Controllers\shift\controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Controllers\shift\models\shiftModel as Shift;
use App\Http\Controllers\pengumuman\models\pengumumanModel as Notice;
use App\Http\Controllers\request\models\requestModel as rModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class shiftController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return string Data shift dan request.
   */
  public function index()
  {
    //
		if (Auth::check()) {
      $id_karyawan = Auth::user()->id_karyawan;
      $today       = date("Y-m-d");
      $getNotice   = Notice::where("id_karyawan","=",$id_karyawan)
                                  ->where("tanggal","=",$today)
                                  ->get();

      $shift       = \DB::table('shift')->get();

      $month_end   = date('Y-m-d', strtotime('last day of this month', time()));
      $shiftLine   = Shift::join("shift","shift_line.id_shift","=","shift.id_shift")
                           ->where("id_karyawan","=",$id_karyawan)
                           ->whereBetween("tanggal_shift", array($today, $month_end))
                           ->orderBy("id_shiftline")
                           ->get();

      $req         = rModel::where("id_karyawan","=", $id_karyawan)
                           ->orderBy("id", "DESC")
                           ->first();

      \DB::table('logs')->insert([
                         'id_karyawan' => $id_karyawan, 
                         'content'     => Auth::user()->username.' akses halaman daftar shift',
                         'created_at'  => date('Y-m-d H:i:s'),
                         'updated_at'  => date('Y-m-d H:i:s')]
                         );

      return view('shift/index')->with("getNotice", $getNotice)
                                ->with("shift", $shift)
                                ->with("shiftLine", $shiftLine)
                                ->with("req", $req);
    } else {
        return \Redirect::to('login');
    }
  }


}