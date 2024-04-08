@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'shipments.edit.destinatary'])
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        @if(Session::has('alert'))
        <p class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</p>
        @endif

        <form action="/admin/shipment/update/destinatary" method="post">
          @csrf
          <div class="form-group row">
              <label for="destinatary_mail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @if($errors->has('destinatary_mail')) is-invalid @endif" id="destinatary_mail" name="destinatary_mail" value="{{ old('destinatary_mail',$shipment->destinatary->mail) }}" placeholder="email@example.com">
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
                <input type="text" class="form-control @if($errors->has('destinatary_company')) is-invalid @endif" id="destinatary_company" name="destinatary_company" value="{{ old('destinatary_company',$shipment->destinatary->company) }}" placeholder="Negocio">
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
                <input type="text" class="form-control @if($errors->has('destinatary_name')) is-invalid @endif" id="destinatary_name" name="destinatary_name" value="{{ old('destinatary_name',$shipment->destinatary->name) }}" placeholder="Mr. Juan Valdez" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_rfc')) is-invalid @endif" id="destinatary_rfc" name="destinatary_rfc" value="{{ old('destinatary_rfc',$shipment->destinatary->rfc) }}" placeholder="RFC o Razon Social">
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
                <input type="text" class="form-control @if($errors->has('destinatary_department')) is-invalid @endif" id="destinatary_department" name="destinatary_department" value="{{ old('destinatary_department',$shipment->destinatary->department) }}" placeholder="Atecnción o departamento">
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
                <input type="text" class="form-control @if($errors->has('destinatary_phone')) is-invalid @endif" id="destinatary_phone" name="destinatary_phone" value="{{ old('destinatary_phone',$shipment->destinatary->phone) }}" placeholder="7775985421" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_movil')) is-invalid @endif" id="destinatary_movil" name="destinatary_movil" value="{{ old('destinatary_movil',$shipment->destinatary->movil) }}" placeholder="7775985421" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_zip_code')) is-invalid @endif" id="destinatary_zip_code" name="destinatary_zip_code" value="{{ old('destinatary_zip_code',$shipment->destinatary->zip_code) }}" placeholder="55083" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_address')) is-invalid @endif" id="destinatary_address" name="destinatary_address" value="{{ old('destinatary_address',$shipment->destinatary->address) }}" placeholder="Calle" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_number_out')) is-invalid @endif" id="destinatary_number_out" name="destinatary_number_out" value="{{ old('destinatary_number_out',$shipment->destinatary->number_out) }}" placeholder="Numero Exterior" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_number_int')) is-invalid @endif" id="destinatary_number_int" name="destinatary_number_int" value="{{ old('destinatary_number_int',$shipment->destinatary->number_int) }}" placeholder="Numero Interior">
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
                <input type="text" class="form-control @if($errors->has('destinatary_district')) is-invalid @endif" id="destinatary_district" name="destinatary_district" value="{{ old('destinatary_district',$shipment->destinatary->district) }}" placeholder="El mirador" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_city')) is-invalid @endif" id="destinatary_city" name="destinatary_city" value="{{ old('destinatary_city',$shipment->destinatary->city) }}" placeholder="Puebla" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_state')) is-invalid @endif" id="destinatary_state" name="destinatary_state" value="{{ old('destinatary_state',$shipment->destinatary->state) }}" placeholder="Puebla" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_reference')) is-invalid @endif" id="destinatary_reference" name="destinatary_reference" value="{{ old('destinatary_reference',$shipment->destinatary->reference) }}" placeholder="Entre que calles" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_detail')) is-invalid @endif" id="destinatary_detail" name="destinatary_detail" value="{{ old('destinatary_detail',$shipment->destinatary->detail) }}" placeholder="(Color de fachada y puerta)" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_weight')) is-invalid @endif" id="destinatary_weight" name="destinatary_weight" value="{{ old('destinatary_weight',$shipment->destinatary->weight) }}" placeholder="(Color de fachada y puerta)" required>
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
                <input type="text" class="form-control @if($errors->has('destinatary_unit_measure')) is-invalid @endif" id="destinatary_unit_measure" name="destinatary_unit_measure" value="{{ old('destinatary_unit_measure',$shipment->destinatary->unit_measure) }}" placeholder="Caja, bolsa, sobre, paquete, etc." required>
                @if($errors->has('destinatary_unit_measure'))
                    @foreach($errors->get('destinatary_unit_measure') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                    @endforeach
                  @endif
              </div>
          </div>
          <input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
          <input type="hidden" name="destinatary_id" value="{{ $shipment->destinatary->id }}">
          <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
      </div>

    </div>
</div>
@endsection
