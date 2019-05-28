@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-6 col-md-offset-8">
            <div class="account-box">
                <div class="logo">
                    <img src="{{url('img/logo.png')}}" alt="" style="width: 200px; margin-left: 75%;" />
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                  <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group">
                                <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <button class="btn btn-lg btn-block purple-bg" type="submit">
                    Sign in</button>
                </form>
                <div class="or-box">
                    <a href="{{ route('register') }}"><span class="or"> Register </span></a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
