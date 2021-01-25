<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Página Principal</title>
    <link rel="icon" type="image/x-icon" href="assets/img/imagenes/minilogo.PNG" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/estilos.css" rel="stylesheet" />

</head>
<?php
session_start();
if(!empty($_SESSION['active'])){

    if($_SESSION['ID_TIPO'] == 1){
        header("location: dashboard.php");

    }else{
        header("location: usuarios.php");
    }

}else{
    include ('conexion.php');
    if(isset($_POST['ingresar'])){
        $loginus = $_POST["emailin"];
        $loginpass = $_POST["passwordin"];
        if(empty($loginus)|| empty($pass) || trim($loginus) == "" || trim($loginpass) == ""){
            // header("Location: ../index.php");
            // exit();
            $alert = "Ingrese su usuario y su clave";
        }

        $buscarLogin = "SELECT ID_TIPO, s.NOMBRE_SERVICIO, NOMBRE,CORREO,PSWD FROM usuario, servicios s where CORREO= '$loginus' AND
        PSWD= '$loginpass' AND usuario.ID_SERVICIOS = s.ID_SERVICIOS";
        
        $ejecutarLogin = mysqli_query($conexion,$buscarLogin);
        $result = mysqli_num_rows($ejecutarLogin);

        if($result > 0){
            $row = mysqli_fetch_array($ejecutarLogin);
            
            $_SESSION['active'] = true;
            $_SESSION['CORREO'] = $loginus;
            $_SESSION['ID_TIPO'] = $row['ID_TIPO']; 
            $_SESSION['NOMBRE'] = $row['NOMBRE'];
            $_SESSION['NOMBRE_SERVICIO'] = $row[1];
            if($_SESSION['ID_TIPO'] == 1){
                header("location: dashboard.php");

            }else{
                header("location: usuarios.php");
            }
            
        }else{
            // header('location: index.php ');
            // exit();
            // session_destroy();
            $alert = "El usuario o la clave son incorrectos";
            echo '<script> 
            
           
                
                setTimeout(function() {
                    $(".alert").fadeOut(1500);
                    },3000);

                 </script>';
            session_destroy();
        }

        }

}

                       
$persona = array(
    'datos' => array(
    'nombre' => 'Edwin Hernández',
    'correo' => 'fonsihernández8@gmail.com',
    'asunto' => 'Mas Información sobre TeContrato.com',
    'msg' => 'Se requiere mayor información sobre el funcionamiento de su página',
    'fono' => '5930996434838'
    )
);                   
?>


