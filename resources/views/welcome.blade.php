@extends('layouts.app_web')
@section('styles')
    <style>
        .cobertura_section {
            background-image: url('{{ asset('webglp/images/map_mx.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 80px;
            background-color: rgba(255, 128, 64, 0.5);  /* Color de fondo con transparencia al 50% */
        }
    </style>
@endsection

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
                      <img src="{{ asset('webglp/images/slide-03.jpg') }}" alt="" class="" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-box">
                    <div>
                      <h1 class="text-primary">GLP</h1>
                      <h2 class="text-orange">
                        Envíos Confiables a tu Puerta
                      </h2>
                      <p>
                        Confía en GLP para tus envíos. Ofrecemos recolección y entrega a domicilio, asegurando que tus paquetes lleguen siempre a tiempo y en perfectas condiciones.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="slider_item-box layout_padding2">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="img-box">
                    <div>
                      <img src="{{ asset('webglp/images/slide-02.jpg') }}" alt="" class="" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-box">
                    <div>
                      <h1>
                        Innovación y Seguridad en Cada Envío
                      </h1>
                      <p>
                        Descubre los beneficios de GLP: unidades con GPS, atención personalizada, guías prepagadas y más. Tu envío está en buenas manos con nosotros.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
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
                        Servicio Personalizado y Flexible
                      </h1>
                      <p>
                        En GLP, tratamos a cada cliente como único. Desde recolección a domicilio hasta opciones de seguro de mercancía, garantizamos soluciones adaptadas a tus necesidades.
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

  <!-- rastrear section -->
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
  <!-- end rastrear section -->

  <!-- cobertura section -->
  <section class="contact_section cobertura_section layout_padding">
    <div class="custom_heading-container">
      <h3 class=" ">
        COBERTURA
      </h3>
    </div>
    <div class="container layout_padding2-top">
      <div class="row">
        <div class="col-md-3 mx-auto">
          <ul class="list-unstyled">
            <li><strong>PUEBLA</strong></li>
            <li>Puebla</li>
            <li>San Pedro Cholula</li>
            <li>San Andrés Cholula</li>
            <li>Cuautlancingo</li>
            <li>Coronango</li>
            <li>San Miguel Xoxtla</li>
          </ul>
        </div>
        <div class="col-md-3 mx-auto">
          <ul class="list-unstyled">
            <li><strong>CIUDAD DE MEXICO </strong></li>
            <li>Álvaro Obregón</li>
            <li>Azcapotzalco</li>
            <li>Benito Juárez</li>
            <li>Coyoacán</li>
            <li>Cuauhtémoc</li>
            <li>Gustavo A. Madero</li>
            <li>Iztacalco</li>
            <li>Iztapalapa</li>
            <li>Miguel Hidalgo</li>
            <li>Tlalpan</li>
            <li>Venustiano Carranza</li>
          </ul>
        </div>
        <div class="col-md-3 mx-auto">
          <ul class="list-unstyled">
            <li><strong>EDO MEX</strong></li>
            <li>Toluca</li>
            <li>Lerma</li>
            <li>Metepec</li>
            <li>Atizapán</li>
            <li>Atizapán de Zaragoza</li>
            <li>Naucalpan</li>
            <li>Tlalnepantla</li>
            <li>Tepotzotlán</li>
            <li>Cuautitlán Izcalli</li>
            <li>Cuautitlán</li>
            <li>Tultitlán</li>
            <li>Ecatepec</li>
            <li>Coacalco</li>
            <li>Nezahualcóyotl</li>
            <li>Zinacantepec</li>
            <li>San Mateo Atenco</li>
          </ul>
        </div>
        <div class="col-md-3 mx-auto">
          <ul class="list-unstyled">
            <li><strong>GUANAJUATO</strong></li>
            <li>León</li>
            <li>Silao</li>
            <li>Irapuato</li>
            <li>Celaya</li>
            <li>Salamanca</li>
          </ul>
        </div>
        <div class="col-md-3 mx-auto">
          <ul class="list-unstyled">
            <li><strong>VERACRUZ</strong></li>
            <li>Veracruz</li>
            <li>Boca</li> del Río
            <li>Xalapa</li>
            <li>Córdoba</li>
            <li>Orizaba</li>
            <li>Coatzacoalcos</li>
            <li>Poza</li> Rica
            <li>Tuxpan</li>
            <li>Minatitlán</li>
            <li>Perote</li>
          </ul>
        </div>
        <div class="col-md-3 mx-auto">
          <ul class="list-unstyled">
            <li><strong>TLAXCALA</strong></li>
            <li>Tlaxcala</li>
            <li>Huamantla</li>
            <li>Apizaco</li>
            <li>San Pablo del Monte</li>
            <li>Papalotla</li>
            <li>Xicohtzingo</li>
            <li>Zacatelco</li>
            <li>Tenancingo</li>
            <li>Santa Ana Chiautempan</li>
          </ul>
        </div>
        <div class="col-md-3 mx-auto">
          <ul class="list-unstyled">
            <li><strong>JALISCO</strong></li>
            <li>Guadalajara</li>
            <li>Zapopán</li>
            <li>Tonalá</li>
            <li>San Pedro Tlaquepaque</li>
          </ul>
        </div>
        <div class="col-md-3 mx-auto">
          <ul class="list-unstyled">
            <li><strong>NUEVO LEON</strong></li>
            <li>Monterrey</li>
            <li>Santa Catarina</li>
            <li>San Pedro Garza García</li>
            <li>San Nicolás de los Garza</li>
            <li>Apodaca</li>
            <li>Guadalupe</li>
            <li>Gral. Escobedo</li>
          </ul>
        </div>


        </div>
      </div>

    </div>
  </section>
  <!-- end cobertura section -->

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
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="custom_heading-container">
      <h3 class=" ">
        CONTACTANOS
      </h3>
    </div>
    <div class="container layout_padding2-top">
      <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('contact-form.store') }}" method="POST">
              @csrf
              <div>
                <input name="name" id="name" type="text"  class="form-control @error('name') is-invalid @enderror" placeholder="NOMBRE" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input name="email" id="email" type="email"  class="form-control @error('email') is-invalid @enderror" placeholder="EMAIL" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input name="phone" id="phone" type="text"  class="form-control @error('phone') is-invalid @enderror" placeholder="NÚMERO DE CONTACTO" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input name="message" id="message" type="text"  class="form-control message-box @error('message') is-invalid @enderror"  placeholder="MENSAJE" value="{{ old('message') }}" required autocomplete="message" autofocus>
                @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
  <!-- contact section -->
@endsection