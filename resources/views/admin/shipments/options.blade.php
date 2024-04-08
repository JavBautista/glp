<div class="dropdown mb-2">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Opciones
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a href=" {{ route('shipments.edit.remitent',['shipment_id'=>$shipment->id]) }} " class="dropdown-item">Editar Remitente</a>
	  <a href=" {{ route('shipments.edit.destinatry',['shipment_id'=>$shipment->id]) }} " class="dropdown-item">Editar Destinatario</a>
	  <a href=" {{ route('shipments.edit.status',['shipment_id'=>$shipment->id]) }} " class="dropdown-item">Editar Estatus</a>
	  <a href=" {{ route('shipments.edit.cost',['shipment_id'=>$shipment->id]) }} " class="dropdown-item">Editar Costo</a>
      <div class="dropdown-divider"></div>
	  <a href=" {{ route('shipments.edit.disabled',['shipment_id'=>$shipment->id]) }} " class="dropdown-item">Dar de baja</a>
  </div>
</div>