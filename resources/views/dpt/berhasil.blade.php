@extends('layouts.app')

@section('content')
<div class="container">
  @if(\Session::has('alert'))
                        <div class="alert alert-danger">
                            <div>{{ Session::get('alert') }}</div>
                        </div>
                    @endif
                    @if(\Session::has('alert-success'))
                        <div class="alert alert-success">
                            <div>{{ Session::get('alert-success') }}</div>
                        </div>
                    @endif
    <div class="row justify-content-center">
         <div class="col-md-6 col-md-offset-8">
            <div class="account-box">
                <div class="logo">
                    <img src="{{url('img/logo.png')}}" alt="" style="width: 200px; margin-left: 75%;" />
                </div>
              
                <div class="card-body">
                    <form method="POST" action="/dpt/login">
                        @csrf

                    
                    <h1 style="text-align: center;">Silahkan Scan FingerPrint Anda</h1>
                    <center>
                    <img src="{{url('img/finger.png')}}" width="100px" height="100px">
                    </center>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
