<style>
    #wrapper {
    display: flex;
}

#sidebar {
    width: 250px; /* Ancho fijo del sidebar */
    position: fixed;
    height: 100vh;
    background-color: #343a40; /* Ajusta el color de fondo si es necesario */
}

#page-content-wrapper {
    margin-left: 200px; /* Mismo ancho que el sidebar */
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
                    <a class="nav-link text-white" href="{{ route('Usuarios.index') }}">
                        <div class="sb-nav-link-icon text-white">
                            <!-- Icono de inicio -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                                <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z" />
                                <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z" />
                                <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z" />
                                <path d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z" />
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
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                            </svg>
                        </div>
                        Acciones
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link text-white" href="{{ route('recarga.usuarios') }}">Recargar Tarjeta</a>
                            <a class="nav-link text-white" href="{{ route('saldo.usuarios') }}">Consultar Datos Tarjeta</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon text-white">
            </div>
            <!-- Pie de página de la barra lateral -->
            <div class="sb-sidenav-footer text-white" style="background-color: #2D3339;">
                <div class="small text-white">Iniciaste sesión como:</div>
                <?//php echo htmlspecialchars($tipoUsuario); ?>
            </div>
        </nav>
    </div>
</div>