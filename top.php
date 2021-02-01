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
    <title>Nuestro Top 10</title>
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
                        <p class="lead">Mira nuestro Top 10 de usuarios, con calificaciones más altas y mayor número de visitas
                        </p>
                    </div>
                </div>
            </div>


        </div>

    </div>


    <div class="container-fluid">
        <div id="top">
            <div class ="container">
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <h1 class="display-4 text-center"><b>CONOCE NUESTRO TOP 10</b></h1>
                    <div class="card-deck p-4 pt-5">
                        <div class="row">
                            <?php
                            $query = "SELECT s.NOMBRE_SERVICIO,l.nombre_lugar,NOMBRE,FOTO,usuario.ID_PERSONA,DESCRIPCION,NUM_VISITAS,NUM_REDES,ROUND(AVG(c.CALIFICACION),1) AS PROM FROM usuario, servicios s,lugar l, calificacion c 
                            WHERE usuario.ID_SERVICIOS = s.ID_SERVICIOS AND usuario.ID_LUGAR = l.ID_LUGAR AND ESTATUS = 1 AND usuario.ID_PERSONA = c.ID_PERSONA 
                            AND usuario.NOMBRE != 'ADMINISTRADOR DEL SISTEMA' GROUP BY ID_PERSONA 
                            ORDER BY PROM DESC,NUM_VISITAS DESC, NUM_REDES DESC LIMIT 10";
                            
                            $llenarPaneles = mysqli_query($conexion,$query);
                            $result = mysqli_num_rows($llenarPaneles);
                            if($result >0){
                                
                                while($data = mysqli_fetch_array($llenarPaneles)){
                                    ?>
                                <div class="col-md-6 col-lg-4 col-12 mb-5">
                                <div class="card align-items-center pt-4">
                                    <img class="rounded-circle"
                                    <?php
                                    if ($data['FOTO'] == null) {
                                    $link = "http://ssl.gstatic.com/accounts/ui/avatar_2x.png";
                                     } else {
                                        $link = $data['FOTO'];
                                     }
                                    ?>
                                        src="<?php echo $link ?>"
                                        alt="Generic placeholder image" width="140" height="140">

                                    <div class="card-body text-justify">
                                        <h5 class="card-title"><?php echo $data['NOMBRE'] ?></h5>
                                        <p class="card-text">
                                            <b>Servicio:  </b><?php echo $data['NOMBRE_SERVICIO'] ?><br>
                                            <b>Ciudad:  </b><?php echo $data['nombre_lugar'] ?> <br>

                                            <?php 
                                            if($data['DESCRIPCION']==null){
                                                echo "El usuario no ha agregado su descripción personal";
                                            }else{
                                                echo $data['DESCRIPCION'];
                                            }
                                            ?>
                                        </p>
                                        <div class="text-center">
                                        <p class="card-text">
                                            <b>Visitas a Perfil:  </b><?php echo $data['NUM_VISITAS'] ?><br>
                                            <b>Vistas Redes Sociales:  </b><?php echo $data['NUM_REDES'] ?> <br>
                                        </p>
                                        
                                            <div class="row pt-3">
                                                <div class="col-md-6">
                                                    Calificación:
                                                </div>
                                                <div class="col-md-6">
                                                <b>
                                                <p>
                                                <?php
                                                echo $data['PROM'];
                                                echo " / 5"   
                                                ?>
                                                </p>
                                                </b>
                                                </div>
                                            </div>
                                            <a class="btn btn-primary " style="color: black;" href="perfil.php?id=<?php echo $data['ID_PERSONA'];?>">Visitar Perfil</a>
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