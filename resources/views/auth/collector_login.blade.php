@extends('layouts.app_login')
@section('login')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card-group mb-0">
        <div class="card p-4">
            <div class="card-body">
                <h1>Autenticación</h1>
                <form method="POST" action="{{ route('collector.login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-addon"><strong> # </strong></span>
                        <input id="trk" type="text" name="trk"  class="form-control{{ $errors->has('trk') ? ' is-invalid' : '' }}" placeholder="E-Mail" value="{{ old('trk',$trk) }}" required>
                        @if ($errors->has('trk'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('trk') }}</strong>
                            </span>
                        @endif
                    </div>
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
                          <button type="submit" class="btn btn-primary px-4">Entrar</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>

    </div>
  </div>
</div>
@endsection
