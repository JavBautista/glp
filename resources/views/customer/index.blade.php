@extends('layouts.app_customer')
@section('content')
<div class="container">
  @if(Session::has('alert'))
		<p class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</p>
	@endif

  <envios></envios>
  <!--
  <div class="row mb-2">
    <div class="col-6">
	     <h3>Mis Envios</h3>
    </div>
    <div class="col-6">
      <form action="/customer/search-shipments">

        <div class="input-group mb-3">
          @ csrf
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon2">Buscar</span>
          </div>
          <input type="text" class="form-control" name="search-customer-shipments" placeholder="Ingrese #Trk o palabra clave." aria-describedby="button-addon2" required>
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Enviar</button>
            <a href="#" class="btn btn-outline-secondary">Borrar</a>
          </div>
        </div>
      </form>

    </div>
  </div>
-->

</div><!--./contanier-->
@endsection
