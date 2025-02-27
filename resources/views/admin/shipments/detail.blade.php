@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'shipments.detail'])
<div class="container-fluid">
	@if(Session::has('alert'))
        <p class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</p>
    @endif
    @include('admin.shipments.options')
	@include('common_parts.shipment_information')
</div>
@endsection
