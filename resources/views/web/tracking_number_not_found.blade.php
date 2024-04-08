@extends('layouts.app_web')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        
        <div class="text-center mt-4 py-4">
          <h3>El número {{$tracking_number}} no fue localizado.</h3>
          <a href="/" class="btn btn-primary">Regresar</a>
        </div>      

      </div>
    </div>
  </div>
@endsection