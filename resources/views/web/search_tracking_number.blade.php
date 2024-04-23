@extends('layouts.app_web')
@section('content')
<div class="section about_section layout_padding dash_bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card mt-4">
          <div class="card-body">

            <div class="container padding-bottom-3x mb-1">
              <div class="card mb-3">

                <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Número de Rastreo #Trk  - </span><span class="text-medium">{{  $shipment->tracking_number }}</span></div>

                <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
                  <div class="w-100 text-center py-1 px-2"><span class="text-medium">Destinatario:</span> {{$shipment->destinatary->name}}</div>
                  <div class="w-100 text-center py-1 px-2"><span class="text-medium">Municipio:</span> {{$shipment->destinatary->city}}</div>
                  <div class="w-100 text-center py-1 px-2"><span class="text-medium">Estado:</span> {{$shipment->destinatary->state}}</div>
                </div>

                <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
                  <div class="w-100 text-center py-1 px-2"><span class="text-medium">Estatus:</span> {{ strtoupper($shipment->status->status) }}</div>
                  <div class="w-100 text-center py-1 px-2"><span class="text-medium">Creación:</span> {{ strtoupper($shipment->created_at) }}</div>
                </div>


                <div class="card-body">
                  <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                    @php
                      $ultimo_status='';
                      $mostrar_status_faltante=false;
                    @endphp
                    @foreach ($shipment->history as $history)
                        @php
                        switch ($history->status) {
                          case 'creada':
                              $icon_status="fa fa-box"; break;
                          case 'recolectada':
                              $icon_status="fa fa-people-carry"; break;
                          case 'plaza':
                              $icon_status="fa fa-dolly"; break;
                          case 'ruta':
                              $icon_status="fa fa-shipping-fast"; break;
                          case 'intento':
                              $icon_status="fa fa-truck"; break;
                          case 'entregada':
                              $icon_status="fa fa-thumbs-up"; break;
                          default: $icon_status="fa fa-box"; break;
                        }
                        $ultimo_status=$history->status;
                        @endphp
                        <!--<div class="step completed">
                          <div class="step-icon-wrap">
                            <div class="step-icon"><i class="{ { $icon_status }}"></i></div>
                          </div>
                          <h4 class="step-title">{ {strtoupper($history->status)}} | </h4>
                        </div>
                      -->

                    @endforeach
                    @foreach ($statuses as $status)
                        @php
                        switch ($status->status) {
                          case 'creada':
                              $icon_status="fa fa-box"; break;
                          case 'recolectada':
                              $icon_status="fa fa-people-carry"; break;
                          case 'plaza':
                              $icon_status="fa fa-dolly"; break;
                          case 'ruta':
                              $icon_status="fa fa-shipping-fast"; break;
                          case 'intento':
                              $icon_status="fa fa-truck"; break;
                          case 'entregada':
                              $icon_status="fa fa-thumbs-up"; break;
                          default: $icon_status="fa fa-box"; break;
                        }
                        @endphp
                        @if ($mostrar_status_faltante)
                          @if($status->status!='intento')
                            <!--<div class="step">
                              <div class="step-icon-wrap">
                                <div class="step-icon"><i class="{ { $icon_status }}"></i></div>
                              </div>
                              <h4 class="step-title">{ {strtoupper($status->status)}}</h4>
                            </div>-->
                            @endif
                        @endif
                        @if($status->status == $ultimo_status)
                          @php $mostrar_status_faltante=true; @endphp
                        @endif
                    @endforeach

                  </div>
                </div>
              </div>
            </div>
            <div class="stepper d-flex flex-column mt-5 ml-2">
              @php
                $num=0;
              @endphp
              @foreach($shipment->history as $history)
                @php
                  $num++;
                @endphp
                <div class="d-flex mb-1">
                  <div class="d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">{{$num}}</div>
                    <div class="line h-100"></div>
                  </div>
                  <div>
                    <h5 class="text-dark">{{ strtoupper($history->status) }} <em class="small text-muted">{{$history->created_at}}</em></h5>
                    <p class="lead text-muted pb-3">{{$history->comentary}}</p>
                  </div>
                </div>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection