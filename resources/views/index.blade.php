<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Meta tags y configuración de la página -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PAYBUS</title>
    <link rel="icon" type="image/x-icon" href="assets/img/Camión_Icono.png" />
    <script src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/face-api.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/css_menuop.css" rel="stylesheet" />
    <style>
        .btn-google {
            display: inline;
            align-items: center;
            justify-content: center;
            background-color: white;
            color: #4285F4;
            border: none;
            border-radius: 50%;
            padding: 10px;
            width: 50px;
            height: 50px;
            font-size: 0;
        }

        .btn-google img {
            width: 24px;
            height: 24px;
        }

        #olvidemipassword {
            display: inline-block;
            margin-left: 145px;
            /* Separa el enlace de "Olvidaste tu contraseña" del checkbox */
            vertical-align: middle;
            /* Alinea verticalmente el enlace con el checkbox */
        }
    </style>
    <style>
        #faceid-video {
            border: 2px solid #000;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body id="page-top">



    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="assets/img/Camión_Icono.png" alt="PAYBUS" width="40"
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
    <!-- Encabezado de la página -->
    <header id="Inicio" class="masthead">
        <div class="container">
            <h4 id="TPAYBUS" class="masthead-heading text-uppercase display-4 fw-bold text-body-emphasis">Bienvenido a
                PAYBUS</h4>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-30">
                        <ul class="menu MenuOp">
                            <li class="N">
                                <div>
                                    <h2>Negocios</h2>
                                    <br>
                                    <p>Para negocios registrados al servicio.</p>
                                    @if (Auth::check())
                                    <a href="{{ url('/admin') }}" class="btn btn-primary">Administración</a>
                                    @else
                                    <a class="btn btn-primary btn-xl text-uppercase" href="#services"
                                        data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</a>
                                    @endif
                                </div>
                            </li>
                            <li class="CS">
                                <div>
                                    <h2>Consulta tu Saldo</h2>
                                    <br>
                                    <p>Consulta los datos de tu tarjeta de PAYBUS.</p>
                                    <a class="btn btn-primary btn-xl text-uppercase" href="#contact"
                                        data-bs-target="#contact">Ir a consulta</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <!-- Sección Quiénes Somos -->
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
                            la vida de los usuarios y contribuir a los negocios emergentes, ya sean negocios medianos y
                            chicos, PAYBUS es un beneficio facil de utilizar para el usuario que usa el transporte
                            público.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sección Misión y Visión -->
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
                            transporte público, utilizando tarjetas recargables.</p>
                    </div>
                    <div class="col-md-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Visión</h4>
                        <p class="text-muted">Ser la primera empresa en abarcar este sistema a todos los estados de
                            México, mediante la ampliación de las alternativas de recargas al público, dando lugar un
                            sistema de recaudo eficiente, transparente y seguro.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sección Consulta tu saldo -->
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
                                <input class="form-control" id="folio" type="text" placeholder="folio*"
                                    data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is
                                    required.</div>
                                <div class="text-center">
                                    <br>
                                    <button class="btn btn-primary btn-xl text-uppercase" type="button"
                                        onclick="consultarFolio()">Consultar</button>
                                    <input class="btn btn-primary btn-xl text-uppercase" type="reset" value="Borrar">
                                </div>
                            </div>
                            <br>
                            <div class="field">
                                <label for="saldo">Saldo Actual de la Tarjeta:</label>
                                <input class="form-control" type="text" id="saldo" name="saldo"
                                    placeholder="Saldo actual" readonly>
                            </div>
                            <div class="field">
                                <label for="fecha-vencimiento">Fecha de Vencimiento de la Tarjeta:</label>
                                <input class="form-control" type="text" id="fecha-vencimiento"
                                    placeholder="Fecha de vencimiento" name="fecha-vencimiento" readonly>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Script para consultar el folio -->
                <script>
                    function consultarFolio() {
                        var id = document.getElementById('folio').value;
                        fetch('controller/card_controller.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: 'id=' + id
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.error) {
                                    alert(data.error);
                                } else {
                                    document.getElementById('saldo').value = data.saldoTotal || '0.00';
                                    document.getElementById('fecha-vencimiento').value = data.venciTarjeta || 'N/A';
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred: ' + error.message);
                            });
                    }
                </script>
            </div>
        </section>

        <!-- Sección de Modales para Login y Registro -->

        <!-- Modal de Login -->

        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="loginForm" action="{{ route('login') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    <li>El email o la contraseña son incorrectos</li>
                                </ul>
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="block mt-4">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Recordarme</label>
                                    <div class="form-group" id="olvidemipassword">
                                        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                    </div>
                                </div>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>

                            <!-- Botón de Google -->
                            <a href="{{ route('auth.google') }}" class="btn btn-google">
                                <img src="assets/img/googleico.png" alt="Google Icon" /> Iniciar Sesión con Google
                            </a>

                            <button type="button" class="btn btn-outline-success" id="openFaceIDModalLogin" data-action="login">Iniciar Sesión con FaceID</button>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </form>
                        <hr>
                        <p class="text-center">
                            ¿No tienes cuenta? <a href="#" id="openRegisterModal">¡Regístrate aquí!</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal de Registro -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Regístrate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="registerForm" action="{{ route('register') }}" method="POST" onsubmit="return validateForm();">
                            @csrf
                            <div class="mb-3">
                                <label for="registerName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="registerName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerCurp" class="form-label">CURP</label>
                                <input type="text" class="form-control" id="registerCurp" name="curp" required maxlength="18">
                                <div id="curpError" class="text-danger" style="display: none;">CURP inválido. Debe seguir el formato adecuado.</div>
                            </div>
                            <div class="mb-3">
                                <label for="registerNacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="registerNacimiento" name="nacimiento" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerEmail" class="form-label">Correo Electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="registerEmail-addon"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" class="form-control" id="registerEmail" name="email" placeholder="nombre@ejemplo.com" aria-label="Correo Electrónico" aria-describedby="registerEmail-addon" required>
                                </div>
                                <div id="emailError" class="text-danger" style="display: none;">Correo electrónico inválido.</div>
                            </div>
                            <div class="mb-3">
                                <label for="registerPassword" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="registerPassword-addon"><i class="bi bi-key-fill"></i></span>
                                    <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="registerPassword-addon" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirmar Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="confirmPassword-addon"><i class="bi bi-key-fill"></i></span>
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirmar Contraseña" name="password_confirmation" aria-label="Confirmar Contraseña" aria-describedby="confirmPassword-addon" required>
                                </div>
                                <div id="passwordError" class="text-danger" style="display: none;">Las contraseñas no coinciden.</div>
                            </div>

                            <button type="button" class="btn btn-outline-success" id="openFaceIDModalCapture" data-action="capture">Capturar FaceID</button>


                            <button type="submit" class="btn btn-primary">Registrarse</button>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </form>
                        <hr>
                        <div id="facialMessage" class="text-center mt-3"></div>
                        <p class="text-center">
                            ¿Ya tienes cuenta? <a href="#" id="openLoginModal">¡Inicia Sesión aquí!</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de FacialID -->
        <div class="modal fade" id="faceIDModal" tabindex="-1" aria-labelledby="faceIDModalLabel" aria-hidden="true">



            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="faceIDModalLabel">Captura tu FacialID</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="video-container">
                            <canvas id="overlay" style="position: absolute; top: 0; left: 0;"></canvas>
                            <video id="video" autoplay muted></video>
                        </div>
                        <p id="validationMessage" class="text-danger"></p>
                        <button id="captureFace" class="btn btn-secondary" disabled>Guardar FacialID</button>
                    </div>
                </div>
            </div>
        </div>




        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
                const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));

                // Manejar clics en enlaces para abrir modales
                document.getElementById('openRegisterModal').addEventListener('click', function() {
                    if (loginModal._isShown) {
                        loginModal.hide();
                    }
                    registerModal.show();
                });

                document.getElementById('openLoginModal').addEventListener('click', function() {
                    if (registerModal._isShown) {
                        registerModal.hide();
                    }
                    loginModal.show();
                });

                // Cerrar el modal de registro manualmente
                document.querySelectorAll('#registerModal .btn-close').forEach(button => {
                    button.addEventListener('click', function() {
                        registerModal.hide();
                    });
                });

                // Cerrar el modal de login manualmente
                document.querySelectorAll('#loginModal .btn-close').forEach(button => {
                    button.addEventListener('click', function() {
                        loginModal.hide();
                    });
                });
            });
        </script>



        <script>
            function validateForm() {
                const curp = document.getElementById("registerCurp").value;
                const email = document.getElementById("registerEmail").value;
                const password = document.getElementById("registerPassword").value;
                const confirmPassword = document.getElementById("confirmPassword").value;

                // Validar formato CURP
                const curpRegex =
                    /^([A-Z][AEIOU][A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TL|TS|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]\d)$/;
                if (!curpRegex.test(curp)) {
                    document.getElementById("curpError").style.display = "block";
                    return false;
                }
                document.getElementById("curpError").style.display = "none";

                // Validar coincidencia de contraseñas
                if (password !== confirmPassword) {
                    document.getElementById("passwordError").style.display = "block";
                    return false;
                }
                document.getElementById("passwordError").style.display = "none";

                return true;
            }
        </script>

    </main>

    <!-- Pie de página -->
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

    <!-- Scripts de JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="js/scriptsP.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    
    <!-- Script de FaceID -->
    <script src="{{ asset('js/faceid.js') }}"></script>


</body>

</html>