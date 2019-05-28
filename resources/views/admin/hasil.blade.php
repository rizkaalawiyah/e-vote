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
  <a  style="color:black;font-size:18px; background-color:lightgrey;"  class="nav-link " href="#" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Hasil Perhitungan</span></a>
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
<h1 style="border-bottom:solid;" class="display-4">Hasil Perhitungan RW</h1><br>
</div>
</div><hr>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <h2>Hasil Perhitungan RT</h2>
<hr>
      <table class="table" style="border-radius: solid;">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Kandidat</th>
            <th>Nama Kandidat</th>
            <th>RT ID</th>
            <th>Hasil Vote</th>
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
            <td>{{$paslonrt->votes}}</td>
            <td>@if($paslonrt->gambar)
            <img src="{{asset('storage/'.$paslonrt->gambar)}}" width="70px"/>
            @else
            N/A
            @endif
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
        <div class="col-md-6">
      <h2>Hasil Perhitungan RW</h2>
<hr>
      <table class="table" style="border-radius: solid;">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Kandidat</th>
            <th>Nama Kandidat</th>
            <th>RW ID</th>
            <th>Hasil Vote</th>
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
            <td>{{$paslonrw->votes}}</td>
            <td>@if($paslonrw->foto)
            <img src="{{asset('storage/'.$paslonrw->foto)}}" width="70px"/>
            @else
            N/A
            @endif
          </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
</div>
@endsection
