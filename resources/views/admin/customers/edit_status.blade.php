@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'customers.edit.status'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
	        <h1>Editar Estatus de Cliente</h1>
			<div class="alert alert-warning text-center">
				<h3>Estatus actual: {{$customer->status->status}}</h3>
				<p>¿Realmente desea cambiar el Estatus del cliente?</p>
			</div>
	        <form method="post" action="/admin/customers/update-status">
				@csrf
				<input type="hidden" name="customer_id" value="{{$customer->id}}">
				<div class="form-group">
	                <label for="status">Status</label>
	                <select class="form-control" id="status" name="status">
	                  @foreach($statuses as $status)
	                    <option value="{{$status->id}}" {{ $status->id==$customer->status->id?'selected':''}} >{{$status->status}}</option>
	                  @endforeach
	                </select>
              	</div>

				<button type="submit" class="btn btn-success btn-block float-right mb-4 ">Guardar</button>
			</form>

        </div>
    </div>
</div>
@endsection
