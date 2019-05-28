<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\data_rt;
use App\data_rw;
use App\paslon_rt;
use App\paslon_rw;
use App\dpt;
use DB;
use Alert;
class LoginDPT extends Controller
{
  public function auth(){
return view('dpt/login');
}
public function index(){
if(!session::get('logindpt')){
    return redirect('dpt/login')->with('alert', 'You are not loged in!');
}
else{
    $data = array(
        'title' => "Dashboard | Temuin",
    );
    return view('dpt/index')->with($data);
}
}


public function login(Request $request){
  $username = $request->username;
  $password = $request->password;

  $data = dpt::where('username', $username);
  if(count($data->get()) > 0){

      $data = $data->first();
      if(Hash::check($password, $data->password)){
          Session::put('id', $data->id);
          Session::put('nama_dpt', $data->nama_dpt);
          Session::put('nik', $data->nik);
          Session::put('alamat_dpt', $data->alamat_dpt);
          Session::put('jns_kelamin', $data->jns_kelamin);
          Session::put('username', $data->username);
          Session::put('rtid', $data->rtid);
          Session::put('rwid', $data->rwid);
          Session::put('agama_dpt', $data->agama_dpt);
          Session::put('logindpt', TRUE);
          return redirect('/dpt/index')->with('alert-success', 'Finger Print Terdeteksi');
      }
      else{
          return redirect('dpt/login')->with('alert', 'Password salah!');
      }
  }
  else{
      return redirect('dpt/login')->with('alert', 'Username salah!');
  }
}
public function logout(){
    Session::flush();
    return redirect('dpt/login')->with('alert', 'Berhasil Logout.');
}

public function data(){
if(!session::get('logindpt')){
    return redirect('/dpt/login')->with('alert', 'You are not loged in!');
}
else{

    $data = dpt::where('id', Session::get('id'))->first();

    if($data != null){

        return view('dpt/index', compact('data'));
    }

    }
}
}
