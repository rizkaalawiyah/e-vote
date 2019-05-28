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
                <h1 style="text-align:center;">Login DPT</h1><hr>
                <div class="card-body">
                    <form method="POST" action="/dpt/login">
                        @csrf

                  <div class="form-group">
                    <input type="text" name="username" class="form-control" value="" placeholder="Username">
                </div>

                <div class="form-group">
                <input type="password" name="password" value="12345678" readonly="" class="form-control" placeholder="Password">
                </div>
                <button class="btn btn-lg btn-block purple-bg" type="submit">
                    Sign in</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
