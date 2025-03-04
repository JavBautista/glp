<div class="dropdown mb-2">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    Opciones
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <li><a href="{{ route('shipments.edit.remitent', ['shipment_id' => $shipment->id]) }}" class="dropdown-item">Editar Remitente</a></li>
      <li><a href="{{ route('shipments.edit.destinatry', ['shipment_id' => $shipment->id]) }}" class="dropdown-item">Editar Destinatario</a></li>
      <li><a href="{{ route('shipments.edit.status', ['shipment_id' => $shipment->id]) }}" class="dropdown-item">Editar Estatus</a></li>
      <li><a href="{{ route('shipments.edit.cost', ['shipment_id' => $shipment->id]) }}" class="dropdown-item">Editar Costo</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a href="{{ route('shipments.edit.disabled', ['shipment_id' => $shipment->id]) }}" class="dropdown-item">Dar de baja</a></li>
  </ul>
</div>
