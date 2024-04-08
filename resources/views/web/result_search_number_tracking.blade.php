@extends('layouts.app_web')
@section('content')
<div class="container mt-2">
    <h2>Resultados de busqueda</h2>
	<table class="table table-responsive mt-2">
		<thead>
			<tr>
				<th>#trk</th>
				<th>Creacion</th>
				<th>Status</th>
				<th>Actualizacion</th>
			</tr>
		</thead>
		<tbody>
			@forelse($trackins as $trk=>$data )
				<tr>
					<td>{{ $trk }}</td>
					@if($data)
						<td>{{ $data->created_at }}</td>
						<td>{{ $data->status->status }}</td>
						<td>{{ $data->updated_at }}</td>
					@else
						<td colspan="3">Sin resultados</td>
					@endif
				</tr>
			@empty
				<h2>Sin Resultados</h2>
			@endforelse
		</tbody>
	</table>
</div>
@endsection