<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Marca de la barra de navegación -->
    <a class="navbar-brand ps-3" href="admin.php">PAYBUS</a>
    <!-- Botón de alternar barra lateral -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><svg class="svg-inline--fa fa-bars text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
            <path fill="currentColor" d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"></path>
        </svg><!-- <i class="fas fa-bars text-white"></i> Font Awesome fontawesome.com --></button>
    <!-- Búsqueda en la barra de navegación -->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
    </form>
    <!-- Menú desplegable de usuario en la barra de navegación -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            @auth
            <!-- Menú desplegable que muestra el nombre del usuario logueado -->
            <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg class="svg-inline--fa fa-user fa-fw" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path>
                </svg>
                <!-- Muestra el saludo y el nombre del usuario logueado -->
                Bienvenido, {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <!-- Botón para cerrar sesión que redirige a la página principal -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
            @else
            <!-- Si el usuario no está autenticado, muestra enlace de inicio de sesión -->
            <a class="nav-link text-white" href="{{ route('login') }}">Iniciar Sesión</a>
            @endauth
        </li>
    </ul>
</nav>