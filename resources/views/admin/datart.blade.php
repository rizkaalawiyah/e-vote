@extends('layouts.admin')
@section('nav')
<ul class="nav nav-tabs justify-content-center">
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;" class='"btn btn-secondary' href="{{url('admin/index ')}}"> <i class="fas fa-home"></i> <span>Dashboard</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link" href="{{url('admin/kandidat')}}"><i class="fas fa-user-friends"></i> <span>Kandidat</span></a></a>
</li>
<li class="nav-item">
  <a style="color:black;font-size:18px; background-color:white;"  class="nav-link" href="{{url('admin/dpt')}}"><i class="fas fa-file"></i> <span>Daftar Pemilih</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link " href="{{url('admin/hasil')}}" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Hasil Perhitungan</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:lightgrey;"  class="nav-link " href="{{url('admin/datart  ')}}" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Data RT dan RW</span></a>
</li>
</ul>

@endsection

@section('content')
@include('sweet::alert')
<div class="jumbotron jumbotron-fluid" style="background-color:white">
<div class="container">
<h1 style="border-bottom:solid;" class="display-4">Data RT dan RW</h1><br>
</div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6">
      <button class="btn btn-link collapsed"  style="font-size:16px; background:black;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      Tambah Data RT
      </button>

        <h1>Data RT</h1><hr>
      <table class="table  table-striped table-dark">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama RT</th>
            <th>RW</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $index=> $data)
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$data->rt}}</td>
            <td>{{$data->rw}}</td>
            <td>{{$data->kelurahan}}</td>
            <td>{{$data->kecamatan}}</td>
            <td><a style="background:darkred;" href="/delete/{{$data->id}}/rt" class="btn btn-danger">delete</a>
                <a href="/admin/{{$data->id}}/editrt" class="btn btn-info">edit</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="col-lg-6">
      <button class="btn btn-link collapsed"  style="font-size:16px; background:black;" type="button" data-toggle="collapse" data-target="#collapseone" aria-expanded="false" aria-controls="collapseThree">
      Tambah Data RW
      </button>
      <h1>Data RW</h1><hr>
      <table class="table  table-striped table-dark">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama RW</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($datarw as $index=> $datarw)
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$datarw->datarw}}</td>
            <td>{{$datarw->kelurahanrw}}</td>
            <td>{{$datarw->kecamatanrw}}</td>
            <td><a style="background:darkred;" href="/delete/{{$datarw->id}}/rw" class="btn btn-danger">delete</a>
                <a href="/admin/{{$datarw->id}}/editrw" class="btn btn-info">edit</a>
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
          <h1>Tambah Data RT</h1> <hr>
      <div class="card-body">
        <form  method="post" action="/create/datart">
          @csrf
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Nama RT</label>
    <input  type="text" name="rt" class="form-control" id="inputEmail4" >
  </div>
  <div class="form-group col-md-6">
    <label for="inputPassword4">RW</label>
    <input type="text" name="rw" class="form-control" id="inputPassword4" >
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputCity">Kelurahan</label>
    <input type="text" name="kelurahan" class="form-control" id="inputCity">
  </div>
  <div class="form-group col-md-6">
    <label for="inputState">Kecamatan</label>
      <input type="text" name="kecamatan" class="form-control" id="inputCity">
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

  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
      </h2>
    </div>
    <div id="collapseone" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <h1>Tambah Data RW</h1> <hr>
      <div class="card-body">
        <form  method="post" action="/create/datarw">
          @csrf
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Nama RW</label>
    <input  type="text" name="datarw" class="form-control" id="inputEmail4" >
  </div>
  <div class="form-group col-md-6">
    <label for="inputCity">Kelurahan</label>
    <input type="text" name="kelurahanrw" class="form-control" id="inputCity">
  </div>
  </div>

  <div class="form-row">

  <div class="form-group col-md-12">
    <label for="inputState">Kecamatan</label>
      <input type="text" name="kecamatanrw" class="form-control" id="inputCity">
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
@endsection
