@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'collectors.detail'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
	        <h1>Ver Recolector</h1>

	        @include('common_parts.collector_information')

        </div>
    </div>
</div>
@endsection
