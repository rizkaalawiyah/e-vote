<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\data_rt;
use App\data_rw;
use App\paslon_rt;
use App\paslon_rw;
use App\dpt;
use Alert;
use DB;
class Admin extends Controller
{
  public function adminindex()
  {
    return view ('admin/index');
  }
    public function index()
    {
      $data=data_rt::all();
          $datarw=data_rw::all();
      return view ('admin/datart',['data'=>$data,'datarw'=>$datarw]);
    }

    public function store(Request $request)
    {
      $data=new data_rt();
      $data->rt=$request->get('rt');
      $data->rw=$request->get('rw');
      $data->kelurahan=$request->get('kelurahan');
      $data->kecamatan=$request->get('kecamatan');
      if($data->save()){
       alert()->success('You have been logged out.', 'Good bye!');
          return redirect ('admin/datart')->with('success');
      }

    }
    public function edit($id)
    {
      $datart=data_rt::find($id);
      $data=data_rt::all();

      return view('admin/edit_rt',['datart'=>$datart,'data'=>$data]);
    }
    public function update_rt(Request $request,$id)
    {
      $datart= data_rt::find($id);
    	$datart->update($request->all());
    	return redirect('admin/datart')->with('success','Data telah terupdate');
    }
    public function delete_rt($id)
    {
      $rt=DB::table('data_rts')->where('id',$id)->delete();
        return redirect ('admin/datart');
    }

    public function storerw(Request $request)
    {
      $datarw=new data_rw();
      $datarw->datarw=$request->get('datarw');
      $datarw->kelurahanrw=$request->get('kelurahanrw');
      $datarw->kecamatanrw=$request->get('kecamatanrw');
      if($datarw->save()){

          return redirect ('admin/datart')->with('success');
      }
}
public function editrw($id_rw)
{
  $rw=data_rw::find($id_rw);
  $data=data_rt::all();
  $dataku =data_rw::all();

  return view('admin/edit_rw',['dataku'=>$dataku,'data'=>$data,'rw'=>$rw]);
}
public function update_rw(Request $request,$id)
{
  $datarw= data_rw::find($id);
  $datarw->update($request->all());
  return redirect('admin/datart')->with('success','Data telah terupdate');
}
public function delete_rw($id)
{
  $rw=DB::table('data_rws')->where('id',$id)->delete();
    return redirect ('admin/datart');
}
    public function kandidat()
    {
      $paslonrt=DB::table('paslonrts')->get();
      $data=data_rt::all();
        $datarw=data_rw::all();
      $paslonrw=DB::table('paslon_rws')->get();
      return view ('admin/kandidat',['data'=>$data, 'datarw'=>$datarw,'paslonrt'=>$paslonrt,'paslonrw'=>$paslonrw]);
    }

    public function create_paslon_rt(Request $request)
    {
      $paslonrt=new paslon_rt();
      $paslonrt->nm_rt=$request->get('nm_rt');
        $paslonrt->no_paslon=$request->get('no_paslon');
          $paslonrt->rt_id=$request->get('rt_id');
            $paslonrt->pekerjaan=$request->get('pekerjaan');
              $paslonrt->agama=$request->get('agama');
                $paslonrt->umur=$request->get('umur');
                  if($request -> file('gambar')){
                   $file = $request->file('gambar')->store('avatar', 'public');
                   $paslonrt->gambar = $file;
                  }
                  if($paslonrt->save()){
                   alert()->success('You have been logged out.', 'Good bye!');
                      return redirect ('admin/kandidat')->with('success');
                  }

    }

    public function create_paslon_rw(Request $request)
    {
      $paslonrw=new paslon_rw();
      $paslonrw->nm_rw=$request->get('nm_rw');
        $paslonrw->no_paslon=$request->get('no_paslon');
          $paslonrw->rw_id=$request->get('rw_id');
            $paslonrw->pekerjaan=$request->get('pekerjaan');
              $paslonrw->agama=$request->get('agama');
                $paslonrw->umur=$request->get('umur');
                  if($request -> file('foto')){
                   $file = $request->file('foto')->store('avatar', 'public');
                   $paslonrw->foto = $file;
                  }
                  if($paslonrw->save()){
                   $alert=alert()->success('You have been logged out.', 'Good bye!');
                      return redirect ('admin/kandidat')->with('alert');
                  }

    }
    public function delete_paslonrw($id)
    {
      $rw=DB::table('paslon_rws')
        ->where('paslon_rws.id',$id)->delete();
        return redirect ('admin/kandidat');
    }
    public function delete_paslonrt($id)
    {
      $rw=DB::table('paslonrts')
        ->where('paslonrts.id',$id)->delete();
        return redirect ('admin/kandidat');
    }

    public function dptindex(){
      $datart=data_rt::all();
        $datarw=data_rw::all();
        $dpt=DB::table('dpts')
        ->join('data_rws','data_rws.id','=','dpts.rwid')
          ->join('data_rts','data_rts.id','=','dpts.rtid')
          ->get();
      return view('admin/dpt',['datart'=>$datart,'datarw'=>$datarw,'dpt'=>$dpt]);
    }

    public function storedpt(Request $request)
    {
      $dpt=new dpt();
      $dpt->nik=$request->get('nik');
      $dpt->nama_dpt=$request->get('nama_dpt');
      $dpt->username=$request->get('username');
      $dpt->password = Hash::make($request->get('password'));
      $dpt->alamat_dpt=$request->get('alamat_dpt');
      $dpt->jns_kelamin=$request->get('jns_kelamin');
      $dpt->agama_dpt=$request->get('agama_dpt');
      $dpt->rtid=$request->get('rtid');
      $dpt->rwid=$request->get('rwid');

      if($dpt->save()){

          return redirect ('admin/dpt')->with('success');
      }
    }

    public function delete_dpt($id)
    {
      $dpt=DB::table('dpts')
        ->where('dpts.id',$id)->delete();
        return redirect ('admin/dpt');
    }



    public function editdpt($id)
    {
      $datadpt=dpt::find($id);
      $dpt=dpt::all();
      $datart=data_rt::all();
      $datarw=data_rw::all();

      return view('admin/edit_dpt',['datadpt'=>$datadpt,'dpt'=>$dpt, 'datarw'=>$datarw, 'datart'=>$datart]);
    }
    public function update_dpt(Request $request,$id)
    {
      $datadpt= dpt::find($id);
      $datadpt->update($request->all());
      return redirect('admin/dpt')->with('success','Data telah terupdate');
    }

    public function hasil()
    {
      $paslonrt=DB::table('paslonrts')->get();
      $data=data_rt::all();
        $datarw=data_rw::all();
      $paslonrw=DB::table('paslon_rws')->get();
      return view ('admin/hasil',['data'=>$data, 'datarw'=>$datarw,'paslonrt'=>$paslonrt,'paslonrw'=>$paslonrw]);
    }

    public function berhasil(){
      return view('dpt/berhasil');
    }
  public function gagal(){
      return view('dpt/gagal')->with('alert','Fingerprint tidak terdeteksi');
    }

}
