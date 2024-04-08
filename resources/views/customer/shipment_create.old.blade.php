@extends('layouts.app_customer')
@section('content')
	<customer-shipment-create></customer-shipment-create>
<hr>

<div class="container">
	<br>
	<form method="post" action="/customer/shipment/store">
	@csrf
	<div class="card">
		<div class="card-body">

			<div class="row">
				<div class="col-6"><h2>Quien envía?</h2></div>
				<div class="col-6">
					<div class="btn-group float-right" role="group" aria-label="Opciones">
					  <a href="/customer/shipment/selectMeRemitent/1" class="btn btn-dark">Usar mis datos</a>
					  <a href="/customer/shipment/select-destinatary/0" class="btn btn-dark">Limpiar</a>
					</div>
				</div>
			</div>

			<div class="form-group row mt-2">
			    <label for="remitent_mail" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_mail')) is-invalid @endif" id="remitent_mail" name="remitent_mail" value="{{ old('remitent_mail', isset($customer->mail)?$customer->mail:'') }}" placeholder="email@example.com">
			      @if($errors->has('remitent_mail'))
		            @foreach($errors->get('remitent_mail') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>
			<!-- ------------------------------------------------------------------------>
			<div class="form-group row">
			    <label for="remitent_company" class="col-sm-2 col-form-label">Razon Social</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_company')) is-invalid @endif" id="remitent_company" name="remitent_company" value="{{ old('remitent_company', isset($customer->company)?$customer->company:'') }}" placeholder="Mi Negocio">
			      @if($errors->has('remitent_company'))
		            @foreach($errors->get('remitent_company') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="remitent_name" class="col-sm-2 col-form-label">Nombre<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_name')) is-invalid @endif" id="remitent_name" name="remitent_name" value="{{ old('remitent_name', isset($customer->name)?$customer->name:'') }}" placeholder="Mr. Juan Valdez" required>
			      @if($errors->has('remitent_name'))
		            @foreach($errors->get('remitent_name') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>
			<div class="form-group row">
			    <label for="remitent_rfc" class="col-sm-2 col-form-label">RFC</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_rfc')) is-invalid @endif" id="remitent_rfc" name="remitent_rfc" value="{{ old('remitent_rfc', isset($customer->rfc)?$customer->rfc:'') }}" placeholder="RFC o Razon Social">
			      @if($errors->has('remitent_rfc'))
		            @foreach($errors->get('remitent_rfc') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="remitent_phone" class="col-sm-2 col-form-label">Telefono<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_phone')) is-invalid @endif" id="remitent_phone" name="remitent_phone" value="{{ old('remitent_phone', isset($customer->phone)?$customer->phone:'') }}" placeholder="7775985421" required>
			      @if($errors->has('remitent_phone'))
		            @foreach($errors->get('remitent_phone') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>
			<div class="form-group row">
			    <label for="remitent_movil" class="col-sm-2 col-form-label">Movil<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_movil')) is-invalid @endif" id="remitent_movil" name="remitent_movil" value="{{ old('remitent_movil', isset($customer->movil)?$customer->movil:'') }}" placeholder="7775985421" required>
			      @if($errors->has('remitent_movil'))
		            @foreach($errors->get('remitent_movil') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>
			<div class="form-group row">
			    <label for="remitent_zip_code" class="col-sm-2 col-form-label">CP<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_zip_code')) is-invalid @endif" id="remitent_zip_code" name="remitent_zip_code" value="{{ old('remitent_zip_code', isset($customer->zip_code)?$customer->zip_code:'') }}" placeholder="55083" required>
			      @if($errors->has('remitent_zip_code'))
		            @foreach($errors->get('remitent_zip_code') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="remitent_address" class="col-sm-2 col-form-label">Calle<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_address')) is-invalid @endif" id="remitent_address" name="remitent_address" value="{{ old('remitent_address', isset($customer->address)?$customer->address:'') }}" placeholder="Calle" required>
			      @if($errors->has('remitent_address'))
		            @foreach($errors->get('remitent_address') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="remitent_number_out" class="col-sm-2 col-form-label">No Exterior<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_number_out')) is-invalid @endif" id="remitent_number_out" name="remitent_number_out" value="{{ old('remitent_number_out', isset($customer->number_out)?$customer->number_out:'') }}" placeholder="Numero Exterior" required>
			      @if($errors->has('remitent_number_out'))
		            @foreach($errors->get('remitent_number_out') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="remitent_number_int" class="col-sm-2 col-form-label">No Interior</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_number_int')) is-invalid @endif" id="remitent_number_int" name="remitent_number_int" value="{{ old('remitent_number_int', isset($customer->number_int)?$customer->number_int:'') }}" placeholder="Numero Interior">
			      @if($errors->has('remitent_number_int'))
		            @foreach($errors->get('remitent_number_int') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>


			<div class="form-group row">
			    <label for="remitent_district" class="col-sm-2 col-form-label">Colonia<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_district')) is-invalid @endif" id="remitent_district" name="remitent_district" value="{{ old('remitent_district', isset($customer->district)?$customer->district:'') }}" placeholder="El mirador" required>
			      @if($errors->has('remitent_district'))
		            @foreach($errors->get('remitent_district') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="remitent_city" class="col-sm-2 col-form-label">Ciudad<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_city')) is-invalid @endif" id="remitent_city" name="remitent_city" value="{{ old('remitent_city', isset($customer->city)?$customer->city:'') }}" placeholder="Puebla" required>
			      @if($errors->has('remitent_city'))
		            @foreach($errors->get('remitent_city') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="remitent_state" class="col-sm-2 col-form-label">Estado<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_state')) is-invalid @endif" id="remitent_state" name="remitent_state" value="{{ old('remitent_state', isset($customer->state)?$customer->state:'') }}" placeholder="Puebla" required>
			      @if($errors->has('remitent_state'))
		            @foreach($errors->get('remitent_state') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="remitent_reference" class="col-sm-2 col-form-label">Referencia<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_reference')) is-invalid @endif" id="remitent_reference" name="remitent_reference" value="{{ old('remitent_reference', isset($customer->reference)?$customer->reference:'') }}" placeholder="Entre que calles" required>
			      @if($errors->has('remitent_reference'))
		            @foreach($errors->get('remitent_reference') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="remitent_detail" class="col-sm-2 col-form-label">Detalles<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_detail')) is-invalid @endif" id="remitent_detail" name="remitent_detail" value="{{ old('remitent_detail', isset($customer->detail)?$customer->detail:'') }}" placeholder="(Color de fachada y puerta)" required>
			      @if($errors->has('remitent_detail'))
		            @foreach($errors->get('remitent_detail') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="remitent_content" class="col-sm-2 col-form-label">Contenido<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_content')) is-invalid @endif" id="remitent_content" name="remitent_content" value="{{ old('remitent_content','') }}" placeholder="Contenido" required>
			      @if($errors->has('remitent_content'))
		            @foreach($errors->get('remitent_content') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="remitent_declared_value" class="col-sm-2 col-form-label">Valor Declarado<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('remitent_declared_value')) is-invalid @endif" id="remitent_declared_value" name="remitent_declared_value" value="{{ old('remitent_declared_value','') }}" placeholder="Contenido" required>
			      @if($errors->has('remitent_declared_value'))
		            @foreach($errors->get('remitent_declared_value') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-6"><h2>Quien recibe</h2></div>
				<div class="col-6">
					<div class="btn-group float-right" role="group" aria-label="Opciones">
					  <a href="/customer/shipment/destination-directory" class="btn btn-dark">Mis destinos</a>
					  <a href="/customer/shipment/select-destinatary/0" class="btn btn-dark">Limpiar</a>
					</div>
				</div>
			</div>
			<div class="form-group row">
			    <label for="destinatary_mail" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_mail')) is-invalid @endif" id="destinatary_mail" name="destinatary_mail" value="{{ old('destinatary_mail', isset($destinatary->mail)?$destinatary->mail:'') }}" placeholder="email@example.com">
			      @if($errors->has('destinatary_mail'))
		            @foreach($errors->get('destinatary_mail') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>
			<!-- ------------------------------------------------------------------------>

			<div class="form-group row">
			    <label destinatary_for="destinatary_company" class="col-sm-2 col-form-label">Razon Social</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_company')) is-invalid @endif" id="destinatary_company" name="destinatary_company" value="{{ old('destinatary_company', isset($destinatary->company)?$destinatary->company:'') }}" placeholder="Negocio">
			      @if($errors->has('destinatary_company'))
		            @foreach($errors->get('destinatary_company') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>
			<div class="form-group row">
			    <label destinatary_for="destinatary_name" class="col-sm-2 col-form-label">Nombre<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_name')) is-invalid @endif" id="destinatary_name" name="destinatary_name" value="{{ old('destinatary_name', isset($destinatary->name)?$destinatary->name:'') }}" placeholder="Mr. Juan Valdez" required>
			      @if($errors->has('destinatary_name'))
		            @foreach($errors->get('destinatary_name') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>
			<div class="form-group row">
			    <label for="destinatary_rfc" class="col-sm-2 col-form-label">RFC</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_rfc')) is-invalid @endif" id="destinatary_rfc" name="destinatary_rfc" value="{{ old('destinatary_rfc', isset($destinatary->rfc)?$destinatary->rfc:'') }}" placeholder="RFC o Razon Social">
			      @if($errors->has('destinatary_rfc'))
		            @foreach($errors->get('destinatary_rfc') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_department" class="col-sm-2 col-form-label">Departamento</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_department')) is-invalid @endif" id="destinatary_department" name="destinatary_department" value="{{ old('destinatary_department', isset($destinatary->department)?$destinatary->department:'') }}" placeholder="Atecnción o departamento">
			      @if($errors->has('destinatary_department'))
		            @foreach($errors->get('destinatary_department') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label destinatary_for="phone" class="col-sm-2 col-form-label">Telefono<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_phone')) is-invalid @endif" id="destinatary_phone" name="destinatary_phone" value="{{ old('destinatary_phone', isset($destinatary->phone)?$destinatary->phone:'') }}" placeholder="7775985421" required>
			      @if($errors->has('destinatary_phone'))
		            @foreach($errors->get('destinatary_phone') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_movil" class="col-sm-2 col-form-label">Movil<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_movil')) is-invalid @endif" id="destinatary_movil" name="destinatary_movil" value="{{ old('destinatary_movil', isset($destinatary->movil)?$destinatary->movil:'') }}" placeholder="7775985421" required>
			      @if($errors->has('destinatary_movil'))
		            @foreach($errors->get('destinatary_movil') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_zip_code" class="col-sm-2 col-form-label">CP<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_zip_code')) is-invalid @endif" id="destinatary_zip_code" name="destinatary_zip_code" value="{{ old('destinatary_zip_code', isset($destinatary->zip_code)?$destinatary->zip_code:'') }}" placeholder="55083" required>
			      @if($errors->has('destinatary_zip_code'))
		            @foreach($errors->get('destinatary_zip_code') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_address" class="col-sm-2 col-form-label">Calle<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_address')) is-invalid @endif" id="destinatary_address" name="destinatary_address" value="{{ old('destinatary_address', isset($destinatary->address)?$destinatary->address:'') }}" placeholder="Calle" required>
			      @if($errors->has('destinatary_address'))
		            @foreach($errors->get('destinatary_address') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_number_out" class="col-sm-2 col-form-label">No Exterior<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_number_out')) is-invalid @endif" id="destinatary_number_out" name="destinatary_number_out" value="{{ old('destinatary_number_out', isset($destinatary->number_out)?$destinatary->number_out:'') }}" placeholder="Numero Exterior" required>
			      @if($errors->has('destinatary_number_out'))
		            @foreach($errors->get('destinatary_number_out') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_number_int" class="col-sm-2 col-form-label">No Interior</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_number_int')) is-invalid @endif" id="destinatary_number_int" name="destinatary_number_int" value="{{ old('destinatary_number_int', isset($destinatary->number_int)?$destinatary->number_int:'') }}" placeholder="Numero Interior">
			      @if($errors->has('destinatary_number_int'))
		            @foreach($errors->get('destinatary_number_int') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>


			<div class="form-group row">
			    <label for="destinatary_district" class="col-sm-2 col-form-label">Colonia<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_district')) is-invalid @endif" id="destinatary_district" name="destinatary_district" value="{{ old('destinatary_district', isset($destinatary->district)?$destinatary->district:'') }}" placeholder="El mirador" required>
			      @if($errors->has('destinatary_district'))
		            @foreach($errors->get('destinatary_district') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_city" class="col-sm-2 col-form-label">Ciudad<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_city')) is-invalid @endif" id="destinatary_city" name="destinatary_city" value="{{ old('destinatary_city', isset($destinatary->city)?$destinatary->city:'') }}" placeholder="Puebla" required>
			      @if($errors->has('destinatary_city'))
		            @foreach($errors->get('destinatary_city') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_state" class="col-sm-2 col-form-label">Estado<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_state')) is-invalid @endif" id="destinatary_state" name="destinatary_state" value="{{ old('destinatary_state', isset($destinatary->state)?$destinatary->state:'') }}" placeholder="Puebla" required>
			      @if($errors->has('destinatary_state'))
		            @foreach($errors->get('destinatary_state') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_reference" class="col-sm-2 col-form-label">Referencia<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_reference')) is-invalid @endif" id="destinatary_reference" name="destinatary_reference" value="{{ old('destinatary_reference', isset($destinatary->reference)?$destinatary->reference:'') }}" placeholder="Entre que calles" required>
			      @if($errors->has('destinatary_reference'))
		            @foreach($errors->get('destinatary_reference') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_detail" class="col-sm-2 col-form-label">Detalles<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_detail')) is-invalid @endif" id="destinatary_detail" name="destinatary_detail" value="{{ old('destinatary_detail', isset($destinatary->detail)?$destinatary->detail:'') }}" placeholder="(Color de fachada y puerta)" required>
			      @if($errors->has('destinatary_detail'))
		            @foreach($errors->get('destinatary_detail') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_weight" class="col-sm-2 col-form-label">Peso<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_weight')) is-invalid @endif" id="destinatary_weight" name="destinatary_weight" value="{{ old('destinatary_weight','') }}" placeholder="(Color de fachada y puerta)" required>
			      @if($errors->has('destinatary_weight'))
		            @foreach($errors->get('destinatary_weight') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>

			<div class="form-group row">
			    <label for="destinatary_unit_measure" class="col-sm-2 col-form-label">Unidad de Medida<span class="text-danger small">*</span></label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control @if($errors->has('destinatary_unit_measure')) is-invalid @endif" id="destinatary_unit_measure" name="destinatary_unit_measure" value="{{ old('destinatary_unit_measure','') }}" placeholder="Caja, bolsa, sobre, paquete, etc." required>
			      @if($errors->has('destinatary_unit_measure'))
		            @foreach($errors->get('destinatary_unit_measure') as $error)
		                <div class="invalid-feedback">{{ $error }}</div>
		            @endforeach
		          @endif
			    </div>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-xl btn-dark mb-4 float-right">Guardar</button>
	</form>
</div><!--./container-->
@endsection
