@extends('layouts.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Administrador de Usuarios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Administrador de Usuarios</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <div class="container">
                    <!-- Búsqueda de usuario -->
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="nombre de usuario a buscar" id="searchUser">
                        <button class="btn btn-primary mt-2">Buscar</button>
                    </div>

                    <!-- Lista de usuarios -->
                    <div class="list-group">
                        @if ($usuarios->isEmpty())
                        <p>No hay usuarios registrados.</p>
                        @else
                        @foreach ($usuarios as $usuario)
                        <div class="media mb-3">
                            <img src="{{ asset($usuario->img) }}" height="200px" class="img-responsive align-self-start mr-3 rounded-circle" alt="User Image">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $usuario->nombre }} {{ $usuario->apellidop }} {{ $usuario->apellidom }}</h5>
                                <p>Correo: {{ $usuario->correo_electronico }}</p>
                                <p>Fecha de nacimiento: {{ $usuario->nacimiento }}</p>
                            </div>
                            <div class="media-right align-self-center">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-{{ $usuario->idusuario }}"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $usuario->idusuario }}"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>

                        <!-- Modal para Editar -->
                        <div class="modal fade" id="editModal-{{ $usuario->idusuario }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('usuarios.update', $usuario->idusuario) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" name="nombre" value="{{ $usuario->nombre }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nacimiento" class="form-label">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" name="nacimiento" value="{{ $usuario->nacimiento }}" required>
                                            </div>
                                            <!-- Añade otros campos que desees editar -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal para Eliminar -->
                        <div class="modal fade" id="deleteModal-{{ $usuario->idusuario }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('usuarios.destroy', $usuario->idusuario) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Eliminar Usuario</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar a {{ $usuario->nombre }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endforeach
                        @endif
                    </div>

                    </div>

                    <!-- Paginación -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection