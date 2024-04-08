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