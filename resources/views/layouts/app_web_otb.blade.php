<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <!-- Basic -->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <!-- Site Metas -->
      <title>OnTimeBox</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Site Icons -->
      <link rel="icon" href="{{ asset('/img/favicon.ico') }}">
      <link rel="shortcut icon" href="#" type="{{ asset('/img/favicon.ico') }}" />
      <link rel="apple-touch-icon" href="#" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('dm/css/bootstrap.min.css')}}" />
      <!-- Pogo Slider CSS -->
      <link rel="stylesheet" href="{{ asset('dm/css/pogo-slider.min.css')}}" />
      <!-- Site CSS -->
      <link rel="stylesheet" href="{{ asset('dm/css/style.css')}}" />
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('dm/css/responsive.css')}}" />
      <!-- Custom CSS -->
      <link rel="stylesheet" href="{{ asset('dm/css/custom.css')}}" />
      <link rel="stylesheet" href="{{ asset('dm/css/bar.css')}}" />
      <link rel="stylesheet" href="{{ asset('css/fwhatsapp.min.css')}}">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.dm/js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="https://kit.fontawesome.com/d9523ccd01.js" crossorigin="anonymous"></script>
      <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">-->

   </head>
   <body data-spy="scroll" {{ (Request::path() != '/')?'class="inner_page"':'' }} data-target="#navbar-wd" data-offset="98">
      <!-- LOADER -->
      <div id="preloader">
         <div class="loader">
            <img src="/dm/images/loader.gif" alt="#" />
         </div>
      </div>
      <!-- END LOADER -->
      <div class="wrapper">
      <nav id="sidebar">
         <div class="menu_section">
            <ul>
               <li><a href="/">Inicio</a></li>
               <li><a href="/about">Nosotros</a></li>
               <li><a href="/services">Servicios</a></li>
               <li><a href="/privacidad">Privacidad</a></li>
               <li><a href="/login">Login</a></li>
            </ul>
         </div>
      </nav>
      <div id="content">
         <!-- Start header -->
         <header class="top-header">
            <div class="container">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="logo_main">
                        <a href="/"><img src="/dm/images/main_logo.png" width="50%"></a>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn"><img src="/dm/images/menu_icon.png"></button>
                  </div>
               </div>
            </div>
         </header>
         <!-- End header -->
         @yield('content')
         <!-- Start Footer -->
         <footer class="footer-box">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <div class="heading_main text_align_center white_fonts margin-bottom_30">
                           <h2>Contactanos</h2>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">

<!--
                  <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
                     <div class="full footer_blog f_icon_1">
                         <p>Dirección<br><small>Av 527 #200 <br>Unidad San Juan de Aragón 1era Sección, CP 07969<br>Alcaldía Gustavo A Madero, CDMX </small></p>
                     </div>
                  </div>
-->
                  <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
                     <div class="full footer_blog f_icon_1">
                        <p>Clientes</p>
                        <a class="lead" href="/privacidad">Aviso de privacidad</a>
                     </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
                     <div class="full footer_blog f_icon_2">
                        <p>Teléfono<br><small>+52 55 7670 0388<br>
                           Lunes - Viernes<br>08:00 am - 08:00 pm</small></p>
                     </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
                     <div class="full footer_blog f_icon_3">
                         <p>Email<br><small>ontimebox.paqueteria@gmail.com<br>24 X 7 soporte en linea.</small></p>
                     </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
                     <div class="full footer_blog_last">
                         <p>Redes</p>
                         <p>
                           <ul>
                              <li><a href="https://www.facebook.com/On-Time-Box-101904378289220/"><i class="fa fa-facebook-f"></i></a></li>
                              <li><a href="https://www.instagram.com/ontimeboxmx/"><i class="fa fa-instagram"></i></a></li>
                              <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                              <li><a href="#"><i class="fa fa-youtube"></i></a></li>-->
                           </ul>
                         </p>
                     </div>
                  </div>

               </div>
            </div>
         </footer>
         <!-- End Footer -->
         <div class="footer_bottom">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <p class="crp">© Copyrights 2020 - 2023 <!--design by <a href="https://html.design" title="Free Website Templates">Free Website Templates</a>--></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>
      <div id="WAButton"></div>
      <!-- ALL JS FILES -->
      <script src="{{asset('dm/js/jquery.min.js')}}"></script>
      <script src="{{asset('dm/js/popper.min.js')}}"></script>
      <script src="{{asset('dm/js/bootstrap.min.js')}}"></script>

      <script src="{{asset('js/fwhatsapp.min.js') }}"></script>
      <!-- ALL PLUGINS -->
      <script src="{{asset('dm/js/jquery.magnific-popup.min.js')}}"></script>
      <script src="{{asset('dm/js/jquery.pogo-slider.min.js')}}"></script>
      <script src="{{asset('dm/js/slider-index.js')}}"></script>
      <script src="{{asset('dm/js/smoothscroll.js')}}"></script>
      <script src="{{asset('dm/js/form-validator.min.js')}}"></script>
      <script src="{{asset('dm/js/contact-form-script.js')}}"></script>
      <script src="{{asset('dm/js/isotope.min.js')}}"></script>
      <script src="{{asset('dm/js/images-loded.min.js')}}"></script>
      <script src="{{asset('dm/js/custom.js')}}"></script>

      <!-- End Google Map -->
      <script>


         $(document).ready(function() {


           $('#sidebarCollapse').on('click', function() {
             $('#sidebar, #content').toggleClass('active');
             $('.collapse.in').toggleClass('in');
             $('a[aria-expanded=true]').attr('aria-expanded', 'false');
           });

           $('#WAButton').floatingWhatsApp({
               phone: '5215576700388', //WhatsApp Business phone number
               headerTitle: 'Envianos un WhatsApp!', //Popup Title
               popupMessage: 'Hola, ¿en que podemos ayudarte?', //Popup Message
               showPopup: true, //Enables popup display
               //buttonImage: '<img src="whatsapp.svg" />', //Button Image
               //headerColor: 'crimson', //Custom header color
               //backgroundColor: 'crimson', //Custom background button color
               position: "right" //Position: left | right
            });

         });
      </script>
      <!-- google map js -->

      <!-- end google map js -->
   </body>
</html>