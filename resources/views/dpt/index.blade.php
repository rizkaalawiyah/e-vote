@extends('layouts.dpt')
@section('nav')
<marquee><h2 style="color: white; margin-top: 2px;"><img src="{{url('img/flag.gif')}}" width="30px" height="30px">SISTEM PEMILIHAN RW DAN RT </h2></marquee>
@endsection

@section('content')
@include('sweet::alert')

<div class="jumbotron jumbotron-fluid" style="background-color:white">
<div class="container">
   @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <div>{{ Session::get('success') }}</div>
                        </div>
                    @endif
                    @if(\Session::has('alert-success'))
                        <div class="alert alert-success">
                            <div>{{ Session::get('alert-success') }}</div>
                        </div>
                    @endif
<h1 style="border-bottom:solid;" class="display-4">Data Personal Anda:</h1><br>
</div>
</div>
<div class="container-fluid justify-content-center">
  <div class="row ml-5">

                      <div class="container-fluid" style="margin-left: 50px; margin-right: 100px; background-color:#525252; border-radius:10px;border-style:solid; border-color:lightblue;height:100%;  color: white;">
                        <div class="row">
                          <div class="col-12">

                          <article class="part card-details">
                            <div class="card">
                              <table class="table " style="font-size:14px;">
                                        <thead>

                                        </thead>
                                        <tbody>

                                          <tr>
                                            <th style="width:30px;" scope="row">NIK</th>
                                            <td>:</td>
                                            <td>{{ Session::get('nik') }} </td>

                                          </tr>
                                          <tr>
                                            <th scope="row">Nama</th>
                                            <td>:</td>
                                            <td>{{ Session::get('nama_dpt') }} </td>

                                          </tr>
                                          <tr>
                                            <th scope="row">Alamat</th>
                                              <td>:</td>
                                            <td>{{ Session::get('alamat_dpt') }}  </td>

                                          </tr>
                                          <tr>
                                            <th scope="row">Jenis Kelamin</th>
                                                <td>:</td>
                                        <td>{{ Session::get('jns_kelamin') }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Agama</th>
                                              <td>:</td>
                                            <td>{{ Session::get('agama_dpt') }}</td>

                                          </tr>
                                          <tr>
                                            <th  scope="row">RW</th>
                                              <td>:</td>
                                            <td >{{ Session::get('rwid') }}</td>

                                          </tr>
                                          <tr>
                                            <th  scope="row">RT</th>
                                              <td>:</td>
                                            <td >{{ Session::get('rtid') }}</td>
                                          </tr>


                                        </tbody>
                                      </table>


                            </div>
                            <hr>

                            </article>


    </div>

                                <div class="col-md-5">
                              <a href="{{url('dpt/pemilihan ')}}" class="btn btn-info ">Mulai Memilih</a>
                            </div>
    </div>
  </div>
</div>
</div>





@endsection
