@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @if(Session::has('alert'))
                <div class="mt-4 text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</div>
            @endif
            
            <div class="card mt-4">
                <div class="card-header">Tracking Control</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('trackingcontrol.find') }}">
                        @csrf
						
						<div class="form-group row">
                            <label for="tracking_number" class="col-md-4 col-form-label text-md-right">#Trk</label>

                            <div class="col-md-6">
                                <input id="tracking_number" type="text" class="form-control @error('tracking_number') is-invalid @enderror" name="tracking_number" value="{{ old('tracking_number') }}" required autofocus>

                                @error('tracking_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Buscar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
