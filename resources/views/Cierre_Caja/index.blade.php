@extends('layouts.app')

@section('content')


<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col">
                            <h1 class="mt-4">Cierre de Caja</h1>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <img src="{{ asset('assets/img/Logo_Proyecto_Final_Proyector.png') }}" alt="PAYBUS" width="80" height="80">
                        </div>
                    </div>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Cierre de Caja</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <label for="fechaSelect">Selecciona la fecha:</label>
                            <input type="text" id="fechaSelect" class="form-control">
                           
                        </div>
                        <div id="totalRecargas">Total de Recargas del Día: <span id="totalDia"></span></div>
                    </div>
                    
                    <div class="container">
                        <div class="recargas-list">
                            <h3>Recargas del Día</h3>
                            <table id="recargasTable">
                                <thead>
                                    <tr>
                                        <th>Monto</th>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody id="recargasDia">
                                    <!-- Aquí se llenarán las recargas desde el servidor -->
                                </tbody>
                            </table>

                            <div id="message"></div> <!-- Mensajes de error y éxito -->
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <script>
    $(document).ready(function() {
                function loadRecargas(fecha) {
                    $.ajax({
                        url: '{{ route("cierreCaja.getRecargasDia") }}',
                        type: 'get',
                        data: { fecha: fecha },
                        success: function(data) {
                            var recargas = data;
                            var recargasTable = $('#recargasTable tbody');
                            recargasTable.empty();
                            recargas.forEach(function(recarga) {
                                var row = `<tr>
                                    <td>${recarga.monto}</td>
                                    <td>${recarga.fecha}</td>
                                    <td>${recarga.usuario.nombre}</td>
                                </tr>`;
                                recargasTable.append(row);
                            });
                        },
                        error: function() {
                            $('#message').text('No se pudo cargar la lista de recargas.');
                        }
                    });
                }

                function loadFechas() {
                    $.ajax({
                        url: '{{ route("cierreCaja.getFechasRecargas") }}',
                        type: 'get',
                        success: function(data) {
                            var fechaSelect = $('#fechaSelect');
                            fechaSelect.empty();
                            data.forEach(function(fecha) {
                                var option = `<option value="${fecha.fecha}">${fecha.fecha}</option>`;
                                fechaSelect.append(option);
                            });
                        },
                        error: function() {
                            $('#message').text('No se pudo cargar las fechas.');
                        }
                    });
                }

                function loadTotal(fecha) {
                    $.ajax({
                        url: '{{ route("cierreCaja.getTotalRecargasDia") }}',
                        type: 'get',
                        data: { fecha: fecha },
                        success: function(data) {
                            $('#totalDia').text(data.total);
                        },
                        error: function() {
                            $('#message').text('No se pudo cargar el total del día.');
                        }
                    });
                }

        $('#cargarRecargasBtn').on('click', function() {
            var selectedFecha = $('#fechaSelect').val();
            loadRecargas(selectedFecha);
            loadTotal(selectedFecha);
        });

        $('#fechaSelect').datepicker({
            dateFormat: 'yy-mm-dd',
            onSelect: function(dateText) {
                loadRecargas(dateText);
                loadTotal(dateText);
            }
        });

        loadFechas();
        var today = new Date().toISOString().split('T')[0];
        loadRecargas(today);
        loadTotal(today);
    });
</script>
@endsection