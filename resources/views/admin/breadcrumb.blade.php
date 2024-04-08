<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  	@switch($item)

    	@case('index')
        <li class="breadcrumb-item active" aria-current="page">Administrador</li>
      @break
      <!--------------------------------------------------------------------------->
      <!-- COLLECTORS -->
      @case('collectors.index')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Recolectores</li>
      @break

      @case('collectors.detail')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/collectors">Recolectores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalle</li>
      @break

      <!--------------------------------------------------------------------------->
      <!-- CUSTOMERS -->
      @case('customers.index')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
      @break

      @case('customers.create')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/customers">Clientes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo</li>
      @break

      @case('customers.detail')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/customers">Clientes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalle</li>
      @break
      @case('customers.edit')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/customers">Clientes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
      @break
      @case('customers.edit.status')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/customers">Clientes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Status</li>
      @break
      @case('customers.delete')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/customers">Clientes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Eliminar Cliente</li>
      @break

      <!--------------------------------------------------------------------------->
      <!-- SHIPMENTS -->
      @case('shipments.index')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Envios</li>
      @break

      @case('shipments.detail')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/shipments">Envios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalle</li>
      @break

      @case('shipments.edit')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/shipments">Envios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
      @break

      @case('shipments.edit.remitent')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/shipments">Envios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Remitente</li>
      @break

      @case('shipments.edit.destinatary')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/shipments">Envios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Destinatario</li>
      @break

      @case('shipments.edit.status')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/shipments">Envios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Estatus</li>
      @break

      @case('shipments.edit.cost')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/shipments">Envios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Costo</li>
      @break

      @case('shipments.edit.disabled')
        <li class="breadcrumb-item"><a href="/admin">Administrador</a></li>
        <li class="breadcrumb-item"><a href="/admin/shipments">Envios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Baja/alta</li>
      @break

    @endswitch

  </ol>
</nav>