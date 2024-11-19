@extends('layouts.app')

@section('content')

<link rel="icon" type="image/x-icon" href="assets/img/Camión_Icono.png" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles_admin.css" rel="stylesheet" />
    
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col">
                            <h1 class="mt-4">Administración de Usuarios</h1>
                        </div>
                        <div class="col d-flex justify-content-end">
                        <img src="{{ asset('assets/img/Logo_Proyecto_Final_Proyector.png') }}" alt="PAYBUS" width="80" height="80">                        </div>
                    </div>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="admin.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Administración de Usuarios</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="container">
                                <div class="d-flex justify-content-between mb-3">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registerEmployeeModal">
                                        Registrar Nuevo Usuario +
                                    </button>
                                </div>
                                <div id="employeeCatalog">
                                    <!-- Aquí se llenarán los usuarios desde el servidor -->
                                </div>
                                <div id="message"></div> <!-- Mensajes de error y éxito -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal de Cerrar Sesión -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="background-color: #4A4A4A;">
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
            </main>
        </div>
    </div>

    <!-- Modal para Registrar Empleado -->
    <div class="modal fade" id="registerEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="registerEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerEmployeeModalLabel">Registrar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
<!-- Formulario de registro de empleado -->
<form id="registerForm">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="txt_nombre" placeholder="Nombre" class="form-control" required />
    </div>
    <div class="form-group">
        <label for="curp">CURP:</label>
        <input type="text" id="curp" name="txt_curp" placeholder="CURP" class="form-control" required />
    </div>
    <div class="form-group">
        <label for="apellidoPaterno">Apellido Paterno:</label>
        <input type="text" id="apellidoPaterno" name="txt_apellidoP" placeholder="Apellido Paterno" class="form-control" required />
    </div>
    <div class="form-group">
        <label for="apellidoMaterno">Apellido Materno:</label>
        <input type="text" id="apellidoMaterno" name="txt_apellidoM" placeholder="Apellido Materno" class="form-control" required />
    </div>
    <div class="form-group">
        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" id="correo_electronico" name="txt_correo_electronico" placeholder="Correo Electrónico" class="form-control" required />
    </div>
    <div class="form-group">
        <label for="clasificacion">Clasificación:</label>
        <select id="clasificacion" name="txt_clasificacion" class="form-control" required>
            <option value="1">EMPLEADO</option>
            <option value="2">DUEÑO</option>
        </select>
    </div>
    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="txt_pass" placeholder="Contraseña" class="form-control" required />
    </div>
    <div id="successMessage" class="alert alert-success" style="display: none;">Empleado dado de alta con éxito</div>
    <div class="button-group">
        <button type="submit" class="btn btn-warning">Dar de Alta</button>
    </div>
</form>

                </div>
                <div id="message"></div> <!-- Mensajes de error y éxito -->
            </div>
        </div>
    </div>

    <!-- Modal Editar Empleado -->
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEmployeeModalLabel">Editar Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="idUsuario" name="idUsuario" value="" />
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="edit_nombre" name="txt_nombre" placeholder="Nombre" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="curp">CURP:</label>
                            <input type="text" id="edit_curp" name="txt_curp" placeholder="CURP" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="apellidoPaterno">Apellido Paterno:</label>
                            <input type="text" id="edit_apellidoPaterno" name="txt_apellidoP" placeholder="Apellido Paterno" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="apellidoMaterno">Apellido Materno:</label>
                            <input type="text" id="edit_apellidoMaterno" name="txt_apellidoM" placeholder="Apellido Materno" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="correo_electronico">Correo Electrónico:</label>
                            <input type="email" id="edit_correo_electronico" name="txt_correo_electronico" placeholder="Correo Electrónico" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="pass">Contraseña:</label>
                            <input type="text" id="edit_pass" name="txt_pass" placeholder="Contraseña" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="clasificacion">Clasificación:</label>
                            <select id="edit_clasificacion" name="txt_clasificacion" class="form-control" required>
                                <option value="1">EMPLEADO</option>
                                <option value="2">DUEÑO</option>
                            </select>
                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                        </div>
                    </form>
                </div>
                <div id="message"></div> <!-- Mensajes de error y éxito -->
            </div>
        </div>
    </div>

    <!-- Modal de confirmación de eliminación -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Seguro que quiere eliminar este usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
