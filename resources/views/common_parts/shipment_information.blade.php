<div class="row">
	<div class="col-md-12">
		<div class="alert alert-dark text-center">
			<h4><em>#Num. Rastreo {{ $shipment->tracking_number }}</em></h4>
			<h5 class="small">Folio.{{ $shipment->id }}  Status: {{ $shipment->status->status }} | Costo: {{ $shipment->cost }} | Creación: {{ $shipment->created_at }}</h5>
		</div>

	</div>
</div>
	<div class="card">
		<div class="card-header">Quien envía</div>
		<div class="card-body">
			<div class="row">
				<div class="col-6">
					<dl class="row">
						<dt class="col-sm-4">Mail</dt>
						<dd class="col-sm-8">{{ $shipment->remitent->mail }}</dd>
						<dt class="col-sm-4">Razón Social</dt>
						<dd class="col-sm-8">{{ $shipment->remitent->company }}</dd>
						<dt class="col-sm-4">Nombre</dt>
						<dd class="col-sm-8">{{ $shipment->remitent->name }}</dd>
						<dt class="col-sm-4">RFC</dt>
						<dd class="col-sm-8">{{ $shipment->remitent->rfc }}</dd>
						<dt class="col-sm-4">Telefono</dt>
						<dd class="col-sm-8">{{ $shipment->remitent->phone }}</dd>
						<dt class="col-sm-4">Movil</dt>
						<dd class="col-sm-8">{{ $shipment->remitent->movil }}</dd>
					</dl>
				</div>
				<div class="col-6">
					<dl class="row">
						<dt class="col-sm-4">Dirección</dt>
						<dd class="col-sm-8">{{ $shipment->remitent->address }} Ext. {{ $shipment->remitent->number_out }} Int. {{ $shipment->remitent->number_int }} <br>
							CP {{ $shipment->remitent->zip_code }}, {{ $shipment->remitent->district }} <br>
							{{ $shipment->remitent->city }}, {{ $shipment->remitent->state }}.
						</dd>
						<dt class="col-sm-4">Referencia</dt>
						<dd class="col-sm-8">{{ $shipment->remitent->reference }}</dd>
						<dt class="col-sm-4">Detalle</dt>
						<dd class="col-sm-8">{{ $shipment->remitent->detail }}</dd>
						<dt class="col-sm-4">Contenido</dt>
						<dd class="col-sm-8">{{ $shipment->remitent->content }}</dd>
						<dt class="col-sm-4">Valor declarado</dt>
						<dd class="col-sm-8">{{ $shipment->remitent->declared_value }}</dd>

					</dl>
				</div>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="card-header">Quien recibe</div>
		<div class="card-body">
			<div class="row">
				<div class="col-6">
					<dl class="row">
						<dt class="col-sm-4">Mail</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->mail }}</dd>
						<dt class="col-sm-4">Razón Social</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->company }}</dd>
						<dt class="col-sm-4">Nombre</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->name }}</dd>
						<dt class="col-sm-4">Atencion/Depto.</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->department }}</dd>
						<dt class="col-sm-4">RFC</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->rfc }}</dd>
						<dt class="col-sm-4">Telefono</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->phone }}</dd>
						<dt class="col-sm-4">Movil</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->movil }}</dd>
					</dl>
				</div>
				<div class="col-6">
					<dl class="row">
						<dt class="col-sm-4">Dirección</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->address }} Ext. {{ $shipment->destinatary->number_out }} Int. {{ $shipment->destinatary->number_int }} <br>
							CP {{ $shipment->destinatary->zip_code }}, {{ $shipment->destinatary->district }} <br>
							{{ $shipment->destinatary->city }}, {{ $shipment->destinatary->state }}.
						</dd>
						<dt class="col-sm-4">Referencia</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->reference }}</dd>
						<dt class="col-sm-4">Detalle</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->detail }}</dd>

						<dt class="col-sm-10 text-danger"><em>*Peso y Unidad de medida solo se usa en envios pasados.</em></dt>
						<dd class="col-sm-2"></dd>

						<dt class="col-sm-4">Peso</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->weight }}</dd>
						<dt class="col-sm-4">Unidad de Medida</dt>
						<dd class="col-sm-8">{{ $shipment->destinatary->unit_measure }}</dd>

					</dl>
				</div>
			</div>
		</div>
	</div>

	@if($shipment->packages)
		<div class="card">
			<div class="card-body">
				<h4>Paquetes</h4>
				<table class="table">
					<thead>
              <tr>
                <th>Descripcion</th>
                <th>Qty</th>
                <th>Peso</th>
                <th>Long.</th>
                <th>Ancho</th>
                <th>Altura</th>
              </tr>
            </thead>
            <tbody>
							@foreach ($shipment->packages as $pack)
								<tr>
		                <td>{{ $pack->description }}</td>
		                <td>{{ $pack->qty }}</td>
		                <td>{{ $pack->weight }}</td>
		                <td>{{ $pack->length }}</td>
		                <td>{{ $pack->width }}</td>
		                <td>{{ $pack->height }}</td>
		            </tr>
							@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endif



<div class="row mt-2">
	<div class="col-12">
		<div class="jumbotron">
		<h3>Actualizaciones</h3>
		<table class="table">
              @forelse($shipment->history as $history)
                <tr class="small">
                  <td>{{$history->created_at}}</td>
                  <td>{{$history->status}}</td>
                  <td>{{$history->description}}</td>
                  <td>{{$history->comentary}}</td>
                  <td>
                  	@if($history->image!=NULL)
                  		<a href="/images/shipments/{{$history->image}}" target="_blank" class="btn btn-info"><span class="fa fa-image"></span></a>
                  	@endif
                  </td>
                </tr>
              @empty
                  <tr>
                    <td>Sin Datos que mostrar</td>
                  </tr>
              @endforelse
        </table>
        </div>
	</div>
</div>