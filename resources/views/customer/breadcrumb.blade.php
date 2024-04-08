<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  	@switch($item)
    	@case('index')
        <li class="breadcrumb-item active" aria-current="page">Customer</li>
      @break   
      
      @case('shipment.destination_directory')
        <li class="breadcrumb-item"><a href="/customer">Customer</a></li>
        <li class="breadcrumb-item active" aria-current="page">Directorio de destino</li>
      @break

      @case('shipment.detail')
        <li class="breadcrumb-item"><a href="/customer">Customer</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalle de Envio</li>
      @break

      @case('shipment.create')
        <li class="breadcrumb-item"><a href="/customer">Customer</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear Envio</li>
      @break

      @case('customer.information')
        <li class="breadcrumb-item"><a href="/customer">Customer</a></li>
        <li class="breadcrumb-item active" aria-current="page">Mis Datos de Contacto</li>
      @break   

    @endswitch

  </ol>
</nav>