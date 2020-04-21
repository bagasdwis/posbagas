@extends('layouts.master_login')

@section('content')
<div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login</p>

      <form action="{{ route('login') }}" method="POST">
        {{csrf_field()}}
        <div class="input-group mb-3">
            <input id="email" type="text" placeholder="Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="input-group mb-3">
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="social-auth-links text mb-3">
      <p class="mb-0">
        @if (Route::has('register'))
          <a class="nav-item" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif                                                       
      </p>
    </div>
    </div>
@endsection
