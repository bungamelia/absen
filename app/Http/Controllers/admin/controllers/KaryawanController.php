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
use App\Http\Controllers\karyawan\models\KaryawanModel as Karyawan;
use App\Http\Controllers\dashboard\models\dashboardModel as Dashboard;
use App\Http\Controllers\pengumuman\models\pengumumanModel as Notice;
use App\Http\Controllers\shift\models\shiftModel as Shift;
use App\Http\Controllers\login\models\Login as Login;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\logs\models\LogsModel as LogsModel;

class KaryawanController extends Controller
{
	
	public function index()
	{
    if (Auth::check() && Auth::user()->id_karyawan == '1'):
  		$karyawan	= Karyawan::where("id_karyawan",">","1")->orderBy("id_karyawan", "DESC")->get();
      $divisi   = Karyawan::divisi();
      $jabatan  = Karyawan::jabatan();
          return view('admin/karyawan/karyawan')
          			->with("karyawan",$karyawan)
                ->with("divisi",$divisi)
                ->with("jabatan",$jabatan);
    else:
      return view('errors/403');
    endif;
	}


  public function cariKaryawan()
  {
    if (Auth::check() && Auth::user()->id_karyawan == '1'):
      $divisi       = Karyawan::divisi();
      $jabatan      = Karyawan::jabatan();

      if (!empty(\Input::get('divisi')) && !empty(\Input::get('jabatan'))):
        $cariKaryawan = Karyawan::where("id_karyawan", ">", "1")
                                ->where("id_divisi", "=", \Input::get('divisi'))
                                ->where("id_jabatan", "=", \Input::get('jabatan'))
                                ->get();
      else:
        $cariKaryawan = Karyawan::where("id_karyawan", ">", "1")
                                ->where("id_divisi", "=", \Input::get('divisi'))
                                ->orwhere("id_jabatan", "=", \Input::get('jabatan'))
                                ->where("id_karyawan", ">", "1")
                                ->get();
      endif;
      return view('admin/karyawan/karyawan')->with("cariKaryawan",$cariKaryawan)
                                      ->with("divisi",$divisi)
                                      ->with("jabatan",$jabatan);
    else:
      return view('errors/403');
    endif;
  }



  public function register()
  {
    if (Auth::check() && Auth::user()->id_karyawan == '1'):
      $divisi       = Karyawan::divisi();
      $jabatan      = Karyawan::jabatan();
      return view('admin/karyawan/register')->with("divisi",$divisi)
                                            ->with("jabatan",$jabatan);
    else:
      return view('errors/403');
    endif;
  }


  public function store(Request $request)
  {
        //
    $user                 = new Karyawan;
    $user->nama_karyawan  = \Input::get('name');
    $user->id_jkelamin    = \Input::get('jkelamin');
    $user->alamat         = \Input::get('alamat');
    $tgl                  = explode("/", \Input::get('tanggal'));
    $user->ttl            = \Input::get('tempat').", ".$tgl[2]."-".$tgl[0]."-".$tgl[1];
    $user->username       = \Input::get('username');
    $user->email          = \Input::get('email');
    $pass                 = \Input::get('password');
    $user->password       = bcrypt($pass);
    $user->id_divisi      = \Input::get('divisi');
    $user->id_jabatan     = \Input::get('jabatan');
    $user->save();
    
    return \Redirect::to('admin/karyawan');
  }
}