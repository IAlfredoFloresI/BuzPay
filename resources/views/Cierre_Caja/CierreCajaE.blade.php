@extends('layouts.app')

@section('content')
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
            <input type="text" id="fechaSelect" class="form-control" placeholder="YYYY-MM-DD">
        </div>
        <div id="totalRecargas">Total de Recargas del Día: <span id="totalDia"></span></div>
    </div>

    <div class="container">
        <div class="recargas-list">
            <h3>Recargas del Día</h3>
            <table id="recargasTable" class="table table-striped">
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
            <div id="message" class="alert d-none"></div> <!-- Mensajes de error y éxito -->
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

<script>
    $(document).ready(function() {
        function loadRecargas(fecha) {
            $.ajax({
                url: '{{ route("cierreCaja.getRecargasDia") }}',
                type: 'get',
                data: {
                    fecha: fecha
                },
                success: function(data) {
                    var recargasTable = $('#recargasTable tbody');
                    recargasTable.empty();

                    if (data.length === 0) {
                        recargasTable.append('<tr><td colspan="3">No hay recargas para esta fecha.</td></tr>');
                        return;
                    }

                    data.forEach(function(recarga) {
                        var row = `<tr>
                    <td>${recarga.monto}</td>
                    <td>${recarga.fecha}</td>
                    <td>${recarga.usuario ? recarga.usuario.name : 'Desconocido'}</td>
                </tr>`;
                        recargasTable.append(row);
                    });
                },
                error: function(xhr) {
                    var errorMessage = xhr.status === 404 ? 'No hay recargas para la fecha seleccionada.' : 'Error al cargar las recargas.';
                    $('#message').text(errorMessage);
                }
            });
        }

        function loadTotal(fecha) {
            $.ajax({
                url: '{{ route("cierreCaja.getTotalRecargasDia") }}',
                type: 'get',
                data: {
                    fecha: fecha
                },
                success: function(data) {
                    $('#totalDia').text(data.total);
                },
                error: function() {
                    $('#message')
                        .removeClass('d-none alert-success')
                        .addClass('alert-danger')
                        .text('No se pudo cargar el total del día.')
                        .fadeIn();
                }
            });
        }

        $('#fechaSelect').datepicker({
            dateFormat: 'yy-mm-dd',
            onSelect: function(dateText) {
                loadRecargas(dateText);
                loadTotal(dateText);
            }
        });

        var today = new Date().toISOString().split('T')[0];
        $('#fechaSelect').val(today); // Establecer la fecha de hoy por defecto
        loadRecargas(today);
        loadTotal(today);
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
@endsection