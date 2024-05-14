@extends('layouts.app_web')
@section('content')
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
                <input name="phone" id="phone" type="text"  class="form-control @error('phone') is-invalid @enderror" placeholder="NÚMERO DE CONTACTANOS" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
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
@endsection