$(document).ready(function () {
    let employeeIdToDelete;

    function loadEmployees() {
        $.ajax({
            url: '{{ route("employees.list") }}', // Cambiado a ruta de Laravel
            type: 'GET',
            success: function (data) {
                var employeeCatalog = $('#employeeCatalog');
                employeeCatalog.empty();
                data.forEach(function (employee) {
                    var card = `<div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">${employee.nombre} ${employee.apellidop} ${employee.apellidom}</h5>
                                        <p class="card-text">CURP: ${employee.curp}</p>
                                        <p class="card-text">Correo: ${employee.correo_electronico}</p>
                                        <p class="card-text"><small class="text-muted">ID: ${employee.idusuario}</small></p>
                                        <div class="d-flex justify-content-start">
                                            <button class="btn btn-warning edit-btn btn-space" data-id="${employee.idusuario}" data-toggle="modal" data-target="#editEmployeeModal">Editar</button>
                                            <button class="btn btn-danger delete-btn btn-space" data-id="${employee.idusuario}">Eliminar</button>
                                        </div>
                                    </div>
                                </div>`;
                    employeeCatalog.append(card);
                });

                $('.edit-btn').click(function () {
                    var id = $(this).data('id');
                    $.ajax({
                        url: '{{ url("employees") }}/' + id, // Usa la ruta RESTful
                        type: 'GET',
                        success: function (employee) {
                            $('#editEmployeeModal #idUsuario').val(employee.idusuario);
                            $('#editEmployeeModal #edit_nombre').val(employee.nombre);
                            $('#editEmployeeModal #edit_curp').val(employee.curp);
                            $('#editEmployeeModal #edit_apellidoPaterno').val(employee.apellidop);
                            $('#editEmployeeModal #edit_apellidoMaterno').val(employee.apellidom);
                            $('#editEmployeeModal #edit_correo_electronico').val(employee.correo_electronico);
                            $('#editEmployeeModal #edit_pass').val(employee.pass);
                            $('#editEmployeeModal #edit_clasificacion').val(employee.clasificacion);
                        },
                        error: function () {
                            alert('No se pudo cargar la información del empleado.');
                        }
                    });
                });

                $('.delete-btn').click(function () {
                    employeeIdToDelete = $(this).data('id');
                    $('#confirmDeleteModal').modal('show');
                });
            },
            error: function () {
                alert('No se pudo cargar la lista de empleados.');
            }
        });
    }

    $('#registerForm').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: '{{ route("employees.register") }}',
            type: 'POST',
            data: $('#registerForm').serialize(),
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function (response) {
                if (response.status === 'success') {
                    $('#registerEmployeeModal').modal('hide');
                    loadEmployees();
                    $('#registerForm')[0].reset();
                } else {
                    alert('Error al registrar el empleado: ' + response.message);
                }
            },
            error: function () {
                alert('No se pudo registrar el empleado.');
            }
        });
    });

    $('#editForm').submit(function (event) {
        event.preventDefault();
        var id = $('#editEmployeeModal #idUsuario').val();
        $.ajax({
            url: '{{ url("employees/update") }}/' + id,
            type: 'PUT',
            data: $('#editForm').serialize(),
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function (response) {
                if (response.status === 'success') {
                    $('#editEmployeeModal').modal('hide');
                    loadEmployees();
                } else {
                    alert('Error al actualizar el empleado: ' + response.message);
                }
            },
            error: function () {
                alert('No se pudo actualizar el empleado.');
            }
        });
    });

    $('#confirmDeleteButton').click(function () {
        if (employeeIdToDelete) {
            $.ajax({
                url: '{{ url("employees/delete") }}/' + employeeIdToDelete,
                type: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function (response) {
                    if (response.status === 'success') {
                        $('#confirmDeleteModal').modal('hide');
                        loadEmployees();
                    } else {
                        alert('No se pudo eliminar el empleado: ' + response.message);
                    }
                },
                error: function () {
                    alert('No se pudo eliminar el empleado.');
                }
            });
        }
    });

    loadEmployees(); // Cargar empleados al iniciar
});
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <audio id="audioScaner" src="assets/sonido.mp3"></audio>
    <script src="js/QRcamara.js"></script>
@endsection
