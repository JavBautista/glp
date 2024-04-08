<style>
    body {
    font-family: 'San-Serif-Font', sans-serif; /* Cambia 'San-Serif-Font' al nombre del tipo de letra que desees usar */
    }

    table {
        border-collapse: collapse;
        width: 100%;
        border: solid 1px;
    }

     td, th {
        border: 1px solid black;
        padding: 2px; /* Ajusta el espacio interno de todas las celdas */
        vertical-align: top; /* Alinea el contenido en la parte superior de cada celda */
    }

    .td-header {
        color: #000;
        width: 70%;
        text-align: center;
        padding: 2px;
        background-color: #000;
        background-image: url("{{asset('images/logo_print_h.png')}}"); /* Ruta de la imagen */
        background-repeat: no-repeat;
        background-size: contain; /* Ajusta la imagen al tamaño de la celda */
        background-position: center center; /* Alinea la imagen en el centro */
    }

    th {
        background-color: #000;
        color: #fff;
    }
</style>
<div class="container">
	<table>
        <tr>
            <td class="td-header">

            </td>
            <td rowspan="4">
                <h3>Número de Control de Guía</h3>
                <img alt="barcode" src="{{$barcontent}}">
            </td>
        </tr>
        <tr>
            <td>
                <h3>Envíos VAPS trabaja para ti, dandole la seguridad y confianza en tus entregas.</h3>
            </td>
        </tr>
        <tr>
            <td>
                <h3>
                    Av. 2 oriente 1611 - 15 Barrio de La Luz, Puebla Centro, Mexico.
                </h3>
                <p>Tel. (+52) 221 344 3146 E-Mail: quirozadrianqo@gmail.com</p>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Fecha Emision: ________/________/________/</h3>
            </td>
        </tr>
    </table>
    <table>
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
                <td rowspan="2" style="text-align: center;">
                	<div style="padding: 1px 1px 1px 1px; overflow:hidden; text-align: center;">
						<img src="data:image/png;base64,{{ base64_encode($code_qr) }}" height="80">
					</div>
                </td>
                <td colspan="2">NOMBRE Y FIRMA DE CONFORMIDAD</td>
            </tr>
            <tr>
                <td colspan="2">wwww.enviosvaps.com Tel. (+52) 221 344 3146 E-Mail: quirozadrianqo@gmail.com</td>
            </tr>
        </tfoot>
    </table>
</div>