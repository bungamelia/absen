<?php

namespace App\Http\Controllers\login\controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\login\models\loginModel;
use App\Http\Controllers\pengumuman\models\pengumumanModel as pModel;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class loginController extends Controller
{
    /**
     * Menampilkan form login.
     *
     * @return integer
     */
    public function index()
    {
        //
        if (Auth::check()):
            return \Redirect::to('dashboard');
        else:
            return view('login/index');
        endif;
	}
	

    /**
     * Cek username dan password ke database untuk login ke sistem.
     *
     * @return integer
     */
	public function doLogin()
	{
		$data = \Input::only(['username', 'password']);

        if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
        	\DB::table('logs')->insert([
                       'id_karyawan' => Auth::user()->id_karyawan, 
                       'content'     => Auth::user()->username.' melakukan login',
                       'created_at'  => date('Y-m-d H:i:s'),
                       'updated_at'  => date('Y-m-d H:i:s')]
                       );
            return \Redirect::to('dashboard');
        }
		else {
			return \Redirect::to('login');
		}
		
	}
	

    /**
     * Menampilkan form login.
     *
     * @return integer
     */
	public function dologout()
    {
        //
		if (Auth::check()) {
			Auth::logout();
		}
		
		return \Redirect::to('login');
    } 
	
	public function register()
    {
        //
		return view('dashboard/register');
    } 
	
	/*public function store(Request $request)
    {
        //
		$user = new loginModel;
		$user->name = \Input::get('name');
		$user->username = \Input::get('username');
		$user->email = \Input::get('email');
		$pass = \Input::get('password');
		$user->password = bcrypt($pass);
		$user->save();
		
		return \Redirect::to('dashboard');
    }*/
	
	
    /**
     * Tampil halaman pengaturan ganti password.
     *
     * @return string
     */	
	public function pengaturan()
    {
        //
        $id_karyawan = Auth::user()->id_karyawan;
        $today       = date('Y-m-d');

        $getNotice   = pModel::where("id_karyawan","=",$id_karyawan)
							 ->where("tanggal","=",$today)
							 ->get();

		\DB::table('logs')->insert([
	                       'id_karyawan' => Auth::user()->id_karyawan, 
	                       'content'     => Auth::user()->username.' akses halaman pengaturan',
	                       'created_at'  => date('Y-m-d H:i:s'),
	                       'updated_at'  => date('Y-m-d H:i:s')]
                       	   );

		return view('dashboard/pengaturan')->with("getNotice", $getNotice);
    }


    /**
     * .
     *
     * @return string
     */
    public function gantiPass(Request $request, $id)
    {
        //
        $id      = Auth::user()->id_karyawan;

        $pass 	 = Auth::user()->password;
    	
    	$newPass = \Input::get('newPass');
    	$konfirm = \Input::get('confirmPass');
    	

    		if (\Hash::check(\Input::get('oldPass'), $pass)) {
    			$profile           = loginModel::find($id);
    			$profile->password = bcrypt($newPass);
    			$profile->save();

                \DB::table('logs')->insert([
                           'id_karyawan' => Auth::user()->id_karyawan, 
                           'content'     => Auth::user()->username.' melukukan ganti password',
                           'created_at'  => date('Y-m-d H:i:s'),
                           'updated_at'  => date('Y-m-d H:i:s')]
                           );

    			return \Redirect::to('dashboard');
    		} else {
    			return \Redirect::to('pengaturan');
    		}

    		if ($newPass != $konfirm) {
    			return \Redirect::to('pengaturan');
    		} else {
    			$profile           = loginModel::find($id);
    			$profile->password = bcrypt($newPass);
    			$profile->save();

                \DB::table('logs')->insert([
                       'id_karyawan' => Auth::user()->id_karyawan, 
                       'content'     => Auth::user()->username.' melukukan ganti password',
                       'created_at'  => date('Y-m-d H:i:s'),
                       'updated_at'  => date('Y-m-d H:i:s')]
                       );

    			return \Redirect::to('pengaturan');
    		}
    		
    }
	
}
