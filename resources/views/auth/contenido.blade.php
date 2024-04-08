<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GLP</title>
    <link rel="icon" href="{{ asset('/img/favicon.ico') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/coreui.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/coreui.css') }}" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
  <div class="container">
    @yield('login')
  </div>

  <!-- Bootstrap and necessary plugins -->
  <script src="js/plantilla.js"></script>

</body>
</html>