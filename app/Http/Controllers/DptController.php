<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\dpt;
use App\data_rt;
use App\data_rw;
use App\paslon_rt;
use App\paslon_rw;
use App\pemilihan_rw;
use DB;
class DptController extends Controller
{
        public function index()
    {
        $data = Session::all();
        return view('dpt/index');
    }

    public function pemilihan(){
      if(!session::get('logindpt')){
        return redirect('/dpt/login')->with('alert', 'You are not loged in!');
      }else {
        $profile = data_rw::where('id',Session::get('rwid'));
        $profile = $profile->first();
        $data1 = paslon_rw::where('rw_id',$profile->id)->get();

            return view('dpt/pemilihan',['data1'=>$data1]);
        }
    }

    public function voterw(Request $request) {

        $ids = $request->input('paslon_rws');


        if(Session::get('votedrw') == 1 ) {
            return redirect('home')->with('warning','You have voted already!');
        }

        if(!isset($ids)){
            return redirect()->back()->with('warning', 'Pilih Salah Satu Kandidat!');
        }

        foreach($ids as $id) {
            $paslon_rws = paslon_rw::findOrFail($id);
            $paslon_rws->votes += 1;
            $paslon_rws->save();
        }

        $dpt = dpt::where('id', Session::get('id'))->first();
        $dpt->votedrw = 1;
        $dpt->save();
        
        return redirect('dpt/pemilihanrt')->with('success','Terima Kasih sudah melakukan voting, silahkan melakukan voting RT!');
    }


    public function pemilihanrt(){
      if(!session::get('logindpt')){
        return redirect('/dpt/login')->with('alert', 'You are not loged in!');
      }else {
        $profile = data_rt::where('id',Session::get('rtid'));
        $profile = $profile->first();
        $data1 = paslon_rt::where('rt_id',$profile->id)->get();

            return view('dpt/pemilihanrt',['data1'=>$data1]);
        }
    }

        public function votert(Request $request) {

        $ids = $request->input('paslonrts');


        if(Session::get('votedrt') == 1 ) {
            return redirect('dpt/pemilihanrt')->with('warning','You have voted already!');
        }

        if(!isset($ids)){
            return redirect()->back()->with('warning', 'Pilih Salah Satu Kandidat!');
        }

        foreach($ids as $id) {
            $paslonrts = paslon_rt::findOrFail($id);
            $paslonrts->votes += 1;
            $paslonrts->save();
        }

        $dpt = dpt::where('id', Session::get('id'))->first();
        $dpt->votedrt = 1;
        $dpt->save();
        
        return redirect('dpt/index')->with('success','Terima Kasih sudah melakukan voting!');
    }

}

