@extends('layouts.app_web')
@section('content')
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