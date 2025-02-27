@extends('layouts.app_admin')
@section('content')
@include('admin.breadcrumb',['item'=>'customers.index'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	@if(Session::has('alert'))
				<p class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert') }}</p>
			@endif
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>  Clientes
                </div>
                <div class="card-body">
                     <a href="/admin/customers/create" class="btn btn-primary">Nuevo Cliente</a>

                     <table class="table table-responsive mt-2">
                     	<thead>
                     		<tr>
                     			<th>Mail</th>
                                <th>Name</th>
                     			<th>RFC</th>
                     			<th>Direccion</th>
                                <th>CP</th>
                     			<th>Ciudad</th>
                     			<th>Estado</th>
                                <th>Estatus</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                     		</tr>
                     	</thead>
                     	 <tbody>
                            @forelse($customers as $customer)

                                <tr>
                                    <td>{{ $customer->mail }}</td>
                                    <td><a href="{{ route('customer.detail',['id'=>$customer->id]) }}">{{ $customer->name }}</a></td>
                                    <td>{{ $customer->rfc }}</td>
                                    <td>{{ $customer->address }} {{ $customer->number_out }} {{ $customer->number_int }} {{ $customer->district }}</td>
                                    <td>{{ $customer->zip_code }}</td>
                                    <td>{{ $customer->city }}</td>
                                    <td>{{ $customer->state }}</td>
                                    <td style="color: {{ $customer->status->status === 'activo' ? 'green' : 'red' }}">
                                        {{ strtoupper($customer->status->status) }}
                                    </td>
                                    <td><a href="{{ route('customer.edit',['id'=>$customer->id]) }}" class="link">[Editar]</a></td>
                                    <td><a href="{{ route('customer.reset-pass',['id'=>$customer->id]) }}" class="link">[Reset Pass]</a></td>
                                    <td><a href="{{ route('customer.edit.status',['id'=>$customer->id]) }}" class="link">[Estatus]</a></td>
                                    <td><a href="{{ route('customer.delete',['id'=>$customer->id]) }}" class="link">[Eliminar]</a></td>
                                </tr>
                            @empty
                                <tr><td colspan="6">Sin Datos que mostrar</td></tr>
                            @endforelse
                     	</tbody>
                     </table>
                     {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
