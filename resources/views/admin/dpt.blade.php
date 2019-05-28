@extends('layouts.admin')
@section('nav')
<ul class="nav nav-tabs justify-content-center">
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;" class='btn btn-secondary' href="{{url('admin/index ')}}"> <i class="fas fa-home"></i> <span>Dashboard</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link" href="{{url('admin/kandidat')}}"><i class="fas fa-user-friends"></i> <span>Kandidat</span></a></a>
</li>
<li class="nav-item">
  <a style="color:black;font-size:18px; background-color:lightgrey;"  class="nav-link" href="{{url('admin/dpt')}}"><i class="fas fa-file"></i> <span>Daftar Pemilih</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link " href="" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Hasil Perhitungan</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link " href="{{url('admin/datart')}}" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Data RT dan RW</span></a>
</li>
</ul>

@endsection

@section('content')
@include('sweet::alert')
<div class="jumbotron jumbotron-fluid" style="background-color:white">
<div class="container">
<h1 style="border-bottom:solid;" class="display-4">Data Pemilihan Tetap</h1><br>
</div>
</div>
<div class="container-fluid">
  <div class="row">
      <button class="btn btn-link collapsed"  style="font-size:16px; background:black;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      Tambah Data DPT
      </button>

        <h1>Data DPT</h1><hr>
      <table class="table  table-striped table-dark">
        <thead>
          <tr>

            <th>NIK</th>
            <th>Nama</th>
            <th>Usename</th>
         
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>RT</th>
            <th>RW</th>
            <th>aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dpt as $dpt)
          <tr>
            <td>{{$dpt->nik}}</td>
              <td>{{$dpt->nama_dpt}}</td>
                <td>{{$dpt->username}}</td>
                <td>{{$dpt->jns_kelamin}}</td>
                  <td>{{$dpt->alamat_dpt}}</td>
                    <td>{{$dpt->agama_dpt}}</td>
                      <td>{{$dpt->rt}}</td>
                        <td>{{$dpt->datarw}}</td>
                              <td><a style="background:darkred;" href="/delete/{{$dpt->id}}/rt" class="btn btn-danger">delete</a>
                                <a href="/admin/{{$dpt->id}}/editdpt" class="btn btn-info">edit</a>
                            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>

<hr>
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">

      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
          <h1 style="text-align:center;">Tambah Data Daftar Pemilih Tetap</h1> <hr>
      <div class="card-body">
            <form  method="post" action="/create/datadpt">
              @csrf
       <div class="form-row">
      <div class="form-group col-md-12">
        <label for="inputEmail4">FingerPrint ID</label>
        <input style="background-color: lightgrey;"  type="password" name="password" value="12345678" readonly="" class="form-control" id="inputEmail4" >
     <p style="font-size: 8px; color:red;"> <strong> Scan Id Fingerprint Anda!</strong></p>
      </div>
    </div>
      <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">NIK</label>
        <input  type="text" name="nik" class="form-control" id="inputEmail4" >
      </div>
      <div class="form-group col-md-6">
        <label for="inputCity">Nama </label>
        <input type="text" name="nama_dpt" class="form-control" id="inputCity">
      </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-6">
        <label for="username">Username</label>
        <input  type="text" name="username" class="form-control" id="username" >
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Alamat</label>
        <input  type="text" name="alamat_dpt" class="form-control" id="inputEmail4" >
      </div>
  
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
        <label for="inputCity">Jenis Kelamin</label>
        <input type="text" name="jns_kelamin" class="form-control" id="inputCity">
      </div>
      <div class="form-group col-md-6">
        <label for="inputCity">Agama</label>
        <input type="text" name="agama_dpt" class="form-control" id="inputCity">
      </div>
      </div>
  
      <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">RT</label>
      <select class="form-control" name="rtid">
        <option value="">Pilih....</option>
        @foreach($datart as $datart)
        <option value="{{$datart->id}}">{{$datart->rt}}</option>
        @endforeach
      </select>
      </div>
      <div class="form-group col-md-6">
        <label for="inputCity">RW</label>
        <select class="form-control" name="rwid">
          <option value="">Pilih....</option>
          @foreach($datarw as $datarw)
          <option value="{{$datarw->id}}">{{$datarw->datarw}}</option>
          @endforeach
        </select>
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
