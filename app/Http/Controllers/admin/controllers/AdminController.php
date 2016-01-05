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
use App\Http\Controllers\laporan\models\laporanModel as Laporan;
use App\Http\Controllers\dashboard\models\dashboardModel as Dashboard;
use App\Http\Controllers\pengumuman\models\pengumumanModel as Notice;
use App\Http\Controllers\shift\models\shiftModel as Shift;
use App\Http\Controllers\login\models\Login as Login;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\logs\models\LogsModel as LogsModel;

class AdminController extends Controller
{
	
	public function index()
	{
    if (Auth::check() && Auth::user()->id_karyawan == '1'):
  		$absen 		= Absen::all();
  		$laporan	= Laporan::all();
  		$shift 		= Shift::all();
          return view('admin/index')
          			->with("absen",$absen)
          			->with("laporan",$laporan)
          			->with("shift",$shift);
    else:
      return view('errors/403');
    endif;
	}
}