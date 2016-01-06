<?php
/**
  * @author  Angga Purnama <angga.purnama@mcs.co.id>
  * @package App\Http\Controllers\admin\controllers
  * @version $id dev 
  */
namespace App\Http\Controllers\admin\controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Controllers\absen\models\absenModel as Absen;
use App\Http\Controllers\karyawan\models\KaryawanModel as Karyawan;
use App\Http\Controllers\laporan\models\laporanModel as Laporan;
use App\Http\Controllers\dashboard\models\dashboardModel as Dashboard;
use App\Http\Controllers\pengumuman\models\pengumumanModel as Notice;
use App\Http\Controllers\shift\models\shiftModel as Shift;
use App\Http\Controllers\login\models\Login as Login;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\logs\models\LogsModel as LogsModel;

class ShiftController extends Controller
{
	
	public function index()
	{
    if (Auth::check() && Auth::user()->id_karyawan == '1'):
  		$absen 		= Absen::all();
  		$laporan	= Laporan::all();
  		$shift 		= Shift::all();
          return view('admin/shift/shift')
          			->with("absen",$absen)
          			->with("laporan",$laporan)
          			->with("shift",$shift);
    else:
      return view('errors/403');
    endif;
	}

  public function generator()
  {
      $employees  = Karyawan::all();
      $shifts      = Shift::shift();
      return view('admin/shift/generator')
                  ->with("employees",$employees)
                  ->with("shifts",$shifts);
  }

  public function postgenerator()
  {
    $dari         = \Input::get('dari');
    $id_karyawan  = \Input::get('id_karyawan');
    $sampai       = \Input::get('sampai');
    $id_shift     = \Input::get('id_shift');

    $dariMysql      = Shift::ExplodeDate($dari,'hari')."/".Shift::ExplodeDate($dari,'bulan')."/".Shift::ExplodeDate($dari,'tahun');
    $sampaiMysql    = Shift::ExplodeDate($sampai,'hari')."/".Shift::ExplodeDate($sampai,'bulan')."/".Shift::ExplodeDate($sampai,'tahun');
    $datePeriod     = Shift::returnDates($dariMysql, $sampaiMysql);
      foreach($datePeriod as $date):
        $data           = [
                            "id_shift"      => $id_shift,
                            "id_karyawan"   => $id_karyawan,
                            "tanggal_shift" => $date->format('Y-m-d'),
                            ];
        Shift::insert($data);
      endforeach;
      return \Redirect::to('admin/shift/generator');
    //return view('admin/shift/generator');
  }
}