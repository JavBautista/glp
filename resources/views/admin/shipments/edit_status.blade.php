@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'shipments.edit.status'])
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        @if(Session::has('alert'))
        <p class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</p>
        @endif

        <form class="form" action="/admin/shipment/update/status" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="my-1 mr-2" for="status">Status</label>
            <select class="custom-select my-1 mr-sm-2" id="status" name="status">
            @foreach($statuses as $status)
              <option value='{{$status->id}}' {{ ($shipment->status->id == $status->id)?'selected':''}}>{{ $status->status }}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="commentary">Comentario</label>
              <textarea class="form-control" id="commentary" name="commentary" rows="3"></textarea>
            </div>
          <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image" aria-describedby="inputGroupFileAddonMainImage">Adjuntar acuse o prueba de entrega.</label>
              </div>
          </div>

          <input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

    </div>
</div>
@endsection
