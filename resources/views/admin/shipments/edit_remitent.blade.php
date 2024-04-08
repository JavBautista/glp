@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'shipments.edit.remitent'])
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        @if(Session::has('alert'))
        <p class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</p>
        @endif

        <form action="/admin/shipment/update/remitent" method="post">
          @csrf
          <div class="form-group row">
              <label for="remitent_mail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @if($errors->has('remitent_mail')) is-invalid @endif" id="remitent_mail" name="remitent_mail" value="{{ old('remitent_mail',$shipment->remitent->mail) }}" placeholder="email@example.com">
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
                <input type="text" class="form-control @if($errors->has('remitent_company')) is-invalid @endif" id="remitent_company" name="remitent_company" value="{{ old('remitent_company',$shipment->remitent->company) }}" placeholder="Mi Negocio">
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
                <input type="text" class="form-control @if($errors->has('remitent_name')) is-invalid @endif" id="remitent_name" name="remitent_name" value="{{ old('remitent_name',$shipment->remitent->name) }}" placeholder="Mr. Juan Valdez" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_rfc')) is-invalid @endif" id="remitent_rfc" name="remitent_rfc" value="{{ old('remitent_rfc',$shipment->remitent->rfc) }}" placeholder="RFC o Razon Social">
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
                <input type="text" class="form-control @if($errors->has('remitent_phone')) is-invalid @endif" id="remitent_phone" name="remitent_phone" value="{{ old('remitent_phone',$shipment->remitent->phone) }}" placeholder="7775985421" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_movil')) is-invalid @endif" id="remitent_movil" name="remitent_movil" value="{{ old('remitent_movil',$shipment->remitent->movil) }}" placeholder="7775985421" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_zip_code')) is-invalid @endif" id="remitent_zip_code" name="remitent_zip_code" value="{{ old('remitent_zip_code',$shipment->remitent->zip_code) }}" placeholder="55083" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_address')) is-invalid @endif" id="remitent_address" name="remitent_address" value="{{ old('remitent_address',$shipment->remitent->address) }}" placeholder="Calle" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_number_out')) is-invalid @endif" id="remitent_number_out" name="remitent_number_out" value="{{ old('remitent_number_out',$shipment->remitent->number_out) }}" placeholder="Numero Exterior" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_number_int')) is-invalid @endif" id="remitent_number_int" name="remitent_number_int" value="{{ old('remitent_number_int',$shipment->remitent->number_int) }}" placeholder="Numero Interior">
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
                <input type="text" class="form-control @if($errors->has('remitent_district')) is-invalid @endif" id="remitent_district" name="remitent_district" value="{{ old('remitent_district',$shipment->remitent->district) }}" placeholder="El mirador" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_city')) is-invalid @endif" id="remitent_city" name="remitent_city" value="{{ old('remitent_city',$shipment->remitent->city) }}" placeholder="Puebla" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_state')) is-invalid @endif" id="remitent_state" name="remitent_state" value="{{ old('remitent_state',$shipment->remitent->state) }}" placeholder="Puebla" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_reference')) is-invalid @endif" id="remitent_reference" name="remitent_reference" value="{{ old('remitent_reference',$shipment->remitent->reference) }}" placeholder="Entre que calles" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_detail')) is-invalid @endif" id="remitent_detail" name="remitent_detail" value="{{ old('remitent_detail',$shipment->remitent->detail) }}" placeholder="(Color de fachada y puerta)" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_content')) is-invalid @endif" id="remitent_content" name="remitent_content" value="{{ old('remitent_content',$shipment->remitent->content) }}" placeholder="Contenido" required>
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
                <input type="text" class="form-control @if($errors->has('remitent_declared_value')) is-invalid @endif" id="remitent_declared_value" name="remitent_declared_value" value="{{ old('remitent_declared_value',$shipment->remitent->declared_value) }}" placeholder="Contenido" required>
                @if($errors->has('remitent_declared_value'))
                    @foreach($errors->get('remitent_declared_value') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                    @endforeach
                  @endif
              </div>
          </div>
          <input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
          <input type="hidden" name="remitent_id" value="{{ $shipment->remitent->id }}">

          <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
      </div>

    </div>
</div>
@endsection
