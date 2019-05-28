@extends('layouts.dpt')
@section('nav')
<marquee><h2 style="color: white; margin-top: 2px;"><img src="{{url('img/flag.gif')}}" width="30px" height="30px">SISTEM PEMILIHAN RW DAN RT </h2></marquee>
@endsection


@section('content')
@include('sweet::alert')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger" role="alert">
        {{ session('danger') }}
    </div>
@endif

<div class="jumbotron jumbotron-fluid" style="background-color:white">
<div class="container">
<h1 style="border-bottom:solid;" class="display-4">Pilih Kandidat RW</h1><br>
</div>
</div>

<a href="{{url('dpt/pemilihanrt')}}"><button class="btn btn-danger" style="background:darkred; float: right; display: block;"  type="submit">Lanjut <span class="glyphicon glyphicon-chevron-right"></span></button> </a> <br><br>
	<div class="container">
		<center>
			<h1>Kandidat RW {{ Session:: get('rwid')}} :</h1>
			<hr>
			<div class="container" id="small">
				<div class="row">
					<form action="/dpt/voterw" method="post">
						@csrf
					@foreach($data1 as $data)
					<div class="col-md-6" style="margin-bottom: 5px;">
                        <div class="card border-dark mb-4">
                            <div class="card-header text-center mb-5"><h3><b>{{$data->no_paslon}}</b></h3></div>
                            <hr>
                            <div class="card-body text-dark">
                                <div class="row">
                                		<div class="col-md-12 center-block">
	                                         <img src="{{asset('storage/'. $data->foto)}}" width="250px" style="height:250px;" class="img-thumbnail" />
	                                    </div>
                                	
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer bg-transparent border-dark">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6><b>{{$data->nm_rw}}</b></h6>

					                            <label><input name="paslon_rws[]" type="radio" value="{{$data->id}}" />PILIH NO {{$data->no_paslon}}</label>
					                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   <button class="btn btn-danger" style="background:darkred;"  type="submit">Vote</button> 
               </form>
                </div>
            </div>
            <br><hr>      
        </center>
    </div>







@endsection
