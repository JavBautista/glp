<div class="card">
	<div class="card-header">
		Datos del Cliente
	</div>
	<div class="card-body">

			<div class="row">
				<div class="col-6">
					<dl class="row">
						<dt class="col-sm-5">Mail</dt>
						<dd class="col-sm-7">{{ $customer->mail }}</dd>
						<dt class="col-sm-5">Razón Social</dt>
						<dd class="col-sm-7">{{ $customer->company }}</dd>
						<dt class="col-sm-5">Nombre</dt>
						<dd class="col-sm-7">{{ $customer->name }}</dd>
						<dt class="col-sm-5">RFC</dt>
						<dd class="col-sm-7">{{ $customer->rfc }}</dd>
						<dt class="col-sm-5">Telefono</dt>
						<dd class="col-sm-7">{{ $customer->phone }}</dd>
						<dt class="col-sm-5">Movil</dt>
						<dd class="col-sm-7">{{ $customer->movil }}</dd>
					</dl>

				</div>
				<div class="col-6">
					<dl class="row">

						<dt class="col-sm-5">Dirección</dt>
						<dd class="col-sm-7">{{ $customer->address }}</dd>
						<dt class="col-sm-5">No Exterior</dt>
						<dd class="col-sm-7">{{ $customer->number_out }}</dd>
						<dt class="col-sm-5">No Interior</dt>
						<dd class="col-sm-7">{{ $customer->number_int }}</dd>
						<dt class="col-sm-5">CP</dt>
						<dd class="col-sm-7">{{ $customer->zip_code }}</dd>
						<dt class="col-sm-5">Colonia</dt>
						<dd class="col-sm-7">{{ $customer->district }}</dd>
						<dt class="col-sm-5">Ciudad</dt>
						<dd class="col-sm-7">{{ $customer->city }}</dd>
						<dt class="col-sm-5">Estado</dt>
						<dd class="col-sm-7">{{ $customer->state }}</dd>
						<dt class="col-sm-5">Referencia</dt>
						<dd class="col-sm-7">{{ $customer->reference }}</dd>
						<dt class="col-sm-5">Detalle</dt>
						<dd class="col-sm-7">{{ $customer->detail }}</dd>
						<dt class="col-sm-5">Observaciones</dt>
						<dd class="col-sm-7">{{ $customer->observations }}</dd>
					</dl>

				</div>
			</div>

	</div>
</div>