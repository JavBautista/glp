@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'shipments.edit.cost'])
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        @if(Session::has('alert'))
        <p class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</p>
        @endif
        <form class="form-inline" action="/admin/shipment/update/cost" method="post">
          @csrf
          <label class="my-1 mr-2"  for="cost">Cost</label>
          <input type="number" min="0" step=".01" class="form-control my-1 mr-2" id="cost" name="cost" placeholder="Ingrese un costo" value="{{ $shipment->cost }}">
          <input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

    </div>
</div>
@endsection
