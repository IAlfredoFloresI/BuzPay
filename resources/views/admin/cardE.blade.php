@extends('layouts.app1')

@section('content')

<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .centered-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }
    </style>

@push('styles')
    <link href="{{ asset('css/styles_admin.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/css_datos.css') }}" rel="stylesheet" />
@endpush

<main>
    <div class="container-fluid px-4">
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col">
                            <h1 class="mt-4">Consulta de Datos de Tarjeta</h1>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <img src="{{ asset('assets/img/Logo_Proyecto_Final_Proyector.png') }}" alt="PAYBUS" width="80" height="80">
                        </div>
                    </div>
                    <ol class="breadcrumb mb=4">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Consulta de Datos de Tarjeta</li>
                    </ol>
                    <div class="card mb-4" style="background-color: white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 centered-content">
                                    <br><br><br>
                                    <img src="{{ asset('assets/img/vayven.jpg') }}" alt="Tarjetas" width="400" height="250">
                                </div>
                                <div class="col-md-6">
                                    <!-- Sección del lector de QR -->
                                    <div class="field">
                                        <button class="btn btn-primary" id="start-qr-reader">Abrir Cámara</button>
                                        <div id="you-qr-result"></div>
                                        <div id="my-qr-reader-container" style="display: flex; justify-content: center;">
                                            <div id="my-qr-reader" style="width: 500px; display: none;"></div>
                                        </div>
                                    </div>
                                    <!-- Sección del folio -->
<!-- Asegúrate de que el HTML esté configurado para iniciar el escaneo -->
<!-- Estructura HTML -->
<div id="qr-reader" style="width: 300px;"></div>
<div id="qr-reader-results"></div>

<div class="field">
    <label for="folio">ID de la Tarjeta:</label>
    <input type="text" id="folio" name="folio" readonly>
    <button onclick="consultarDatosConQR()">Consultar</button>
</div>

<div class="field">
    <label for="saldo">Saldo Actual de la Tarjeta:</label>
    <input type="text" id="saldo" name="saldo" readonly>
</div>

<div class="field">
    <label for="vencimiento">Vencimiento de la Tarjeta:</label>
    <input type="text" id="vencimiento" name="vencimiento" readonly>
</div>

<script src="js/lib/html5-qrcode.min.js"></script> <!-- Asegúrate de que la ruta es correcta -->

<script>
// Función que inicia el escaneo del QR
function iniciarEscaneo() {
    const qrReader = new Html5Qrcode("qr-reader");

    qrReader.start(
        { facingMode: "environment" }, // Cámara trasera del dispositivo
        {
            fps: 10, // Fotogramas por segundo
            qrbox: { width: 250, height: 250 } // Tamaño del área de escaneo
        },
        (decodedText, decodedResult) => {
            tarjetaId = decodedText; // Almacena el ID
            document.getElementById('folio').value = tarjetaId;
            alert("ID escaneado: " + tarjetaId);
            qrReader.stop(); // Detiene el escaneo una vez capturado el código QR
        },
        (errorMessage) => {
            console.log("Escaneo en progreso: ", errorMessage);
        }
    ).catch(err => {
        console.error("Error al iniciar el escaneo", err);
    });
}

// Función para consultar saldo y vencimiento usando el ID escaneado
function consultarDatosConQR() {
    if (!tarjetaId) {
        alert("Por favor, escanea el código QR primero.");
        return;
    }

    fetch('/consultar-datos-tarjeta', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF para solicitudes POST en Laravel
        },
        body: JSON.stringify({ id: tarjetaId })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Tarjeta no encontrada');
        }
        return response.json();
    })
    .then(data => {
        if (data.error) {
            alert(data.error);
        } else {
            document.getElementById('saldo').value = data.saldototal;
            document.getElementById('vencimiento').value = data.vencitarjeta;
        }
    })
    .catch(error => {
        console.error(error);
        alert('Error: ' + error.message);
    });
}

// Inicia el escaneo automáticamente al cargar la página
window.onload = iniciarEscaneo;
</script>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Cerrar Sesión -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="background-color: #4A4A9C;">
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

                <!-- Modal de contactar administrador -->
                <div class="modal fade" id="contactAdminModal" tabindex="-1" aria-labelledby="contactAdminModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="background-color: #4A4A9C;">
                            <div class="modal-header" style="background-color: #FFD700;">
                                <h5 class="modal-title" id="contactAdminModalLabel">PAYBUS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <p style="color: white;">Favor de contactar al administrador</p>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts_admin.js"></script>
        <script>
            // Función para consultar el folio de la tarjeta
            function consultarFolio() {
                var id = document.getElementById('folio').value;
                fetch('/admin/get-card-details', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        document.getElementById('saldo').value = data.saldototal || '0.00';
                        document.getElementById('fecha-vencimiento').value = data.vencitarjeta || 'N/A';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred: ' + error.message);
                });
            }

            // Evento para iniciar el lector de QR
            document.getElementById('start-qr-reader').addEventListener('click', function() {
                document.getElementById('my-qr-reader').style.display = 'block'; // Mostrar el contenedor del lector de QR
                var htmlscanner = new Html5QrcodeScanner(
                    "my-qr-reader", { fps: 10, qrbox: 250 }
                );
                htmlscanner.render(onScanSuccess); // Renderizar el lector de QR
            });

            // Función para manejar el éxito del escaneo del QR
            function onScanSuccess(decodedText, decodedResult) {
                document.getElementById('folio').value = decodedText; // Mostrar el texto escaneado en el campo de folio
            }
        </script>
        <!-- Cargar la librería de QR -->
        <script src="https://unpkg.com/html5-qrcode"></script>
    </div>
</main>
@endsection