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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                  <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <button class="btn btn-lg btn-block purple-bg" type="submit">
                    Register</button>
                </form>
                <div class="or-box">
                    <a href="{{ route('login') }}"><span class="or"> login </span></a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
