@extends('layouts.app_web')
@section('content')
<!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="slider_item-box layout_padding2">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="img-box">
                      <div>
                        <img src="{{ asset('webglp/images/slide-01.jpg') }}" alt="" class="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="detail-box">
                      <div>
                        <h1>
                          GLP
                        </h1>
                        <p>
                          GESTION LOGISTICA DE MENSAJERIA Y PAQUTERIA
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="container">
        <div class="slider_nav-box">
          <div class="btn-box">
            <a href="">
              Leer mas.
            </a>
            <hr>
          </div>
          <div class="custom_carousel-control">
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
   <!-- work section -->
    <section class="contact_section layout_padding" style="background-color:#ccc">
      <div class="custom_heading-container">
        <h3 class=" ">
          RASTREA TU PAQUETE
        </h3>
      </div>
      <div class="container layout_padding2-top">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <form action="{{ route('trackingcontrol.search-trk') }}">
              <div>
                <input type="text" placeholder="# RASTREO" name="tracking-number" required>
              </div>
              <div class="d-flex justify-content-center ">
                <button>
                  BUSCAR
                </button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </section>
    <!-- end work section -->

    <!-- service section -->
    <section class="service_section layout_padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="custom_heading-container">
                    <h3 class=" ">BENEFICIOS</h3>
                </div>
                <p>
                    En GLP, nos esforzamos por ir más allá de la simple entrega de paquetes. Nuestros servicios van acompañados de una serie de beneficios diseñados para proporcionarle comodidad, seguridad y confianza en cada envío. Al elegir GLP, disfrutará de:
                </p>
                <div class="service_container">
                  <ul class="custom-list-style" style="text-align: left; list-style-type: disc;">
                    <li><strong>Guías Prepagadas:</strong> Simplifique el proceso de envío con guías prepagadas listas para utilizar.</li>
                    <li><strong>Convenios de Servicio:</strong> Ofrecemos acuerdos personalizados para satisfacer sus necesidades específicas de envío.</li>
                    <li><strong>Acceso a Línea de Crédito:</strong> (Sujeto a aprobación) Obtenga acceso a una línea de crédito para mayor flexibilidad en sus envíos.</li>
                    <li><strong>Unidades con GPS y Monitoreo:</strong> Su carga está siempre protegida con nuestras unidades equipadas con tecnología de monitoreo avanzada.</li>
                    <li><strong>Atención Personalizada:</strong> Cada cliente recibe atención personalizada de nuestro equipo, liderado por un asesor comercial dedicado.</li>
                    <li><strong>Página de Internet:</strong> Acceda a nuestra plataforma en línea para gestionar envíos, rastrear paquetes y más, todo desde la comodidad de su dispositivo.</li>
                  </ul>
                </div>
                <p>
                    Estos beneficios son solo una muestra del compromiso de GLP con la excelencia en logística y servicio al cliente. Confíe en nosotros para simplificar sus operaciones de envío y superar sus expectativas en cada paso del camino.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('webglp/images/glp_02.png') }}" alt="Imagen de Beneficios" class="img-fluid" style="padding-top:8px">
            </div>
        </div>
    </div>
</section>

    <!-- end service section -->


    <!-- contact section -->
    <section class="contact_section layout_padding">
      <div class="custom_heading-container">
        <h3 class=" ">
          CONTACTANOS
        </h3>
      </div>
      <div class="container layout_padding2-top">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <form action="">
              <div>
                <input type="text" placeholder="NOMBRE">
              </div>
              <div>
                <input type="email" placeholder="EMAIL">
              </div>
              <div>
                <input type="text" placeholder="NÚMERO DE CONTACTANOS">
              </div>
              <div>
                <input type="text" class="message-box" placeholder="MENSAJE">
              </div>
              <div class="d-flex justify-content-center ">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </section>
@endsection