<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PAYBUS</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/Camión_Icono.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="assets/img/Camión_Icono.png" alt="..." width="40"
                    height="10" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                PAYBUS
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#Inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#QS">¿Quiénes somos?</a></li>
                    <li class="nav-item"><a class="nav-link" href="#MyV">Misión y Visión</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Consulta tu saldo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Siguenos">Síguenos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Inicio-->
    <header id="Inicio" class="masthead">
        <div class="container">
            <div class="masthead-subheading">¡Hola!</div>
            <h1 id="TPAYBUS" class="masthead-heading text-uppercase display-4 fw-bold text-body-emphasis">Bienvenido a
                PAYBUS</h1>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services" data-bs-toggle="modal"
                data-bs-target="#loginModal">Inicia Sesión</a>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services" data-bs-toggle="modal"
                data-bs-target="#registerModal">Registrate</a>
        </div>
    </header>
    <main>
        <!-- ¿Quiénes somos? -->
        <section class="page-section" id="QS">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">¿Quiénes somos?</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <img src="assets/img/Logo_Proyecto_Final_Proyector.png" alt="PAYBUS" width="270" height="230">
                        <h4 class="my-3">PAYBUS</h4>
                        <p class="text-muted">Somos un equipo universitario apasionado por la movilidad sostenible y la
                            innovación tecnológica. Nuestro proyecto de recargas de transporte público busca facilitar
                            la
                            vida de los usuarios y contribuir a los negocios emergentes, ya sean negocios medianos y
                            chicos,
                            PAYBUS es un beneficio facil de utilizar para el usuario que usa el transporte público.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Misión y Visión -->
        <section class="page-section" id="MyV">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Misión y Visión</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Misión</h4>
                        <p class="text-muted">Ser un software que brinda la transformación del método de pago del
                            transporte
                            público, utilizando tarjetas recargables.</p>
                    </div>
                    <div class="col-md-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Visión</h4>
                        <p class="text-muted">Ser la primera empresa en abarcar este sistema a todos los estados de
                            México,
                            mediante la ampliación de las alternativas de recargas al público, dando lugar un sistema de
                            recaudo eficiente, transparente y seguro.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Consulta tu saldo -->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Consulta tu saldo</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group mb-md-0">
                                <h3 class="text-white">Escribe tu Folio:</h3>
                                <input class="form-control" id="Folio" type="text" placeholder="Folio*"
                                    data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is
                                    required.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-primary btn-xl text-uppercase" type="submit" value="Consultar">
                        <input class="btn btn-primary btn-xl text-uppercase" type="reset" value="Borrar">
                    </div>
                </form>
                <!-- Aquí termina el formulario -->
                <!-- Aquí comienza el cuadro de resultado para el saldo -->
                <div id="resultadoSaldo" style="display:none;">
                    <h4>Resultado de la consulta de saldo:</h4>
                    <p>Tu saldo es: $0.00</p>
                </div>
                <!-- Aquí termina el cuadro de resultado para el saldo -->
                <!-- Aquí comienza el cuadro de resultado para la fecha de vencimiento -->
                <div id="resultadoFecha" style="display:none;">
                    <h4>Fecha de vencimiento:</h4>
                    <p>La fecha de vencimiento es: DD/MM/AAAA</p>
                </div>
                <!-- Aquí termina el cuadro de resultado para la fecha de vencimiento -->
            </div>
        </section>

        <section id="Modales">
            <!-- Modal de Iniciar Sesión -->
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="email-addon"><i
                                                class="bi bi-envelope-fill"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-wallet-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542s.987-.254 1.194-.542C9.42 6.644 9.5 6.253 9.5 6a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2z" />
                                                    <path
                                                        d="M16 6.5h-5.551a2.7 2.7 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5s-1.613-.412-2.006-.958A2.7 2.7 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5z" />
                                                </svg></i></span>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Correo registrado" aria-label="Correo"
                                            aria-describedby="email-addon">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="password-addon"><i
                                                class="bi bi-key-fill"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-key-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                                </svg></i></span>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Contraseña" aria-label="Password"
                                            aria-describedby="password-addon">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" src=""><a class="text-white" href="admin.html">Iniciar Sesión</a></button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </form>
                            <hr>
                            <p>No tienes cuenta? <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#registerModal">Registrate aquí</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de Registro -->
            <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="registerModalLabel">Registrate</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="registerEmail" class="form-label">Correo Electrónico</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="registerEmail-addon"><i
                                                class="bi bi-envelope-fill"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-wallet-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542s.987-.254 1.194-.542C9.42 6.644 9.5 6.253 9.5 6a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2z" />
                                                    <path
                                                        d="M16 6.5h-5.551a2.7 2.7 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5s-1.613-.412-2.006-.958A2.7 2.7 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5z" />
                                                </svg></i></span>
                                        <input type="email" class="form-control" id="registerEmail"
                                            placeholder="nombre@ejemplo.com" aria-label="Correo Electrónico"
                                            aria-describedby="registerEmail-addon">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="registerPassword" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="registerPassword-addon"><i
                                                class="bi bi-key-fill"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-key-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                                </svg></i></span>
                                        <input type="password" class="form-control" id="registerPassword"
                                            placeholder="Contraseña" aria-label="Contraseña"
                                            aria-describedby="registerPassword-addon">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirmar Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="confirmPassword-addon"><i
                                                class="bi bi-key-fill"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-key-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                                </svg></i></span>
                                        <input type="password" class="form-control" id="confirmPassword"
                                            placeholder="Confirmar Contraseña" aria-label="Confirmar Contraseña"
                                            aria-describedby="confirmPassword-addon">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer-->
    <footer id="Siguenos" class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2"
                        href="https://www.instagram.com/paybusutm?igsh=MWY3cnF0cGJ6bTB5Zw==" aria-label="Twitter"><i
                            class="fab fa-instagram"></i></a>
                    <a class="btn btn-dark btn-social mx-2"
                        href="https://www.facebook.com/profile.php?id=61561058630649&mibextid=ZbWKwL"
                        aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="js/scriptsP.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>