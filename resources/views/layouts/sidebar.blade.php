<style>
    #wrapper {
        display: flex;
    }

    #sidebar {
        width: 250px;
        /* Ancho fijo del sidebar */
        position: fixed;
        height: 100vh;
        background-color: #343a40;
        /* Ajusta el color de fondo si es necesario */
    }

    .sb-sidenav-footer {
        position: absolute;
        /* Posiciona el contenedor dentro del sidebar */
        bottom: 0;
        /* Lo fija al fondo del contenedor padre */
        left: 0;
        /* Asegura que quede alineado a la izquierda */
        width: 100%;
        /* Asegura que ocupe todo el ancho del sidebar */
        padding: 10px;
        /* Agrega espacio interno */
        background-color: #2D3339;
        /* Color de fondo */
        text-align: center;
        /* Centra el contenido */
        color: white;
        /* Color de texto */
    }

    #page-content-wrapper {
        margin-left: 200px;
        /* Mismo ancho que el sidebar */
        width: calc(100% - 250px);
        padding: 20px;
    }
</style>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <!-- Barra lateral de navegación -->
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu" style="background-color: #343A40;">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading text-white">General</div>
                    <a class="nav-link text-white" href="{{ route('admin.index') }}">
                        <div class="sb-nav-link-icon text-white">
                            <!-- Icono de inicio -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                                <path
                                    d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z" />
                                <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z" />
                                <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z" />
                                <path
                                    d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z" />
                                <path d="M12 9h2V8h-2z" />
                            </svg>
                        </div>
                        Inicio
                    </a>

                    <div class="sb-sidenav-menu-heading text-white">Operaciones</div>
                    <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon text-white">
                            <!-- Icono de acciones -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-credit-card text-white" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                            </svg>
                        </div>
                        Acciones
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-white" href="{{ route('recarga.form') }}">Recargar Tarjeta</a>
                            <a class="nav-link text-white" href="{{ route('card.consultar') }}">Consultar Datos
                                Tarjeta</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon text-white">
                            <!-- Icono de autentificación -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-columns-gap text-white" viewBox="0 0 16 16">
                                <path
                                    d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z" />
                            </svg>
                        </div>
                        Administrativo
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <!--Corregir cuando pongas puestos-->
                            <a class="nav-link text-white" href="{{ route('employees.index') }}">Administración de
                                usuarios</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading text-white">Tienda:</div>
                    <a class="nav-link text-white" href="{{ route('estadisticas') }}">
                        <div class="sb-nav-link-icon text-white">
                            <!-- Icono de estadísticas -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-graph-up text-white" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07" />
                            </svg>
                            Estadísticas
                        </div>
                    </a>
                    <a class="nav-link text-white" href="{{ route('cierreCaja.index') }}">
                        <div class="sb-nav-link-icon text-white">
                            <!-- Icono de cierre de caja -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-table text-white" viewBox="0 0 16 16">
                                <path
                                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z" />
                            </svg>
                        </div>
                        Cierre de Caja
                    </a>
                </div>
            </div>

        </nav>
        <div class="sb-sidenav-footer text-white" style="background-color: #2D3339;">
            <div class="small text-white">Iniciaste sesión como:</div>
            Administrador
        </div>
    </div>
</div>