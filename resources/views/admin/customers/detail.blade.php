@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'customers.detail'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
	        <h1>Ver Cliente</h1>

	        @include('common_parts.customer_information')

        </div>
    </div>
</div>
@endsection
