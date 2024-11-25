@extends('layouts.app')

@section('content')

<style>
    .centered-text {
        text-align: center;
    }

    #tarjeta-input,
    #otro-dato-input {
        font-weight: bold;
        font-size: 1.5em;
        padding: 10px;
        width: 100%;
    }

    .paypal-button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 10px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>

<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">


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
                        <!-- Lector QR -->
                        <div class="card mb-4 rounded-3 shadow-sm card-body">
                            <button class="btn btn-primary" id="start-qr-reader">Abrir Cámara</button>
                            <div id="you-qr-result"></div>
                            <div id="reader" style="width: 100%; height: 100%;"></div>
                        </div>

                        <!-- TextBox Folio -->
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
                                        <button type="button" class="w-100 btn btn-lg btn-outline-primary recarga-button" data-value="50">Recargar</button>
                                    </div>
                                </div>
                                <div id="paypal-button-container" class="d-grid gap-2 card mt-3"></div>
                            </div>
                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header py-3" style="background-color: #4967A3;">
                                        <h4 class="my-0 fw-normal text-white">Recarga</h4>
                                    </div>
                                    <div class="card-body">
                                        <img src="{{ asset('assets/img/Camión_Recargas.png') }}" alt="Recarga" width="120" height="100">
                                        <h1 class="card-title pricing-card-title">$100 <small class="text-muted fw-light"> pesos</small></h1>
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

            <!-- Modal de Recarga Exitosa -->
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
<script src="{{ asset('js/html5-qrcode.min.js') }}"></script>

<!-- PayPal JS SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=AWkcPTxGSLrMPl4FLmK80qoUmV1orhpU1T-Cn1XbFeuTxRbnv-K2bLt0ceOViw07cd8tiS7L-tjZQbJg&currency=MXN"></script>

<script>
    let monto; // Declaración de monto fuera de las funciones para alcance global
    let html5QrCode; // Declaración del lector QR para reutilización

    // Configuración de los botones de PayPal
    paypal.Buttons({
        createOrder: function(data, actions) {
            const idTarjeta = document.getElementById("tarjeta-input").value;
            const montoInput = document.getElementById("otro-dato-input").value;

            monto = parseFloat(montoInput);

            if (!idTarjeta) {
                document.getElementById("tarjeta-input").classList.add("is-invalid");
                alert("Por favor, ingresa un ID válido de tarjeta.");
                return; // No permite continuar si no hay ID
            }

            if (isNaN(monto) || monto <= 0) {
                alert("Por favor, ingresa un monto válido mayor a 0.");
                return; // No permite continuar si el monto no es válido
            }

            // Si todo es válido, se crea la orden
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: monto.toFixed(2) // Solo se usa si monto es válido
                    },
                    description: `Recarga para tarjeta ID ${idTarjeta}`
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert(`Transacción completada: ${details.id}`);

                // Enviar los datos al backend para registrar la recarga
                fetch(`/admin/recarga`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            tarjeta_id: document.getElementById("tarjeta-input").value,
                            monto: monto, // Aquí usamos la variable 'monto' ya definida
                            paypal_transaction_id: details.id
                        })
                    })
                    .then(response => {
                        if (!response.ok) throw new Error("Error al procesar la solicitud.");
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert(`Recarga exitosa. Nuevo saldo: $${data.nuevoSaldo}`);
                        } else {
                            alert(`Error en el servidor: ${data.error}`);
                        }
                    })
                    .catch(error => {
                        console.error("Error en la solicitud:", error.message);
                        alert("Ocurrió un error al registrar la recarga.");
                    });
            });
        },
    }).render('#paypal-button-container');

    // Configuración del lector QR
    document.getElementById("start-qr-reader").addEventListener("click", function() {
        if (!html5QrCode) {
            html5QrCode = new Html5Qrcode("reader");
        }

        // Inicia el lector QR
        html5QrCode.start(
            { facingMode: "environment" }, // Utiliza la cámara trasera del dispositivo
            {
                fps: 10, // fotogramas por segundo
                qrbox: 250, // tamaño del cuadro para el escaneo
            },
            function(decodedText, decodedResult) {
                console.log(`QR decodificado: ${decodedText}`);
                document.getElementById("tarjeta-input").value = decodedText; // Asigna el texto del QR al input
                html5QrCode.stop(); // Detén el escáner después de leer el código
            },
            function(errorMessage) {
                console.error(`Error al leer QR: ${errorMessage}`);
            }
        ).catch((err) => {
            console.error(`Error al iniciar el escáner: ${err}`);
        });
    });

    // Lógica de botones de recarga
    const recargaButtons = document.querySelectorAll('.recarga-button');
    recargaButtons.forEach(button => {
        button.addEventListener('click', function() {
            const valorRecarga = this.getAttribute('data-value');
            console.log(`Valor seleccionado: $${valorRecarga}`);

            // Aquí puede integrar el flujo de recarga con PayPal o cualquier otro sistema.
            $('#recargaExitoModal').modal('show');
        });
    });

    // Comportamiento del botón de recarga final
    document.getElementById('recargar-button').addEventListener('click', function() {
        const cantidadRecarga = document.getElementById('otro-dato-input').value;
        console.log(`Cantidad a recargar: $${cantidadRecarga}`);

        // Lógica de recarga personalizada, por ejemplo integración con la base de datos o sistemas de pago
        $('#recargaExitoModal').modal('show');
    });
</script>


@endsection