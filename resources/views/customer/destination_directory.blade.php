@extends('layouts.app_customer')
@section('content')
	<div class="container">
		<a href="/customer/my-contact-information" class="btn btn-dark my-2"> <i class="fa fa-user"></i> Mis Datos</a>
		<customer-envios-clientes></customer-envios-clientes>
	</div>
@endsection
