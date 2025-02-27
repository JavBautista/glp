@extends('layouts.app_customer')
@section('content')
<div class="container">
  @if(Session::has('alert'))
		<p class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</p>
	@endif

  <envios></envios>


</div><!--./contanier-->
@endsection
