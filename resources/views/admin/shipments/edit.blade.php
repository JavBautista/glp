@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'shipments.edit'])
<div class="container-fluid">
    <div class="row justify-content-center">

      <div class="col-md-10">
        @include('common_parts.shipment_information')
      </div>

    </div>
</div>
@endsection
