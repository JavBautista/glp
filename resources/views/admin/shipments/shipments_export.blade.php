<table>
    <thead>
    <tr>
        <th><strong>No.</strong></th>
        <th><strong>#Trk</strong></th>
        <th><strong>Creacion</strong></th>
        <th><strong>Costo</strong></th>

        <th><strong>Estatus</strong></th>
        <th><strong>Fecha Estatus</strong></th>
        <th><strong>Comentario</strong></th>

        <th><strong>Rmt. Nombre</strong></th>
        <th><strong>Rmt. Móvil</strong></th>
        <th><strong>Rmt. Dirección</strong></th>
        <th><strong>Rmt. Ciudad</strong></th>
        <th><strong>Rmt. Estado</strong></th>
        <th><strong>Rmt. Contenido</strong></th>
        <th><strong>Rmt. Valor Declarado</strong></th>
        <th><strong>Dst. Nombre</strong></th>
        <th><strong>Dst. Móvil</strong></th>
        <th><strong>Dst. Dirección</strong></th>
        <th><strong>Dst. Ciudad</strong></th>
        <th><strong>Dst. Estado</strong></th>
        @for ($i = 0; $i < $num_max_packages; $i++)
            <th>Pqt  {{$i+1}}</th>
            <th>Qty  {{$i+1}}</th>
            <th>Peso {{$i+1}}</th>
            <th>Long {{$i+1}}</th>
            <th>Anc  {{$i+1}}</th>
            <th>Alt  {{$i+1}}</th>
        @endfor
    </tr>
    </thead>
    <tbody>
    @foreach($shipments as $shipment)
        <tr>
            <td>{{ $shipment->id }}</td>
            <td>&nbsp;{{ $shipment->tracking_number }}</td>
            <td>{{ $shipment->created_at }}</td>
            <td>{{ number_format($shipment->cost, 2, '.', '') }}</td>

            <td>{{ $shipment->status->status }}</td>

            @php
                $existe=false;
            @endphp
            @foreach($shipment->history as $hst)
                @if( trim($hst->status) == trim($shipment->status->status))
                    @php
                        $existe=true;
                    @endphp
                    <td>{{ $hst->created_at }}</td>
                    <td>{{ $hst->comentary }}</td>
                @endif
            @endforeach
            @if(!$existe)
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            @endif

            <td>{{ $shipment->remitent->name }}</td>
            <td>&nbsp;{{ $shipment->remitent->movil }}</td>
            <td>{{ $shipment->remitent->address }}</td>            
            <td>{{ $shipment->remitent->city }}</td>            
            <td>{{ $shipment->remitent->state }}</td>

            <td>{{ $shipment->remitent->content }}</td>
            <td>{{ $shipment->remitent->declared_value }}</td>

            <td>{{ $shipment->destinatary->name }}</td>
            <td>&nbsp;{{ $shipment->destinatary->movil }}</td>
            <td>{{ $shipment->destinatary->address }}</td>            
            <td>{{ $shipment->destinatary->city }}</td>            
            <td>{{ $shipment->destinatary->state }}</td>
            @if(isset($shipment->packages))
                @foreach( $shipment->packages as $pack)
                    <td>{{ $pack->description}}</td>
                    <td>{{ $pack->qty}}</td>
                    <td>{{ $pack->weight}}</td>
                    <td>{{ $pack->length}}</td>
                    <td>{{ $pack->width}}</td>
                    <td>{{ $pack->height}}</td>
                @endforeach
            @endif
        </tr>
    @endforeach
    </tbody>
</table>