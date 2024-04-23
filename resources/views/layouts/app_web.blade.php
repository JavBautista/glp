<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>GLP</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('webglp/css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('webglp/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('webglp/css/responsive.css') }}" rel="stylesheet" />
  @yield('styles')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="/">
            <span>
              GLP
            </span>
          </a>
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('web.home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('web.about')}}"> Quienes Somos </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('web.services')}}"> Servicios </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('web.contact')}}">Contacto</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://wa.me/5212228427308">
                    <img src="{{ asset('webglp/images/whatsapp.png') }} " style="width: 2rem; height: 2rem;" alt="">
                    <span>
                      (+52) 222 842 7308
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
          </form>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>
  <div class="bg">
    @yield('content')

    <!-- info section -->
    <section class="info_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="info-logo">
              <h2>
                GLP
              </h2>
              <p>
                Somos una empresa nacional joven y dinámica; con experiencia en servicios de Mensajería, Paquetería y LTL con amplia cobertura..
              </p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info-nav">
              <h4>
                Mapa
              </h4>
              <ul>
                <li>
                  <a href="#">
                    Inicio
                  </a>
                </li>
                <li>
                  <a href="#">
                    Acerca de
                  </a>
                </li>
                <li>
                  <a href="#">
                    Servicios
                  </a>
                </li>
                <li>
                  <a href="#">
                    Contacto
                  </a>
                </li>
                <li>
                  <a href="#">
                    Login
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info-contact">
              <h4>
                Información de contacto
              </h4>
              <div class="location">
                <h6>
                  Dirección:
                </h6>
                <a href="">
                  <img src="{{asset('webglp/images/location.png')}}" alt="">
                  <span>
                    Puebla, Pue.
                  </span>
                </a>
              </div>
              <div class="call">
                <h6>
                  Número de contacto:
                </h6>
                <a href="">
                  <img src="{{asset('webglp/images/telephone.png')}}" alt="">
                  <span>
                    (+52) 222 842 7308
                  </span>
                </a>
                <br>
                <a href="">
                  <img src="{{asset('webglp/images/telephone.png')}}" alt="">
                  <span>
                    (+52) 222 371 8042
                  </span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="discover">
              <h4>
                Descubre
              </h4>
              <ul>
                <li>
                  <a href="#">
                    Contactanos
                  </a>
                </li>
              </ul>
              <div class="social-box">
                <a href="#">
                  <img src="{{asset('webglp/images/facebook.png')}}" alt="">
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end info_section -->

    <!-- footer section -->
    <section class="container-fluid footer_section">
      <p>
        Copyright &copy; 2024 All Rights Reserved By
        <a href="https://levcore.app/">Powered By Levcore.app</a>
      </p>
    </section>
    <!-- footer section -->
  </div>
    <script type="text/javascript" src="{{ asset('webglp/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('webglp/js/bootstrap.js') }}"></script>
</body>

</html>