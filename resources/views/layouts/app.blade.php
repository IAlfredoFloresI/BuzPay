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
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    @stack('styles')


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="sb-nav-fixed font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('layouts.sidebar') <!-- Asegúrate de que este archivo exista -->
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                    @endisset

                    @yield('content')
                </main>
            </div>
        </div>
        
        @include('layouts.footer') <!-- Asegúrate de que este archivo exista -->
        @include('layouts.navbar') <!-- Asegúrate de que este archivo exista -->

    </div>
</body>

</html>
