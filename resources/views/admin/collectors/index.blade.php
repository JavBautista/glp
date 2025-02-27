@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'collectors.index'])
<div class="container">
    <admin-collectors></admin-collectors>
</div>
@endsection
