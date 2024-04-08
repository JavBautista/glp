@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'shipments.index'])
<div class="container-fluid">
    <admin-envios></admin-envios>
</div>
@endsection
