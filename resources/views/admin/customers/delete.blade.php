@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'customers.delete'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
	        <h1>Eliminar Datos Cliente</h1>

			<div class="alert alert-danger text-center">
				<p>¿Realmente desea elimnar el cliente?</p>
				<p>Una vez realizada esta acción se elimnara permanentemente de la base de datos y no podrá recuperarla.</p>
		        <form method="post" action="/admin/customers/destroy">
					@csrf
					<input type="hidden" name="customer_id" value="{{$customer->id}}">
					<button type="submit" class="btn btn-danger btn-block mb-4 ">Eliminar</button>
				</form>
			</div>

        </div>
    </div>
</div>
@endsection
