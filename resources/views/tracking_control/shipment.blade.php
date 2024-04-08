@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>            
            @if(Session::has('alert'))
                <div class="mt-4 text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</div>
            @endif  
            <h3>Bienvenido {{ $user->name }}</h3>                    
            <h4>Folio {{ $shipment->id }} &nbsp;&nbsp; #Trk: {{ $shipment->tracking_number }}</h4>
            <h5>Status: {{ $shipment->status->status }}</h5>
            <h6>Creacion: {{ $shipment->created_at }}</h6>
            <hr>
            <div class="alert alert-info text-center">
                <p>Seleccione el siguiente Estatus del envio</p>
            </div>
            <form  method="POST" action="{{ route('trackingcontrol.update.status') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="status">Estatus</label>
                  </div>
                  <select class="custom-select" id="status" name="status" requiered>
                    <option>Seleccionar...</option>
                    @foreach($shipment_statuses as $status)
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
