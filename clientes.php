<?php
$persona = array(
    'datos' => array(
    'nombre' => 'Edwin Hernández',
    'correo' => 'fonsihernández8@gmail.com',
    'asunto' => 'Mas Información sobre TeContrato.com',
    'msg' => 'Se requiere mayor información sobre el funcionamiento de su página',
    'fono' => '5930996434838'
    )
);
include ('conexion.php'); 
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <title>Contrata un servicio</title>
    <link rel="icon" type="image/x-icon" href="assets/img/imagenes/minilogo.PNG" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="mainNav">
        <div class="container">
            <a class="masthead-subheading text-uppercase" href="index.php">TECONTRATO.COM</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>


            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" id="calificarusuario" href="">calificar
                            usuario</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" id="contratarservicio" href="">
                                Servicios</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="sugerencias.html">Sugerencias</a>
                    </li>




                </ul>

            </div>
    </nav>



    <div class="container-fluid bg-dark py-4 bt-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <img class="pt-5" src="assets/img/imagenes/logo.png">

                </div>
                <div class="col-sm-12">
                    <div class="container text-white">
                        <p class="lead">Encuentra al profesional ideal que te puede ayudar. Navega mediante nuestros
                            diversos filtros
                            para que encuentres exactamente a quien necesites.
                        </p>
                    </div>
                </div>
            </div>


        </div>

    </div>





    <div class="container-fluid">
        <div id="contratar">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <nav class="" id="sidebar">
                        <div class="p-4 pt-5">
                            <h5 style="color: black;">Categorías</h5>
                            <ul class="list-unstyled components mb-5">
                                <li>
                                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="true"
                                        class="dropdown-toggle">Experiencia</a>
                                    <ul class="collapse list-unstyled" style="display: unset" id="pageSubmenu2">
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>1 año</a></li>
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>2 años</a></li>
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>3 años</a></li>
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>+4 años</a></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false"
                                        class="dropdown-toggle">Lugar</a>
                                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Quito</a></li>
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Guayaquil</a></li>
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Cuenca</a></li>
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Otros</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false"
                                        class="dropdown-toggle">Clothes</a>
                                    <ul class="collapse list-unstyled" id="pageSubmenu4">
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Jeans</a></li>
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> T-shirt</a></li>
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Jacket</a></li>
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Shoes</a></li>
                                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Sweater</a></li>
                                    </ul>
                                </li>
                            </ul>


                        </div>
                    </nav>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <h1 class="display-4 text-center"><b>Contrata un servicio</b></h1>
                    <div class="card-deck p-4 pt-5">
                        <div class="row">
                            <?php
                            $query = "SELECT ID_TIPO, s.NOMBRE_SERVICIO,s.ID_SERVICIOS,l.ID_LUGAR,l.nombre_lugar,NOMBRE,CORREO,EDAD,TELEFONO,CELULAR,AN_EXPERIENCIA,FOTO,FACEBOOK,INSTAGRAM,ID_PERSONA FROM usuario, servicios s,lugar l 
                             WHERE usuario.ID_SERVICIOS = s.ID_SERVICIOS AND usuario.ID_LUGAR = l.ID_LUGAR  AND ESTATUS = 1 AND usuario.NOMBRE != 'ADMINISTRADOR DEL SISTEMA'";
                            $llenarPaneles = mysqli_query($conexion,$query);
                            $result = mysqli_num_rows($llenarPaneles);
                            if($result >0){
                                
                                while($data = mysqli_fetch_array($llenarPaneles)){
                                    ?>
                                                                <div class="col-md-6 col-lg-4 col-12 mb-5">
                                <div class="card align-items-center pt-4">
                                    <img class="rounded-circle"
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        alt="Generic placeholder image" width="140" height="140">

                                    <div class="card-body text-justify">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a
                                            natural
                                            lead-in
                                            to additional
                                            content. This content is a little bit longer.</p>
                                        <div class="text-center">
                                            <a class="btn btn-primary " style="color: black;" href="">Contactar</a>
                                            <div class="row pt-3">
                                                <div class="col-md-6">
                                                    Calificar:
                                                </div>
                                                <div class="col-md-6">
                                                    <form>

                                                        <p class="clasificacion">

                                                            <input id="radio1" type="radio" name="estrellas" value="5">
                                                            <!--
                                                                  --><label for="radio1">★</label>
                                                            <!--
                                                                  --><input id="radio2" type="radio" name="estrellas"
                                                                value="4">
                                                            <!--
                                                                  --><label for="radio2">★</label>
                                                            <!--
                                                                  --><input id="radio3" type="radio" name="estrellas"
                                                                value="3">
                                                            <!--
                                                                  --><label for="radio3">★</label>
                                                            <!--
                                                                  --><input id="radio4" type="radio" name="estrellas"
                                                                value="2">
                                                            <!--
                                                                  --><label for="radio4">★</label>
                                                            <!--
                                                                  --><input id="radio5" type="radio" name="estrellas"
                                                                value="1">
                                                            <!--
                                                                  --><label for="radio5">★</label>
                                                        </p>
                                                    </form>
                                                </div>
                                                <div class="col-md-12">
                                                    <a class="nav-link" href="#services">Ver trabajos Realizados</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                                    
                            <?php        
                                }
                            }
                            ?>
                            

                            
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div id="calificar">
            <div class="container">
                <h1 class="display-4 text-center"><b>Calificar usuarios</b></h1>
                <div class="card-deck pb-5 " style="color: white;">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-12 mb-5">
                            <div class="card align-items-center pt-4  bg-dark ">
                                <img class="rounded-circle"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                    alt="Generic placeholder image" width="140" height="140">

                                <div class="card-body text-center">
                                    <h5 class="card-title">Card title</h5>

                                    <div class="row">
                                        <div class="col-md-6 pt-3">
                                            Calificación:
                                        </div>
                                        <div class="col-md-6">
                                            <form>

                                                <p class="clasificacion">

                                                    <input id="radio1" type="radio" name="estrellas" value="5">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio1">★</label>
                                                    <!--
                                                          --><input id="radio2" type="radio" name="estrellas"
                                                        value="4">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio2">★</label>
                                                    <!--
                                                          --><input id="radio3" type="radio" name="estrellas"
                                                        value="3">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio3">★</label>
                                                    <!--
                                                          --><input id="radio4" type="radio" name="estrellas"
                                                        value="2">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio4">★</label>
                                                    <!--
                                                          --><input id="radio5" type="radio" name="estrellas"
                                                        value="1">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio5">★</label>
                                                </p>
                                            </form>
                                        </div>
                                        <div class="col-md-12">
                                            <a class="nav-link" href="#services">Ver trabajos Realizados</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-12 mb-5">
                            <div class="card align-items-center pt-4  bg-dark ">
                                <img class="rounded-circle"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                    alt="Generic placeholder image" width="140" height="140">

                                <div class="card-body text-center">
                                    <h5 class="card-title">Card title</h5>

                                    <div class="row">
                                        <div class="col-md-6 pt-3">
                                            Calificación:
                                        </div>
                                        <div class="col-md-6">
                                            <form>

                                                <p class="clasificacion">

                                                    <input id="radio1" type="radio" name="estrellas" value="5">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio1">★</label>
                                                    <!--
                                                          --><input id="radio2" type="radio" name="estrellas"
                                                        value="4">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio2">★</label>
                                                    <!--
                                                          --><input id="radio3" type="radio" name="estrellas"
                                                        value="3">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio3">★</label>
                                                    <!--
                                                          --><input id="radio4" type="radio" name="estrellas"
                                                        value="2">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio4">★</label>
                                                    <!--
                                                          --><input id="radio5" type="radio" name="estrellas"
                                                        value="1">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio5">★</label>
                                                </p>
                                            </form>
                                        </div>
                                        <div class="col-md-12">
                                            <a class="nav-link" href="#services">Ver trabajos Realizados</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-12 mb-5">
                            <div class="card align-items-center pt-4  bg-dark ">
                                <img class="rounded-circle"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                    alt="Generic placeholder image" width="140" height="140">

                                <div class="card-body text-center">
                                    <h5 class="card-title">Card title</h5>

                                    <div class="row">
                                        <div class="col-md-6 pt-3">
                                            Calificación:
                                        </div>
                                        <div class="col-md-6">
                                            <form>

                                                <p class="clasificacion">

                                                    <input id="radio1" type="radio" name="estrellas" value="5">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio1">★</label>
                                                    <!--
                                                          --><input id="radio2" type="radio" name="estrellas"
                                                        value="4">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio2">★</label>
                                                    <!--
                                                          --><input id="radio3" type="radio" name="estrellas"
                                                        value="3">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio3">★</label>
                                                    <!--
                                                          --><input id="radio4" type="radio" name="estrellas"
                                                        value="2">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio4">★</label>
                                                    <!--
                                                          --><input id="radio5" type="radio" name="estrellas"
                                                        value="1">
                                                    <!--
                                                          --><label style="font-size: x-large;" for="radio5">★</label>
                                                </p>
                                            </form>
                                        </div>
                                        <div class="col-md-12">
                                            <a class="nav-link" href="#services">Ver trabajos Realizados</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>




        </div>
    </div>
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
</body>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="js/contenidos.js"></script>

</html>