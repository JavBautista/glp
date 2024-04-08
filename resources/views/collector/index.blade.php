@extends('layouts.app_collector')
@section('content')
<div class="container">
	@if(Session::has('alert'))
		<p class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</p>
	@endif
	<div class="card my-4">
		<div class="card-header bg-primary text-white">Recollector</div>
		<div class="card-body text-center">
			<h2 class="card-title">Sin pendientes que realizar</h2>
		</div>
	</div>
</div><!--./contanier-->
@endsection
