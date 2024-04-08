<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GLP</title>
    <link rel="icon" href="{{ asset('/img/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/coreui.css') }}" rel="stylesheet">
</head>
<body class="app flex-row align-items-center" style="background-color:#3498DB !important">
  <div class="container">
    @yield('login')
  </div>
  <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/coreui.js') }}" defer></script>
</body>

</html>
