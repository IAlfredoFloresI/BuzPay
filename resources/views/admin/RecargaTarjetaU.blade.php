@extends('layouts.app2')

@section('content')

<style>
        .centered-text {
            text-align: center;
        }
  
    #tarjeta-input {
        font-weight: bold;
        font-size: 1.5em; /* Ajusta el tamaño del texto según tus necesidades */
        padding: 10px;   /* Ajusta el relleno según tus necesidades */
        width: 100%;     /* Ajusta el ancho según tus necesidades */
    }
   
    #otro-dato-input {
        font-weight: bold;
        font-size: 1.5em; /* Ajusta el tamaño del texto según tus necesidades */
        padding: 10px;   /* Ajusta el relleno según tus necesidades */
        width: 100%;     /* Ajusta el ancho según tus necesidades */
    }

    </style>

<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

@push('styles')
    <link href="{{ asset('css/styles_admin.css') }}" rel="stylesheet" />
@endpush
<main>
<div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col">
                            <h1 class="mt-4">Recargar Tarjeta</h1>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <img src="{{ asset('assets/img/Logo_Proyecto_Final_Proyector.png') }}" alt="PAYBUS" width="80" height="80">
                        </div>
                    </div>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Recargar Tarjeta</li>
                    </ol>
                    <div class="card mb-4" style="background-color: #FFD14B">
                        <div class="card-body">
                            <h2 class="display-6 text-center mb-4">Insertar ID de la Tarjeta</h2>
                            <!--Lector QR-->
                            <div class="card mb-4 rounded-3 shadow-sm card-body">
                                <button class="btn btn-primary" id="start-qr-reader">Abrir Cámara</button>
                                <div id="you-qr-result"></div>
                                <div id="reader" style="width: 600px; height: 400px;"></div>

                            </div>
                            <!--TextBox Folio-->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control centered-text" id="tarjeta-input" placeholder="ID de la Tarjeta" aria-describedby="button-tarjeta">
                            </div>
                            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                                <div class="col">
                                    <div class="card mb-4 rounded-3 shadow-sm">
                                        <div class="card-header py-3" style="background-color: #4967A3;">
                                            <h4 class="my-0 fw-normal text-white">Recarga</h4>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ asset('assets/img/Camión_Recargas.png') }}" alt="Recarga" width="120" height="100">
                                            <h1 class="card-title pricing-card-title">$20 <small class="text-muted fw-light"> pesos</small></h1>
                                            <ul class="list-unstyled mt-3 mb-4"></ul>
                                            <button type="button" class="w-100 btn btn-lg btn-outline-primary recarga-button" data-value="20">Recargar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card mb-4 rounded-3 shadow-sm">
                                        <div class="card-header py-3" style="background-color: #4967A3;">
                                            <h4 class="my-0 fw-normal text-white">Recarga</h4>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ asset('assets/img/Camión_Recargas.png') }}" alt="Recarga" width="120" height="100">
                                            <h1 class="card-title pricing-card-title">$50 <small class="text-muted fw-light"> pesos</small></h1>
                                            <ul class="list-unstyled mt-3 mb-4"></ul>
                                            <button type="button" class="w-100 btn btn-lg btn-outline-primary recarga-button" data-value="50">Recargar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card mb-4 rounded-3 shadow-sm">
                                        <div class="card-header py-3" style="background-color: #4967A3;">
                                            <h4 class="my-0 fw-normal text-white">Recarga</h4>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ asset('assets/img/Camión_Recargas.png') }}" alt="Recarga" width="120" height="100">
                                            <h1 class="card-title pricing-card-title">$100 <small class="text-muted fw-light"> pesos</small></h1>
                                            <ul class="list-unstyled mt-3 mb-4"></ul>
                                            <button type="button" class="w-100 btn btn-lg btn-outline-primary recarga-button" data-value="100">Recargar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="display-6 text-center mb-4">Otro Dato</h2>
                            <div class="input-group mb-3">
                            <input type="number" class="form-control centered-text" id="otro-dato-input" placeholder="¿Cuánto vas a recargar?" aria-describedby="button-addon2">

                            </div>
                            <div class="d-grid gap-2 card">
                                <button class="btn btn-outline-primary" type="button" id="recargar-button">RECARGAR</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Cerrar Sesión -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="background-color: #4967A3;">
                            <div class="modal-header" style="background-color: #FFD700;">
                                <h5 class="modal-title" id="logoutModalLabel">PAYBUS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <p style="color: white;">¿Seguro que quiere cerrar sesión?</p>
                                <a class="btn btn-warning text-white" href="session/logout.php">Cerrar Sesión</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Administración de Usuarios -->
                <div class="modal fade" id="adminUsersModal" tabindex="-1" aria-labelledby="adminUsersModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="background-color: #4A4A4A;">
                            <div class="modal-header" style="background-color: #FFD700;">
                                <h5 class="modal-title" id="adminUsersModalLabel">PAYBUS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <p style="color: white;">Administración de Usuarios</p>
                                <a class="btn btn-warning text-white" href="employees.php">Administrar</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Estadísticas -->
                <div class="modal fade" id="statsModal" tabindex="-1" aria-labelledby="statsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="background-color: #4A4A4A;">
                            <div class="modal-header" style="background-color: #FFD700;">
                                <h5 class="modal-title" id="statsModalLabel">PAYBUS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <p style="color: white;">Estadísticas</p>
                                <a class="btn btn-warning text-white" href="estadisticas.php">Ver Estadísticas</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="modal fade" id="recargaExitoModal" tabindex="-1" aria-labelledby="recargaExitoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recargaExitoModalLabel">Recarga Exitosa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Recarga realizada con éxito.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts_admin.js"></script>
    <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>

    <script>
      let html5QrCode;

// Inicialización del escáner QR cuando se presiona el botón
document.getElementById("start-qr-reader").addEventListener("click", function() {
    // Inicia el lector QR
    html5QrCode = new Html5Qrcode("reader");

    // Empieza a leer el QR
    html5QrCode.start(
        { facingMode: "environment" }, // Utiliza la cámara trasera del dispositivo
        {
            fps: 10, // fotogramas por segundo
            qrbox: 250, // tamaño del cuadro para el escaneo
        },
        function (decodedText, decodedResult) {
            // Este código se ejecuta cuando se lee el QR
            console.log(`QR decodificado: ${decodedText}`);
            obtenerDatosDelCliente(decodedText);
            html5QrCode.stop(); // Detén el escáner después de leer el código
        },
        function (errorMessage) {
            // Este código se ejecuta cuando hay un error al leer el QR
            console.log(`Error al leer QR: ${errorMessage}`);
        }
    ).catch((err) => {
        console.log(`Error al iniciar el escáner: ${err}`);
    });
});

// Función para obtener los datos del cliente basados en el ID del QR
function obtenerDatosDelCliente(idUsuario) {
    // Realiza una solicitud AJAX para obtener los datos del cliente
    fetch(`\Controllers\RecargaController.php${idUsuario}`) //No extrae
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta de la API');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Rellena los campos de la tarjeta con los datos obtenidos
                document.getElementById("tarjeta-input").value = data.usuario.idusuario;
            } else {
                alert('Cliente no encontrado');
            }
        })
        .catch(error => {
            console.error('Error al obtener los datos:', error);
        });
}

    </script>
    <!-- Cargar la librería de QR -->
    <script src="https://unpkg.com/html5-qrcode"></script>
</main>
@endsection
