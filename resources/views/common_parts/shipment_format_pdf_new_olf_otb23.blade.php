<style>
	table{
		font-size: 12px;
		font-family: 'Helvetica', sans-serif !important;
	}

	.recorte{
		border:1px;
		border-style: dashed;
	}

	.destinatary{
		font-size: 12px;
		font-family: 'Helvetica', sans-serif !important;
	}

	.firma{
		text-align: center;
		font-size: 12px;
		font-family: 'Helvetica', sans-serif !important;
	}

	.firma-paquetes{
		text-align: right;
		font-size: 14px;
		font-family: 'Helvetica', sans-serif !important;
	}

	.saltopagina{page-break-after:always !important;}

	.detail-pqts{
		font-family: "Lucida Console", Monaco, monospace !important;
		font-size: 10px;
	}
</style>
@php
	$salto=0;
	$num_paquete=1;
	$total_paquetes= count($shipment->packages);
@endphp
@foreach ($shipment->packages as $pack)
<div  class="{{ $salto==1?'saltopagina':'' }}">
	<table style="border:solid 1px;" width="100%">
		<tr>
			<td width="10%" style="background-color:#D7C90E !important">
				<img src="{{ asset('images/logo_print_v.png') }}" width="100%" alt="vertical">
			</td>
			<td width="80%">
				<table  width="100%">
					<tr>
						<td width="50%" style="vertical-align:top">
							<table width="100%">
								<tr>
									<td>Razón Social: {{ $shipment->remitent->company }}</td>
								</tr>
								<tr>
									<td>Nombre: {{ $shipment->remitent->name }}</td>
								</tr>
								<tr>
									<td>Tel. {{ $shipment->remitent->phone }}</td>
								</tr>
								<tr>
									<td>{{ $shipment->remitent->address }} {{ $shipment->remitent->number_out }} {{ $shipment->remitent->number_int }}</td>
								</tr>
								<tr>
									<td>{{ $shipment->remitent->district }}</td>
								</tr>
								<tr>
									<td>CP {{ $shipment->remitent->zip_code }} <br> {{ $shipment->remitent->city }}, {{ $shipment->remitent->state }}. </td>
								</tr>
								<tr><td colspan="2">&nbsp;</td></tr>
								<tr><td class="detail-pqts"><br><strong>PAQUETE {{$num_paquete}} DE {{$total_paquetes}} </strong> </td></tr>
								<tr><td class="detail-pqts"> <strong>DESC: </strong> <em>{{ $pack->description }}</em></td></tr>
					            <tr><td class="detail-pqts"> <strong>Qty</strong> {{ $pack->qty }} <strong>Peso</strong> {{ $pack->weight }} </td></tr>
					            <tr><td class="detail-pqts"> <strong>L x An x Al: </strong> {{ $pack->length }}x{{ $pack->width }}x{{ $pack->height }}</td></tr>
							</table>
						</td>
						<td width="50%">
							<table class="destinatary">
								<tr>
									<td><strong>Recibe</strong></td>
									<td>{{ (strlen($shipment->destinatary->name) > 153)?substr($shipment->destinatary->name,0,150).'...' : $shipment->destinatary->name}}</td>
								</tr>
								<tr>
									<td><strong>Atención</strong></td>
									<td>{{ $shipment->destinatary->department }}</td>
								</tr>
								<tr>
									<td><strong>Contacto</strong></td>
									<td>{{ $shipment->destinatary->phone }} {{ $shipment->destinatary->movil }}</td>
								</tr>
								<tr>
									<td><strong>CP</strong></td>
									<td>{{ $shipment->destinatary->zip_code }}</td>
								</tr>
								<tr>
									<td><strong>Dirección</strong></td>
									<td>{{ $shipment->destinatary->address }} {{ $shipment->destinatary->number_out }} {{ $shipment->destinatary->number_int }} </td>
								</tr>
								<tr>
									<td><strong>Col.</strong></td>
									<td>{{ $shipment->destinatary->district }}</td>
								</tr>
								<tr>
									<td><strong>Ciudad</strong></td>
									<td>{{ $shipment->destinatary->city }}, {{ $shipment->destinatary->state }}</td>
								</tr>
								<tr>
									<td><strong>Referencias</strong></td>
									<td>{{ (strlen($shipment->destinatary->reference) > 153)?substr($shipment->destinatary->reference,0,150).'...' : $shipment->destinatary->reference}}</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>{{ (strlen($shipment->destinatary->detail) > 153)?substr($shipment->destinatary->detail,0,150).'...' : $shipment->destinatary->detail}}</td>
								</tr>
							</table>
							<table width="100%">
								<tr>
									<td height="60px">&nbsp;</td>
								</tr>
								<tr>
									<td class="firma">_____________________________________</td>
								</tr>
								<tr>
									<td class="firma"><strong> FIRMA DE RECIBIDO</strong></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td align="center" style="border-color: red; overflow: hidden;">


							<img alt="barcode" src="{{$barcontent}}"/>
						</td>
						<td align="center">
							<div style="padding: 1px 1px 1px 1px; overflow:hidden;">

								<img src="data:image/png;base64,{{ base64_encode($code_qr) }}" height="80">
							</div>
							<br>
							<strong>enviosvaps.com</strong>

						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
@php
	$num_paquete++;
	$salto++;
	if($salto==2){$salto=0;}
@endphp
@endforeach