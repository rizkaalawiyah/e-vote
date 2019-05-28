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
  <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link " href="#" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Hasil Perhitungan</span></a>
</li>
<li class="nav-item">
  <a  style="color:black;font-size:18px; background-color:lightgrey;"  class="nav-link " href="{{url('admin/datart')}}" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Data RT dan RW</span></a>
</li>
</ul>

@endsection

@section('content')
<div class="jumbotron jumbotron-fluid" style="background-color:white">
<div class="container">
<h1 style="border-bottom:solid;" class="display-4">Edit RW</h1><br>
</div>
</div>
<form  method="post" action="/update/{{$rw->id}}/datarw">
  @csrf
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputPassword4">RW</label>
<input type="text" name="datarw" class="form-control"  value="{{$rw->datarw}}" id="inputPassword4" >
</div>
<div class="form-group col-md-6">
<label for="inputCity">Kelurahan</label>
<input type="text" name="kelurahanrw"  value="{{$rw->kelurahanrw}}" class="form-control" id="inputCity">
</div>

</div>


<div class="form-row">
<div class="form-group col-md-12">
<label for="inputState">Kecamatan</label>
<input type="text" name="kecamatanrw"  value="{{$rw->kecamatanrw}}" class="form-control" id="inputCity">
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
      <th>No</th>
      <th>Nama RW</th>
      <th>Kelurahan</th>
      <th>Kecamatan</th>
      <th>aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($dataku as $index=> $datarw)
    <tr>
      <td>{{$index+1}}</td>
      <td>{{$datarw->datarw}}</td>
      <td>{{$datarw->kelurahanrw}}</td>
      <td>{{$datarw->kecamatanrw}}</td>
      <td><a style="background:darkred;" href="/delete/{{$datarw->id}}/rt" class="btn btn-danger">delete</a>
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