<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="masthead-subheading text-uppercase" href="#page-top">TeContrato.com</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>


            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#page-top">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Equipo</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contactos</a></li>
                    <a class="btn btn-primary mr-3" style="width: fit-content;" data-toggle="modal"
                        data-target="#loginModal">Iniciar Sesión</a>
                    <a class="btn btn-primary" style="width: fit-content;" data-toggle="modal"
                        data-target="#registerModal">Registrarse</a>

                </ul>

            </div>
    </nav>
    <!-- Masthead-->

    <header class="masthead">
        
            <div class="alert container-fluid" >
                <p class="py-3" style="display: unset;background: #565F59;"><?php echo isset($alert)? $alert: ''; ?></p>
            </div>

       <div class="container">
            <div class="row align-items-end">
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="masthead-subheading">Bienvenid@ a:</div>

                    
                        <img style="width: 70%" src="assets/img/imagenes/logo.png">
                    
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <p class="text-uppercase">Albañilería</p>
                                <img class="d-block w-100 img-fluid img-thumbnail" src="assets/img/servicios/1.jpg">
                            </div>

                            <div class="carousel-item">
                                <p class="text-uppercase">Carpintería</p>
                                <img class="d-block w-100 img-fluid img-thumbnail" src="assets/img/servicios/2.jpg">
                            </div>
                            <div class="carousel-item">
                                <p class="text-uppercase">Plomería</p>
                                <img class="d-block w-100 img-fluid img-thumbnail" src="assets/img/servicios/3.jpg">
                            </div>
                            <div class="carousel-item">
                                <p class="text-uppercase">Soporte Técnico</p>
                                <img class="d-block w-100 img-fluid img-thumbnail" src="assets/img/servicios/4.jpg">
                            </div>
                            <div class="carousel-item">
                                <p class="text-uppercase">Transporte</p>
                                <img class="d-block w-100 img-fluid img-thumbnail" src="assets/img/servicios/5.jpg">
                            </div>
                            <div class="carousel-item">
                                <p class="text-uppercase">Servicio de cuidado de Niños</p>
                                <img class="d-block w-100 img-fluid img-thumbnail" src="assets/img/servicios/6.jpg">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger mt-4" style="color: black;"
                        href="usuarios.html">Contratar Servicio</a>

                </div>
            </div>

        </div>
    </header>
    <!-- Services-->
    <section class="page-section bg-light" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Servicios</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="servicios-img">
                        <img class="mx-auto " src="assets/img/servicios/1.jpg" alt="" />
                        <h3 class="section-subheading text-muted text-center py-4 text-uppercase">Albañilería<br>

                        </h3>

                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="servicios-img">
                        <img class="mx-auto" src="assets/img/servicios/2.jpg" alt="" />
                        <h3 class="section-subheading text-muted text-center py-4 text-uppercase">Carpintería<br>

                        </h3>

                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="servicios-img">
                        <img class="img-fluid" src="assets/img/servicios/3.jpg" alt="" />
                        <h3 class="section-subheading text-muted text-center py-4 text-uppercase">Plomería<br>

                        </h3>

                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="servicios-img">
                        <img class="img-fluid" src="assets/img/servicios/4.jpg" alt="" />
                        <h3 class="section-subheading text-muted text-center py-4 text-uppercase">Soporte Técnico<br>

                        </h3>

                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <div class="servicios-img">
                        <img class="img-fluid" src="assets/img/servicios/5.jpg" alt="" />
                        <h3 class="section-subheading text-muted text-center py-4 text-uppercase">Transporte<br>

                        </h3>

                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="servicios-img">
                        <img class="img-fluid" src="assets/img/servicios/6.jpg" alt="" />
                        <h3 class="section-subheading text-muted text-center py-4 text-uppercase"> Servicio de cuidado
                            de Niños<br>

                        </h3>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portafolio -->

    <!-- Equipos-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Integrantes</h2>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <p class="large text-muted">Conoce al equipo encargado  de que toda esta empresa funcione de la 
                            mejor manera para todos nuestros usuarios.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/jefry.jpg" alt="" />
                        <h4>Jefry Navas</h4>
                        <p class="text-muted">Lead Designer</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://github.com/JefryNavas" target="_blank"><i
                                class="fab fa-github"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/jefry.navas"
                            target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2"
                            href="https://www.linkedin.com/in/jefry-navas-silva-87924a204/" target="_blank"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/Edwin.jpg" alt="" />
                        <h4>Edwin Hernández</h4>
                        <p class="text-muted">Lead Developer</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://github.com/fonsiher"><i class="fab fa-github"
                                target="_blank"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/profile.php?id=100001976085138"><i class="fab fa-facebook-f"
                                target="_blank"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/edwin-hern%C3%A1ndez-090306202/"><i class="fab fa-linkedin-in"
                                target="_blank"></i></a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="team-member">

                        
                        <img class="mx-auto rounded-circle" src="assets/img/team/Aliss.jpg" alt="" />
                        <h4>Alisson Vizcaíno</h4>
                        <p class="text-muted">Lead Marketer </p>
                        <a class="btn btn-dark btn-social mx-2" href="https://github.com/aly9899"><i class="fab fa-github"
                                target="_blank"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/alyzz.vizcaino"><i class="fab fa-facebook-f"
                                target="_blank"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/alisson-vizcaíno-a769511ba"><i class="fab fa-linkedin-in"
                                target="_blank"></i></a>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/Amarilis.jpg" alt="" />
                        <h4>Amarilis Cueva</h4>
                        <p class="text-muted">Former Designer</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://github.com/Amarilis7616"><i class="fab fa-github"
                                target="_blank"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/amarilisCueva16/"
                            target="_blank"><i class="fab fa-facebook-f"></i></a>

                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/Joel.jpg" alt="" />
                        <h4>Joel Yunga</h4>
                        <p class="text-muted">Former Marketer</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://github.com/JoelYunga"><i class="fab fa-github"
                                target="_blank"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://m.facebook.com/joel.pm.10"><i class="fab fa-facebook-f"
                                target="_blank"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/joel-yunga-1b899a204"><i class="fab fa-linkedin-in"
                                target="_blank"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Clients-->



    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contáctanos</h2>
                <h3 class="section-subheading text-muted">_</h3>
            </div>
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="name" type="text" placeholder="Tu nombre *"
                                required="required" data-validation-required-message="Please enter your name." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="email" type="email" placeholder="Tu email *"
                                required="required"
                                data-validation-required-message="Please enter your email address." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group mb-md-0">
                            <input class="form-control" id="phone" type="tel" placeholder="Tu teléfono *"
                                required="required"
                                data-validation-required-message="Please enter your phone number." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <textarea class="form-control" id="message" placeholder="Escribe un mensaje *"
                                required="required"
                                data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div id="success"></div>
                    <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Enviar
                        Mensaje</button>
                </div>
            </form>
        </div>
    </section>


    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-3 col-md-4 col-lg-4 text-lg-left">Copyright © TeContrato.com 2021</div>
                <div class="col-sm-6 col-md-4 col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="mailto:
                <?php echo $persona["datos"]["correo"]; ?>
                ?subject=<?php echo $persona["datos"]["asunto"]; ?>
                &body=<?php echo $persona["datos"]["msg"]; ?>
                "><i class="fas fa-envelope-open-text"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://api.whatsapp.com/send?phone=
                    <?php echo $persona["datos"]["fono"]; ?>&text=<?php echo $persona["datos"]["msg"]; ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
                <div class="col-sm-3 col-md-4 col-lg-4 text-lg-right">
                    <a class="mr-3" href="#!">Políticas de Privacidad</a>
                    <a href="#!">Términos de Uso</a>
                </div>
            </div>
        </div>
    </footer>


    <!-- Modal Iniciar Sesión -->

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-title text-center">
                        <h4 class="text-uppercase">Iniciar Sesión</h4>
                        <img src="assets/img/imagenes/iniciar2.png" alt="">
                    </div>
                    <div class="d-flex flex-column text-center">
                        <form  action = '' name='formularioingresar' method='POST'>
                            <div class="form-group">
                                <input type="email" name="emailin" class="form-control" placeholder="Tu correo ...">
                            </div>
                            <div class="form-group">
                                <input type="password" name="passwordin" class="form-control"
                                    placeholder="Tu contraseña ...">
                            </div>
                            
                            <input type="submit" class="btn btn-primary btn-block btn-round" name='ingresar' id="ingresar" value ='Iniciar Sesión'>
                        </form>



                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <div class="signup-section">¿No eres miembro todavía? <a id="iniciar" data-toggle="modal"
                            data-target="#registerModal" class="text-info">Regístrate</a>.</div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-4">
                    <h4 class="text-uppercase text-center mb-4">Registrarse</h4>

                    <div class="row align-items-center">

                        <div class="co-sm-12 co-md-12">
                            <div class="form-title text-center">

                                <img src="assets/img/imagenes/iniciar2.png" alt="">
                            </div>
                        </div>
                        <div class="co-sm-6 co-md-12">
                            <div class="d-flex flex-column text-center">
                                <form id='formulario' class="formulario1" name='formularioregistrar' method='POST'>
                                    <div class="form-group">
                                        <?php
                                        include 'conexion.php';
                                        $consulta = 'SELECT * FROM servicios';
                                        $ejecutar = mysqli_query($conexion,$consulta);
                                        ?>
                                        <select name="servicio" class="form-control" >
                                            <option value="" >Qué servicio ofrece:</option>
                                            <?php foreach ($ejecutar as $opciones):?>
                                                <option value="<?php echo $opciones['ID_SERVICIOS']?>"><?php echo $opciones['NOMBRE_SERVICIO'] ?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        include 'conexion.php';
                                        $consulta = 'SELECT * FROM lugar';
                                        $ejecutar = mysqli_query($conexion,$consulta);
                                        ?>
                                        <select name="lugar" class="form-control">
                                            <option value="" >En qué ciudad trabaja:</option>
                                            <?php foreach ($ejecutar as $opciones):?>
                                                <option value="<?php echo $opciones['ID_LUGAR']?>"><?php echo $opciones['nombre_lugar'] ?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name='nombre' class="form-control" placeholder="Tu nombre ..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name='edad' class="form-control" placeholder="Tu edad ..." required>
                                    </div>
                       
                                    <div class="form-group">
                                        <input type="email" name='email' class="form-control" placeholder="Tu email ..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="id_pwd" name="password1" class="form-control" placeholder="Tu contraseña ..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password2"
                                            placeholder="Confirmar Contraseña ..." required>
                                    </div>
                                    <!-- <h7>Tus Redes Sociales (opcional) </h7>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enlace de tu perfil de Facebook">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enlace de tu perfil de Instragram">
                                    </div> -->
                                    <input type="submit" class="btn btn-primary btn-block btn-round" name='registrarse' value ='Regístrate'>
                                </form>
                            </div>
                            <?php
                            if(isset($_POST['registrarse'])){
                                $servicio = $_POST["servicio"];
                                $lugar = $_POST["lugar"];
                                $nombre = $_POST["nombre"];
                                $edad = $_POST["edad"];
                                $correo = $_POST["email"];
                                $contra = $_POST["password1"];

                                $insertarDatos = "INSERT INTO usuario VALUES (NULL,'2','$servicio','$lugar','$nombre','$edad'
                                ,'$correo','$contra',NULL, NULL, NULL, NULL, NULL, NULL)";
                                include 'conexion.php';
                                $ejecutarInsertar = mysqli_query($conexion,$insertarDatos);
                                // session_destroy();
                                // header('location: index.php');
                                if(!$ejecutarInsertar){
                                    echo "Error en la linea SQL";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer d-flex justify-content-center">
                        <div class="signup-section">¿No eres miembro todavía? <a id="registrar" data-toggle="modal"
                                data-target="#registerModal" class="text-info">Iniciar</a>.</div>
                    </div>

                </div>

            </div>
        </div>

    </div>


    <!-- Bootstrap core JS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="js/modal.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="js/validacion.js"></script>

</body>

</html>