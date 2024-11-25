@extends('layouts.app')

@section('content')


<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (y Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<div class="container">
    <h1>Lista de Empleados</h1>

    <!-- Lista de Empleados fuera del Modal -->
    <div id="employee-list">
        <!-- Aquí se cargará la lista de empleados -->
        <p>Cargando empleados...</p>
    </div>

    <!-- Botón para abrir el modal de clientes -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#employeeModal">
        Ver Clientes
    </button>

    <!-- Modal -->
    <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeModalLabel">Clientes Disponibles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="client-list">
                        <!-- Aquí se cargará la lista de clientes -->
                        <p>Cargando clientes...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const employeeList = document.getElementById('employee-list');
        const clientList = document.getElementById('client-list');
        const employeeModal = document.getElementById('employeeModal');

        // Cargar los empleados fuera del modal
        fetch('http://127.0.0.1:8000/employees/list?store=all')
            .then(response => response.json())
            .then(data => {
                const employees = data.employees;
                employeeList.innerHTML = ''; // Limpiar contenido previo

                if (employees.length === 0) {
                    employeeList.innerHTML = '<p>No hay empleados disponibles.</p>';
                } else {
                    const table = document.createElement('table');
                    table.classList.add('table', 'table-striped', 'table-hover');
                    table.innerHTML = `
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    `;
                    const tbody = table.querySelector('tbody');

                    employees.forEach(employee => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${employee.name}</td>
                            <td>${employee.email}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="fireEmployee(${employee.id})">Despedir</button>
                                <button class="btn btn-warning btn-sm" onclick="promoteEmployee(${employee.id})">Ascender</button>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });

                    employeeList.appendChild(table);
                }
            })
            .catch(error => {
                console.error('Error al cargar los empleados:', error);
                employeeList.innerHTML = '<p>Error al cargar los empleados. Intenta de nuevo más tarde.</p>';
            });

        // Cargar los clientes dentro del modal
        employeeModal.addEventListener('show.bs.modal', function() {
            fetch('http://127.0.0.1:8000/employees/list?store=all')
                .then(response => response.json())
                .then(data => {
                    const clients = data.clients;
                    clientList.innerHTML = ''; // Limpiar contenido previo

                    if (clients.length === 0) {
                        clientList.innerHTML = '<p>No hay clientes disponibles.</p>';
                    } else {
                        const table = document.createElement('table');
                        table.classList.add('table', 'table-striped', 'table-hover');
                        table.innerHTML = `
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        `;
                        const tbody = table.querySelector('tbody');

                        clients.forEach(client => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td>${client.name}</td>
                                <td>${client.email}</td>
                                <td>
                                    <button class="btn btn-success btn-sm" onclick="hireClient(${client.id})">Contratar</button>
                                </td>
                            `;
                            tbody.appendChild(tr);
                        });

                        clientList.appendChild(table);
                    }
                })
                .catch(error => {
                    console.error('Error al cargar los clientes:', error);
                    clientList.innerHTML = '<p>Error al cargar los clientes. Intenta de nuevo más tarde.</p>';
                });
        });
    });

    // Función para ascender a un empleado
    function promoteEmployee(id) {
        fetch(`/employees/promote/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Mensaje de éxito
                location.reload(); // Recargar la página
            })
            .catch(error => console.error('Error al ascender el empleado:', error));
    }

    // Función para despedir a un empleado
    function fireEmployee(id) {
        fetch(`/employees/fire/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Mensaje de éxito
                location.reload(); // Recargar la página
            })
            .catch(error => console.error('Error al despedir el empleado:', error));
    }

    // Función para contratar un cliente
    function hireClient(id) {
        fetch(`/employees/contract/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Mensaje de éxito
                location.reload(); // Recargar la página
            })
            .catch(error => console.error('Error al contratar el cliente:', error));
    }
</script>
@endsection