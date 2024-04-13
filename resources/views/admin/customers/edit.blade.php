@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'customers.edit'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<div class="card">
        		<div class="card-header">
        			Editar datos de {{$customer->name}}
        		</div>
        		<div class="card-body">

					<div class="alert alert-success text-center">
						<h4>{{  strtoupper($customer->status->status)}}</h4>
					</div>
			        <form method="post" action="/admin/customers/update">
						{{ csrf_field() }}
						<input type="hidden" name="customer_id" value="{{$customer->id}}">

						<div class="form-group row">
						    <label for="mail" class="col-sm-2 col-form-label">Email<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <p>{{ $customer->mail }}</p>
						    </div>
						</div>
						<!-- ------------------------------------------------------------------------>
						<div class="form-group row">
						    <label for="company" class="col-sm-2 col-form-label">Razon Social<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('company')) is-invalid @endif" id="company" name="company" value="{{ old('company',$customer->company) }}" placeholder="Negocio">
						      @if($errors->has('company'))
					            @foreach($errors->get('company') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="name" class="col-sm-2 col-form-label">Nombre<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" name="name" value="{{ old('name',$customer->name) }}" placeholder="Mr. Juan Valdez" required>
						      @if($errors->has('name'))
					            @foreach($errors->get('name') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="rfc" class="col-sm-2 col-form-label">RFC<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('rfc')) is-invalid @endif" id="rfc" name="rfc" value="{{ old('rfc',$customer->rfc) }}" placeholder="RFC o Razon Social" required>
						      @if($errors->has('rfc'))
					            @foreach($errors->get('rfc') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="phone" class="col-sm-2 col-form-label">Telefono<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('phone')) is-invalid @endif" id="phone" name="phone" value="{{ old('phone',$customer->phone) }}" placeholder="7775985421" required>
						      @if($errors->has('phone'))
					            @foreach($errors->get('phone') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="movil" class="col-sm-2 col-form-label">Movil<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('movil')) is-invalid @endif" id="movil" name="movil" value="{{ old('movil',$customer->movil) }}" placeholder="7775985421" required>
						      @if($errors->has('movil'))
					            @foreach($errors->get('movil') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="zip_code" class="col-sm-2 col-form-label">CP<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('zip_code')) is-invalid @endif" id="zip_code" name="zip_code" value="{{ old('zip_code',$customer->zip_code) }}" placeholder="55083" required>
						      @if($errors->has('zip_code'))
					            @foreach($errors->get('zip_code') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="address" class="col-sm-2 col-form-label">Calle<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('address')) is-invalid @endif" id="address" name="address" value="{{ old('address',$customer->address) }}" placeholder="Calle" required>
						      @if($errors->has('address'))
					            @foreach($errors->get('address') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="number_out" class="col-sm-2 col-form-label">No Exterior<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('number_out')) is-invalid @endif" id="number_out" name="number_out" value="{{ old('number_out',$customer->number_out) }}" placeholder="Numero Exterior" required>
						      @if($errors->has('number_out'))
					            @foreach($errors->get('number_out') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="number_int" class="col-sm-2 col-form-label">No Interior</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('number_int')) is-invalid @endif" id="number_int" name="number_int" value="{{ old('number_int',$customer->number_int) }}" placeholder="Numero Interior (opcional)">
						      @if($errors->has('number_int'))
					            @foreach($errors->get('number_int') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>


						<div class="form-group row">
						    <label for="district" class="col-sm-2 col-form-label">Colonia<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('district')) is-invalid @endif" id="district" name="district" value="{{ old('district',$customer->district) }}" placeholder="El mirador" required>
						      @if($errors->has('district'))
					            @foreach($errors->get('district') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="city" class="col-sm-2 col-form-label">Ciudad<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('city')) is-invalid @endif" id="city" name="city" value="{{ old('city',$customer->city) }}" placeholder="Puebla" required>
						      @if($errors->has('city'))
					            @foreach($errors->get('city') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="state" class="col-sm-2 col-form-label">Estado<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('state')) is-invalid @endif" id="state" name="state" value="{{ old('state',$customer->state) }}" placeholder="Puebla" required>
						      @if($errors->has('state'))
					            @foreach($errors->get('state') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="reference" class="col-sm-2 col-form-label">Referencia<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('reference')) is-invalid @endif" id="reference" name="reference" value="{{ old('reference',$customer->reference) }}" placeholder="Entre que calles" required>
						      @if($errors->has('reference'))
					            @foreach($errors->get('reference') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="detail" class="col-sm-2 col-form-label">Detalles<span class="text-danger small">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('detail')) is-invalid @endif" id="detail" name="detail" value="{{ old('detail',$customer->detail) }}" placeholder="(Color de fachada y puerta)" required>
						      @if($errors->has('detail'))
					            @foreach($errors->get('detail') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<div class="form-group row">
						    <label for="observations" class="col-sm-2 col-form-label">Obervaciones</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control @if($errors->has('observations')) is-invalid @endif" id="observations" name="observations" value="{{ old('observations',$customer->observations) }}" placeholder="Obervaciones opcionales acerca del cliente">
						      @if($errors->has('observations'))
					            @foreach($errors->get('observations') as $error)
					                <div class="invalid-feedback">{{ $error }}</div>
					            @endforeach
					          @endif
						    </div>
						</div>

						<button type="submit" class="btn btn-success btn-block float-right mb-4 ">Guardar</button>
					</form>
        		</div>
        	</div>


        </div>
    </div>
</div>
@endsection
