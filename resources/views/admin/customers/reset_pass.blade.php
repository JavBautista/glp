@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'customers.reset-pass'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<div class="card">
        		<div class="card-header">
        			Reset Password para {{$customer->name}}
        		</div>
        		<div class="card-body">
			        <form method="post" action="/admin/customers/update-pass">
						{{ csrf_field() }}
						<input type="hidden" name="customer_id" value="{{$customer->id}}">
						<div class="row mb-3">
		                    <label for="password" class="col-md-4 col-form-label text-md-end">Password<span class="text-danger small">*</span></label>

		                    <div class="col-md-6">
		                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

		                        @if($errors->has('password'))
						            @foreach($errors->get('password') as $error)
						                <div class="invalid-feedback">{{ $error }}</div>
						            @endforeach
						         @endif
						         <small class="form-text text-muted">
						            La contraseña debe tener mínimo 8 caracteres.
						        </small>
		                    </div>
		                </div>

		                <div class="row mb-3">
		                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar Password<span class="text-danger small">*</span></label>

		                    <div class="col-md-6">
		                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
		                    </div>
		                </div>



						<button type="submit" class="btn btn-success btn-block float-right mb-4 ">Actualizar</button>
					</form>

        		</div>
        	</div>



        </div>
    </div>
</div>
@endsection
