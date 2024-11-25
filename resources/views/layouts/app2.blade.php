<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta tags y configuración de la página -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PAYBUS - Sistema de recarga para transporte público" />
    <meta name="author" content="Alfredo - Desarrollador de PAYBUS" />
    <title>PAYBUS - Cliente</title>
    <!-- Bootstrap CSS -->

    <!-- FontAwesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <!-- Custom CSS -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://www.paypal.com/sdk/js?client-id=AWkcPTxGSLrMPl4FLmK80qoUmV1orhpU1T-Cn1XbFeuTxRbnv-K2bLt0ceOViw07cd8tiS7L-tjZQbJg&currency=MXN"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/Camión_Icono.png') }}" />
    <link href="{{ asset('css/styles_admin.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts_admin.js  ')}}"></script>

    @stack('styles')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
</head>

<body class="sb-nav-fixed">
    <!-- Barra de navegación superior -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        @include('layouts.navbar') <!-- El navbar se mostrará en la parte superior -->
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layouts.sidebar2') <!-- El sidebar se mostrará a la izquierda -->
        </div>


        <div id="layoutSidenav_content">
            <main>
                @yield('content') <!-- Aquí se mostrará el contenido principal de cada vista -->
            </main>

            <!-- Pie de página -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright © PAYBUS 2024</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            ·
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>