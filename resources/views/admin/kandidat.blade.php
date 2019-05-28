@extends('layouts.admin')
@section('nav')
<ul class="nav nav-tabs justify-content-center">
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;" class='"btn btn-secondary' href="{{url('admin/index ')}}"> <i class="fas fa-home"></i> <span>Dashboard</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:lightgrey;"  class="nav-link" href="{{url('admin/kandidat')}}"><i class="fas fa-user-friends"></i> <span>Kandidat</span></a></a>
</li>
<li class="nav-item">
  <a style="color:black;font-size:18px; background-color:white;"  class="nav-link" href="{{url('admin/dpt')}}"><i class="fas fa-file"></i> <span>Daftar Pemilih</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link " href="#" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Hasil Perhitungan</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link " href="{{url('admin/datart ')}}" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Data RT dan RW</span></a>
</li>
</ul>

@endsection

@section('content')
@include('sweet::alert')
<div class="jumbotron jumbotron-fluid" style="background-color:white">
<div class="container">
<h1 style="border-bottom:solid;" class="display-4">Data Kandidat</h1><br>
</div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <h2>Kandidat RT</h2>
      <button class="btn btn-link collapsed"  style="font-size:16px; background:black; color:white;" type="button" data-toggle="collapse" data-target="#collapseone" aria-expanded="false" aria-controls="collapseThree">
      Tambah Kandidat RT
      </button>
      <table class="table" style="border-radius: solid;">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Kandidat</th>
            <th>Nama Kandidat</th>
            <th>RT ID</th>
            <th>Umur</th>
            <th>Pekerjaan</th>
            <th>Agama</th>
            <th>Foto</th>
          </tr>
        </thead>
        <tbody>
          @foreach($paslonrt as $index=> $paslonrt)
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$paslonrt->no_paslon}}</td>
            <td>{{$paslonrt->nm_rt}}</td>
            <td>{{$paslonrt->rt_id}}</td>
            <td>{{$paslonrt->umur}}</td>
            <td>{{$paslonrt->pekerjaan}}</td>
            <td>{{$paslonrt->agama}}</td>
            <td>@if($paslonrt->gambar)
            <img src="{{asset('storage/'.$paslonrt->gambar)}}" width="70px"/>
            @else
            N/A
            @endif
          </td>
          <td><a href="" class="btn btn-info">edit</a>
            <a style="background:darkred;" href="/delete/{{$paslonrt->id}}/paslonrt" class="btn btn-danger">delete</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="col-md-6">
      <h2>Kandidat RW</h2>
      <button class="btn btn-link collapsed"  style="font-size:16px; background:black; color:white;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      Tambah Kandidat RW
      </button>
      <table class="table" style="border-radius: solid;">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Kandidat</th>
            <th>Nama Kandidat</th>
            <th>RW ID</th>
            <th>Umur</th>
            <th>Pekerjaan</th>
            <th>Agama</th>
            <th>Foto</th>
          </tr>
        </thead>
        <tbody>
          @foreach($paslonrw as $index=> $paslonrw)
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$paslonrw->no_paslon}}</td>
            <td>{{$paslonrw->nm_rw}}</td>
            <td>{{$paslonrw->rw_id}}</td>
            <td>{{$paslonrw->umur}}</td>
            <td>{{$paslonrw->pekerjaan}}</td>
            <td>{{$paslonrw->agama}}</td>
            <td>@if($paslonrw->foto)
            <img src="{{asset('storage/'.$paslonrw->foto)}}" width="70px"/>
            @else
            N/A
            @endif
          </td>
          <td><a href="" class="btn btn-info">edit</a>
            <a style="background:darkred;" href="/delete/{{$paslonrw->id}}/paslonrw" class="btn btn-danger">delete</a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
<div class="accordion" id="accordionExample">


  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">

      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <h2 style="text-align:center;">Tambah Kandidat RW</h2>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="/create/kandidatrw">
          @csrf
          <div class="form-group col-md-12">
            <label for="inputEmail4">Nomor Kandidat RW</label>
            <input  type="text" name="no_paslon" class="form-control" id="inputEmail4" >
          </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Nama Kandidat</label>
    <input  type="text" name="nm_rw" class="form-control" id="inputEmail4" >
  </div>
  <div class="form-group col-md-6">
      <label for="inputPassword4">RW</label>
      <select class="form-control" name="rw_id">
        <option value="">Pilih....</option>
        @foreach($datarw as $datarw)
        <option value="{{$datarw->id}}">{{$datarw->datarw}}</option>
        @endforeach
      </select>

  </div>

  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputCity">Umur</label>
    <input type="text" name="umur" class="form-control" id="inputCity">
  </div>
  <div class="form-group col-md-6">
    <label for="inputState">Pekerjaan</label>
      <input type="text" name="pekerjaan" class="form-control" id="inputCity">
  </div>

  </div>
  <div class="from-row">
    <div class="form-group col-md-6">
      <label for="inputState">Agama</label>
      <select class="form-control" name="agama">
        <option value="">Pilih...</option>
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Budha">Budha</option>
        <option value="Hindu">Hindu</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Foto</label>
        <input type="file" name="foto" class="form-control" id="inputCity">
    </div>

  </div>


  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Save </button>
  </div>
  </form>
      </div>
    </div>
  </div>
  <!----TambahRT--->
  <div class="card">
    <div class="card-header" id="headingone">
      <h2 class="mb-0">

      </h2>
    </div>
    <div id="collapseone" class="collapse" aria-labelledby="headingone" data-parent="#accordionExample">
      <div class="card-body">
        <h2 style="text-align:center;">Tambah Kandidat RT</h2>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="/create/kandidatrt">
          @csrf
          <div class="form-group col-md-12">
            <label for="inputEmail4">Nomor Kandidat RT</label>
            <input  type="text" name="no_paslon" class="form-control" id="inputEmail4" >
          </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Nama Kandidat</label>
    <input  type="text" name="nm_rt" class="form-control" id="inputEmail4" >
  </div>
  <div class="form-group col-md-6">
    <label for="inputPassword4">RT</label>
    <select class="form-control" name="rt_id">
      <option value="">Pilih....</option>
      @foreach($data as $data)
      <option value="{{$data->id}}">{{$data->rt}}</option>
      @endforeach
    </select>
  </div>

  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputCity">Umur</label>
    <input type="text" name="umur" class="form-control" id="inputCity">
  </div>
  <div class="form-group col-md-6">
    <label for="inputState">Pekerjaan</label>
      <input type="text" name="pekerjaan" class="form-control" id="inputCity">
  </div>

  </div>
  <div class="from-row">
    <div class="form-group col-md-6">
      <label for="inputState">Agama</label>
      <select class="form-control" name="agama">
        <option value="">Pilih...</option>
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Budha">Budha</option>
        <option value="Hindu">Hindu</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Foto</label>
        <input type="file" name="gambar" class="form-control" id="inputCity">
    </div>

  </div>

  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Save </button>
  </div>
  </form>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection
