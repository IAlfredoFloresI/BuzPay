@extends('layouts.app')

@section('title', 'Administrador de Usuarios')

@section('content')
    <h1 class="mt-4">Administrador de Usuarios</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Administrador de Usuarios</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Administrador de Usuarios</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                        <li class="breadcrumb-item active">Administrador de Usuarios</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="nombre de usuario a buscar"
                                        id="searchUser">
                                    <button class="btn btn-primary mt-2">Buscar</button>
                                </div>
                                <div class="list-group">
                                    <div class="media mb-3">
                                        <img src="../img/foto_1.jpeg" height="200px"
                                            class="img-responsive align-self-start mr-3 rounded-circle"
                                            alt="User Image">

                                        <div class="media-body">
                                            <h5 class="mt-0">Adrian Yahir Solis Garcia</h5>
                                            <p>Correo: asolisgarcia850@gmail.com</p>
                                            <p>Fecha de nacimiento: 09-11-2002</p>
                                            <p>Sexo: Hombre</p>
                                        </div>
                                        <div class="media-right align-self-center">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editModal"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </div>


                                    <div class="list-group">
                                        <div class="media mb-3">
                                            <img src="../img/foto_4.jpeg" height="200px"
                                                class="img-responsive align-self-start mr-3 rounded-circle"
                                                alt="User Image">
                                            <div class="media-body">
                                                <h5 class="mt-0">Alonso Alejandro Mendoza Lizarraga</h5>
                                                <p>Correo:alonso110605@gmail.com</p>
                                                <p>Fecha de nacimiento: 11-06-2005</p>
                                                <p>Sexo: Sin experiencia</p>
                                            </div>
                                            <div class="media-right align-self-center">
                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editModal"><i class="bi bi-pencil"></i></button>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </div>



                                        <div class="list-group">
                                            <div class="media mb-3">
                                                <img src="../img/foto_3.jpeg" height="200px"
                                                    class="img-responsive align-self-start mr-3 rounded-circle"
                                                    alt="User Image">
                                                <div class="media-body">
                                                    <h5 class="mt-0">Jose Daniel Cruz Lopez</h5>
                                                    <p>Correo: gcaamal_18@outlook.es</p>
                                                    <p>Fecha de nacimiento: 18-06-02</p>
                                                    <p>Sexo: Hombre</p>
                                                </div>
                                                <div class="media-right align-self-center">
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editModal"><i
                                                            class="bi bi-pencil"></i></button>
                                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"><i
                                                            class="bi bi-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>


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

                                    <!-- Modal de Borrar usuario -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Borrar usuario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Estás seguro de que deseas borrar este usuario?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-danger">Borrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal de Editar usuario -->
                                    <div class="modal fade" id="editModal" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Editar usuario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="editNombre" class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" id="editNombre"
                                                                value="Adrian Yahir Solis Garcia">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editCorreo" class="form-label">Correo</label>
                                                            <input type="email" class="form-control" id="editCorreo"
                                                                value="asolisgarcia850@gmail.com">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editFechaNacimiento" class="form-label">Fecha de
                                                                nacimiento</label>
                                                            <input type="date" class="form-control"
                                                                id="editFechaNacimiento" value="2002-11-09">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editSexo" class="form-label">Sexo</label>
                                                            <select class="form-control" id="editSexo">
                                                                <option value="hombre" selected>Hombre</option>
                                                                <option value="mujer">Mujer</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editProfileUrl" class="form-label">URL de la
                                                                Imagen de Perfil</label>
                                                            <input type="url" class="form-control" id="editProfileUrl"
                                                                value="../img/yo.jpg">
                                                        </div>
                                                        <button type="submit" class="btn btn-success">Guardar
                                                            cambios</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="loginModal" tabindex="-1"
                                        aria-labelledby="loginModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Correo</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="email-addon"><i
                                                                        class="bi bi-envelope-fill"></i></span>
                                                                <input type="email" class="form-control" id="email"
                                                                    placeholder="correo registrado" aria-label="Correo"
                                                                    aria-describedby="email-addon">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="password-addon"><i
                                                                        class="bi bi-key-fill"></i></span>
                                                                <input type="password" class="form-control"
                                                                    id="password" placeholder="correo registrado"
                                                                    aria-label="Password"
                                                                    aria-describedby="password-addon">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">Login</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </form>
                                                    <hr>
                                                    <p>No tienes cuenta? <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#registerModal">Registrate
                                                            aquí</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="registerModal" tabindex="-1"
                                        aria-labelledby="registerModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="registerModalLabel">Registrarse</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="nombre" class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" id="nombre"
                                                                placeholder="Nombre" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="apellidos" class="form-label">Apellidos</label>
                                                            <input type="text" class="form-control" id="apellidos"
                                                                placeholder="Apellidos" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="registerEmail" class="form-label">Correo</label>
                                                            <input type="email" class="form-control" id="registerEmail"
                                                                placeholder="Correo" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="registerPassword"
                                                                class="form-label">Contraseña</label>
                                                            <input type="password" class="form-control"
                                                                id="registerPassword" placeholder="Contraseña" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="confirmPassword" class="form-label">Confirmar
                                                                Contraseña</label>
                                                            <input type="password" class="form-control"
                                                                id="confirmPassword" placeholder="Confirmar Contraseña"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="birthYear" class="form-label">Año de
                                                                Nacimiento</label>
                                                            <input type="date" class="form-control" id="birthYear"
                                                                placeholder="Año de Nacimiento" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="sexo" class="form-label">Sexo</label>
                                                            <select class="form-date" id="sexo" required>
                                                                <option value="hombre">Hombre</option>
                                                                <option value="mujer">Mujer</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="profileUrl" class="form-label">URL de la Imagen
                                                                de Perfil</label>
                                                            <input type="url" class="form-control" id="profileUrl"
                                                                placeholder="URL de la Imagen de Perfil" required>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-success">Registrarse</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Cerrar Sesión -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="background-color: #4A4A9C;">
                            <div class="modal-header" style="background-color: #FFD700;">
                                <h5 class="modal-title" id="logoutModalLabel">PAYBUS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <p style="color: white;">¿Seguro que quiere cerrar sesión?</p>
                                <button type="button" class="btn btn-warning"><a class="text-white" href="index.html">Cerrar Sesión</a></button>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
        </div>
    </div>
@endsection