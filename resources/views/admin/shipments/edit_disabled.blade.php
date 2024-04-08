@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'shipments.edit.disabled'])
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">

        @if(Session::has('alert'))
        <p class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</p>
        @endif


          <form class="form-inline" action="/admin/shipment/update/disabled" method="post">
            @csrf
            <div class="alert alert-warning text-center">
              <h3>¿Realmente desea dar de Baja este Envio?</h3>
              <input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

      </div>

    </div>
</div>
@endsection
