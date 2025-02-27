@extends('layouts.app_login')
@section('login')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card-group mb-0">
        <div class="card p-4">
            <div class="card-body" style="text-align: center;">
                <img src="{{ asset('og/images/logo.png') }}" alt="#" width="120px" />
                <h3>Ingresar</h3>
                <!--<p class="text-muted">Control de acceso al sistema</p>
-->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-addon"><i class="icon-user"></i></span>
                        <input id="email" type="email" name="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-Mail" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                        @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="row">
                        <div class="col-6">
                          <button type="submit" class="btn btn-primary px-4">Acceder</button>
                        </div>
                        <div class="col-6 text-right">
                          <button type="button" class="btn btn-link px-0">Olvidaste tu password?</button>
                        </div>
                    </div>


                </form>

                <a href="/" target="_blank" class="btn btn-outline-light active mt-3">Regresar a la web</a>
            </div>
        </div>

    </div>
  </div>
</div>
@endsection
