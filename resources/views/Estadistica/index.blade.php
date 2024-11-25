@extends('layouts.app')

@section('content')

<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


<main>
    <div class="container-fluid px-4">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <h1 class="mt-4">Estadísticas</h1>
            </div>
            <div class="col d-flex justify-content-end">
                <img src="assets/img/Logo_Proyecto_Final_Proyector.png" alt="PAYBUS" width=80 height=80>
            </div>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Estadísticas</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Visualización del registro de recargas
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <!-- Nuevo cuadro para mostrar las recargas por tipo de tarjeta -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-pie me-1"></i>
                Total de Recargas por Tipo de Tarjeta
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="recargasPorTipoTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tipo de Tarjeta</th>
                            <th>Total de Recargas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se llenarán los datos con JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                fetch('{{ route("estadisticas.total-recargas-por-tipo") }}')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        
                        const tableBody = document.querySelector('#recargasPorTipoTable tbody');
                        tableBody.innerHTML = data.map(row => `
                <tr>
                    <td>${row.Tipo_de_Tarjeta}</td>
                    <td>${row.total_de_recargas}</td
                </tr>
            `).join('');

                        const labels = data.map(row => row.Tipo_de_Tarjeta);
                        const values = data.map(row => parseFloat(row.total_de_recargas)); // Cambiar a Total_de_Recargas

                        const ctx = document.getElementById('myAreaChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Total de Recargas',
                                    data: values,
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderWidth: 1,
                                    pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    })
                    .catch(error => console.error('Error fetching data:', error));
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <audio id="audioScaner" src="assets/sonido.mp3"></audio>



        @endsection