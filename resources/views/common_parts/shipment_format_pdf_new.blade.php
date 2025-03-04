<style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: solid 1px;
        font-family: sans-serif;
    }

     td, th {
        border: 1px solid black;
        padding: 2px; /* Ajusta el espacio interno de todas las celdas */
        vertical-align: top; /* Alinea el contenido en la parte superior de cada celda */
    }

    .td-header {
        text-align: center;
        padding: 2px;
    }

    th {
        background-color: #000;
        color: #fff;
    }

    .text-center{
        vertical-align: middle;
        text-align: center;
    }

    .text-primary{
        color: #014AAD;
    }

    .text-secondary{
        color: #FF5555;
    }
</style>
<div class="container">
	<table>
        <tr>
            <td class="td-header">
                <img src="{{asset('webglp/images/GLP_logo_h_800x200.png')}}" width="30%"  alt="">
                <br>
                <h3>www.glppaqueteria.com</h3>
                
            </td>
            <td rowspan="3" class="text-center">
                <h1>#Guía</h1>
                <img alt="barcode" src="{{$barcontent}}">
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <h3 class="text-secondary">GESTI&Oacute;N LOG&Iacute;STICA DE PAQUETES Y MENSAJER&Iacute;A</h3>
                <p class="text-primary"><strong>Puebla, Pue. | (+52) 222 842 7308 | (+52) 222 371 8042</strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <!--<h3>Fecha Emision: ________/________/________/</h3>-->
                <h2>Fecha Emisi&oacute;n: {{ $shipment->created_at->format('d/m/Y') }}</h2>
            </td>
        </tr>

        <tr>
            <td width="50%">
            	<h3>ORIGIEN</h3>
				<p>Razón Social: {{ $shipment->remitent->company }}</p>
				<p>Nombre: {{ $shipment->remitent->name }}</p>
				<p>Tel. {{ $shipment->remitent->phone }}</p>
				<p>{{ $shipment->remitent->address }} {{ $shipment->remitent->number_out }} {{ $shipment->remitent->number_int }}</p>
				<p>{{ $shipment->remitent->district }}
				CP {{ $shipment->remitent->zip_code }} <br> {{ $shipment->remitent->city }}, {{ $shipment->remitent->state }}</p>
            </td>
            <td width="50%">
            	<h3>DESTINO</h3>
				<p><strong>Recibe</strong>&nbsp;{{ (strlen($shipment->destinatary->name) > 153)?substr($shipment->destinatary->name,0,150).'...' : $shipment->destinatary->name}}</p>
				<p><strong>Atención</strong>&nbsp;{{ $shipment->destinatary->department }}</p>
				<p><strong>Contacto</strong>&nbsp;{{ $shipment->destinatary->phone }} {{ $shipment->destinatary->movil }}</p>

				<p><strong>Dirección</strong>&nbsp;{{ $shipment->destinatary->address }} {{ $shipment->destinatary->number_out }} {{ $shipment->destinatary->number_int }} &nbsp; <strong>Col.</strong>&nbsp;{{ $shipment->destinatary->district }}</p>
				<p><strong>CP</strong>&nbsp;{{ $shipment->destinatary->zip_code }} &nbsp;<strong>Ciudad</strong>&nbsp;{{ $shipment->destinatary->city }}, {{ $shipment->destinatary->state }}</p>
				<p><strong>Referencias</strong>&nbsp;{{ (strlen($shipment->destinatary->reference) > 153)?substr($shipment->destinatary->reference,0,150).'...' : $shipment->destinatary->reference}}</p>
				<p>{{ (strlen($shipment->destinatary->detail) > 153)?substr($shipment->destinatary->detail,0,150).'...' : $shipment->destinatary->detail}}</p>
            </td>
        </tr>
    </table>
    <table>
        <thead>
            <tr>
                <th>CANTIDAD</th>
                <th>CONTENIDO</th>
                <th>DESCRPCION</th>
            </tr>
        </thead>
        <tbody>
        	@foreach ($shipment->packages as $pack)
            <tr>
                <td width="20%"><strong>L x An x Al: </strong> {{ $pack->length }}x{{ $pack->width }}x{{ $pack->height }}</td>
                <td width="20%"><strong>Qty</strong> {{ $pack->qty }} <strong>Peso</strong> {{ $pack->weight }} </td>
                <td>{{ $pack->description }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td style="text-align: center;">
                	<div style="padding: 1px 1px 1px 1px; overflow:hidden; text-align: center;">
						<img src="data:image/png;base64,{{ base64_encode($code_qr) }}" height="80">
					</div>
                </td>
                <td colspan="2">NOMBRE Y FIRMA DE CONFORMIDAD</td>
            </tr>
        </tfoot>
    </table>
</div>
<p><em>Copia</em></p>
<div class="container">
    <table>
        <tr>
            <td class="td-header">
                <img src="{{asset('webglp/images/GLP_logo_h_800x200.png')}}" width="30%"  alt="">
            </td>
            <td rowspan="3" class="text-center">
                <h1>#Guía</h1>
                <img alt="barcode" src="{{$barcontent}}">
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <h3 class="text-secondary">GESTI&Oacute;N LOG&Iacute;STICA DE PAQUETES Y MENSAJER&Iacute;A</h3>
                <p class="text-primary"><strong>Puebla, Pue. | (+52) 222 842 7308 | (+52) 222 371 8042</strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <!--<h3>Fecha Emision: ________/________/________/</h3>-->
                <h2>Fecha Emisi&oacute;n: {{ $shipment->created_at->format('d/m/Y') }}</h2>
            </td>
        </tr>

        <tr>
            <td width="50%">
                <h3>ORIGIEN</h3>
                <p>Razón Social: {{ $shipment->remitent->company }}</p>
                <p>Nombre: {{ $shipment->remitent->name }}</p>
                <p>Tel. {{ $shipment->remitent->phone }}</p>
                <p>{{ $shipment->remitent->address }} {{ $shipment->remitent->number_out }} {{ $shipment->remitent->number_int }}</p>
                <p>{{ $shipment->remitent->district }}
                CP {{ $shipment->remitent->zip_code }} <br> {{ $shipment->remitent->city }}, {{ $shipment->remitent->state }}</p>
            </td>
            <td width="50%">
                <h3>DESTINO</h3>
                <p><strong>Recibe</strong>&nbsp;{{ (strlen($shipment->destinatary->name) > 153)?substr($shipment->destinatary->name,0,150).'...' : $shipment->destinatary->name}}</p>
                <p><strong>Atención</strong>&nbsp;{{ $shipment->destinatary->department }}</p>
                <p><strong>Contacto</strong>&nbsp;{{ $shipment->destinatary->phone }} {{ $shipment->destinatary->movil }}</p>

                <p><strong>Dirección</strong>&nbsp;{{ $shipment->destinatary->address }} {{ $shipment->destinatary->number_out }} {{ $shipment->destinatary->number_int }} &nbsp; <strong>Col.</strong>&nbsp;{{ $shipment->destinatary->district }}</p>
                <p><strong>CP</strong>&nbsp;{{ $shipment->destinatary->zip_code }} &nbsp;<strong>Ciudad</strong>&nbsp;{{ $shipment->destinatary->city }}, {{ $shipment->destinatary->state }}</p>
                <p><strong>Referencias</strong>&nbsp;{{ (strlen($shipment->destinatary->reference) > 153)?substr($shipment->destinatary->reference,0,150).'...' : $shipment->destinatary->reference}}</p>
                <p>{{ (strlen($shipment->destinatary->detail) > 153)?substr($shipment->destinatary->detail,0,150).'...' : $shipment->destinatary->detail}}</p>
            </td>
        </tr>
    </table>
    <table>
        <thead>
            <tr>
                <th>CANTIDAD</th>
                <th>CONTENIDO</th>
                <th>DESCRPCION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shipment->packages as $pack)
            <tr>
                <td width="20%"><strong>L x An x Al: </strong> {{ $pack->length }}x{{ $pack->width }}x{{ $pack->height }}</td>
                <td width="20%"><strong>Qty</strong> {{ $pack->qty }} <strong>Peso</strong> {{ $pack->weight }} </td>
                <td>{{ $pack->description }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td style="text-align: center;">
                    <div style="padding: 1px 1px 1px 1px; overflow:hidden; text-align: center;">
                        <img src="data:image/png;base64,{{ base64_encode($code_qr) }}" height="80">
                    </div>
                </td>
                <td colspan="2">NOMBRE Y FIRMA DE CONFORMIDAD</td>
            </tr>
        </tfoot>
    </table>
</div>

