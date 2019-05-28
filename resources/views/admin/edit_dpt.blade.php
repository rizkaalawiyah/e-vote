@extends('layouts.admin')
@section('nav')
<ul class="nav nav-tabs justify-content-center">
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;" class='"btn btn-secondary' href="{{url('admin/index ')}}"> <i class="fas fa-home"></i> <span>Dashboard</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link" href="{{url('admin/kandidat ')}}"><i class="fas fa-user-friends"></i> <span>Kandidat</span></a></a>
</li>
<li class="nav-item">
  <a style="color:black;font-size:18px; background-color:white;"  class="nav-link" href="{{url('admin/dpt ')}}"><i class="fas fa-file"></i> <span>Daftar Pemilih</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link " href="#" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Hasil Perhitungan</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:lightgrey;"  class="nav-link " href="{{url('admin/datart ')}}" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Data RT dan RW</span></a>
</li>
</ul>

@endsection

@section('content')
<div class="jumbotron jumbotron-fluid" style="background-color:white">
<div class="container">
<h1 style="border-bottom:solid;" class="display-4">Edit Daftar Pemilih Tetap</h1><br>
</div>
</div>
<form  method="post" action="/update/{{$datadpt->id}}/datadpt">
  @csrf
<div class="form-row">
<div class="form-group col-md-6">
<label for="nik">NIK</label>
<input  type="text" name="nik" class="form-control" value="{{$datadpt->nik}}" id="nik" >
</div>
<div class="form-group col-md-6">
<label for="nama_dpt">Nama</label>
<input type="text" name="nama_dpt" class="form-control"  value="{{$datadpt->nama_dpt}}" id="nama_dpt" >
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="alamat_dpt">Alamat</label>
<input  type="text" name="alamat_dpt" class="form-control" value="{{$datadpt->alamat_dpt}}" id="alamat_dpt" >
</div>
<div class="form-group col-md-6">
<label for="jns_kelamin">Jenis Kelamin</label>
<input type="text" name="jns_kelamin" class="form-control"  value="{{$datadpt->jns_kelamin}}" id="jns_kelamin" >
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="agama_dpt">Agama</label>
<input type="text" name="agama_dpt" class="form-control"  value="{{$datadpt->agama_dpt}}" id="agama_dpt" >
</div>
      <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">RT</label>
      <select class="form-control" name="rtid">
        <option value="{{$datadpt->rtid}}"></option>

        @foreach($datart as $datart)
        <option value="{{$datart->id}}">{{$datart->rt}}</option>
        @endforeach
      </select>
      </div>
      <div class="form-group col-md-6">
        <label for="inputCity">RW</label>
        <select class="form-control" name="rwid">

          <option value="{{$datadpt->rwid}}"></option>

          @foreach($datarw as $datarw)
          <option value="{{$datarw->id}}">{{$datarw->datarw}}</option>
          @endforeach
        </select>
      </div>
      </div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-warning">Update</button>
</div>
</form>
<div class="card-body">
<table class="table  table-striped table-dark">
        <thead>
          <tr>

            <th>NIK</th>
            <th>Nama</th>
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
                <td>{{$dpt->jns_kelamin}}</td>
                  <td>{{$dpt->alamat_dpt}}</td>
                    <td>{{$dpt->agama_dpt}}</td>
                      <td>{{$dpt->rtid}}</td>
                        <td>{{$dpt->rwid}}</td>
                              <td><a style="background:darkred;" href="/delete/{{$dpt->id}}/rt" class="btn btn-danger">delete</a>
                                <a href="" class="btn btn-info">edit</a>
                            </td>

          </tr>
          @endforeach
        </tbody>
</table>
</div>
<div class="accordion" id="accordionExample">


  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed"  style="font-size:16px; background:black;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Tambah Data
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">

      </div>
    </div>
  </div>
</div>
@endsection
