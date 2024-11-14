@extends('layouts.app')

@section('content')

<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<main>
    <div class="container-fluid px-4">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <h1 class="mt-4">Inicio</h1>
            </div>
            <div class="col d-flex justify-content-end">
                <img src="{{ asset('assets/img/Logo_Proyecto_Final_Proyector.png') }}" alt="PAYBUS" width="80" height="80">
            </div>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
        </ol>
        <h2 class="mb-4">Opciones para empleados y administradores</h2>
        <div class="row mb-4">
            @foreach ([
                ['title' => 'Recargar Tarjeta', 'bg' => 'bg-primary', 'icon' => 'bi-cash-coin', 'link' => route('recarga.form')],
                ['title' => 'Consultar Saldo', 'bg' => 'bg-warning', 'icon' => 'bi-card-checklist', 'link' => route('card.consultar')], // Cambia esta línea
                ['title' => 'Cierre de Caja', 'bg' => 'bg-primary', 'icon' => 'bi-inboxes-fill', 'link' => route('cierreCaja.index')],
            ] as $option)
            <div class="col-xl-4 col-md-6">
                <div class="card {{ $option['bg'] }} text-white mb-4" style="height: 150px;">
                    <div class="card-body">{{ $option['title'] }}</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi {{ $option['icon'] }} icon-aling" viewBox="0 0 16 16">
                        <!-- SVG Path Here -->
                    </svg>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ $option['link'] }}">Ver Detalles</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h2 class="mb-4">Opciones para administradores</h2>
<div class="row mb-4">
    @foreach ([
        ['title' => 'Administrador de usuarios', 'bg' => 'bg-dark', 'icon' => 'bi-person-lines-fill', 'route' => route('employees.index')],
        ['title' => 'Estadísticas', 'bg' => 'bg-dark', 'icon' => 'bi-graph-up', 'url' => route('estadisticas')],
    ] as $adminOption)
        <div class="col-xl-4 col-md-6">
            <div class="card {{ $adminOption['bg'] }} text-white mb-4" style="height: 150px;">
                <div class="card-body">{{ $adminOption['title'] }}</div>
                <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi {{ $adminOption['icon'] }} icon-aling" viewBox="0 0 16 16">
                    <!-- SVG Path Here -->
                </svg>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    @if (isset($adminOption['route']))
                        <a class="small text-white stretched-link" href="{{ $adminOption['route'] }}">Ver Detalles</a>
                    @elseif (isset($adminOption['url']))
                        <a class="small text-white stretched-link" href="{{ $adminOption['url'] }}">Ver Detalles</a>
                    @elseif (isset($adminOption['modal']))
                        <a class="small text-white stretched-link" data-bs-toggle="modal" data-bs-target="{{ $adminOption['modal'] }}">Ver Detalles</a>
                    @endif
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    @endforeach
</div>



        <!-- Modal de contactar administrador -->
        <div class="modal fade" id="contactAdminModal" tabindex="-1" aria-labelledby="contactAdminModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactAdminModalLabel">Contactar Administrador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Contenido del modal aquí -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Scripts de JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts_admin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <audio id="audioScaner" src="assets/sonido.mp3"></audio>
    <script src="js/QRcamara.js"></script>
@endsection
