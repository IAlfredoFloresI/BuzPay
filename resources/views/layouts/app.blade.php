<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta tags y configuración de la página -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="PAYBUS - Sistema de recarga para transporte público" />
    <meta name="author" content="Tu Nombre o Empresa" />
    <title>PAYBUS - Inicio</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/Camión_Icono.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles_admin.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/Consultar_Saldo.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/css_cierrecaja.css') }}" rel="stylesheet" />
    

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    @stack('styles')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="sb-nav-fixed font-sans antialiased">
    <div class="d-flex" id="wrapper">
        @include('layouts.sidebar') <!-- El sidebar se mostrará a la izquierda -->

        <div id="page-content-wrapper">
            @include('layouts.navbar') <!-- El navbar se mostrará en la parte superior -->

            <div class="container-fluid mt-4">
                @yield('content') <!-- Aquí se mostrará el contenido principal de cada vista -->
            </div>
        </div>
    </div>

</body>

</html>
