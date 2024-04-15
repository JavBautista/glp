@extends('layouts.app_customer')
@section('content')

<div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/customer">Envios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detalle</li>
  </ol>
</nav>
	<br>
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('common_parts.shipment_information')
        </div>
    </div>
</div>
@endsection
