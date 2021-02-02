<?php
include ('conexion.php'); 
$persona = array(
    'datos' => array(
    'nombre' => 'Edwin Hernández',
    'correo' => 'fonsihernández8@gmail.com',
    'asunto' => 'Mas Información sobre TeContrato.com',
    'msg' => 'Se requiere mayor información sobre el funcionamiento de su página',
    'fono' => '5930996434838'
    )
);

if(empty($_REQUEST['id'])){
    header('location: clientes.php');
}else{
    $idusuario = $_REQUEST['id'];
    $query = "SELECT ID_TIPO, s.NOMBRE_SERVICIO,s.ID_SERVICIOS,l.ID_LUGAR,l.nombre_lugar,NOMBRE,CORREO,EDAD,TELEFONO,CELULAR,AN_EXPERIENCIA,FOTO,FACEBOOK,INSTAGRAM,ID_PERSONA,DESCRIPCION,NUM_VISITAS FROM usuario, servicios s,lugar l 
    WHERE usuario.ID_SERVICIOS = s.ID_SERVICIOS AND usuario.ID_LUGAR = l.ID_LUGAR AND ID_PERSONA = $idusuario ";
    $llamarUsuario = mysqli_query($conexion,$query);
    $result = mysqli_num_rows($llamarUsuario);
    $row = "";
    if($result > 0){
        $row = mysqli_fetch_array($llamarUsuario);
    }
    $nuevo_num = 0;

    if($row['NUM_VISITAS']==0){
        $nuevo_num = 1;
    }else{
        $nuevo_num = $row['NUM_VISITAS'] +1;
    }

    $ACTUALIZARvisitas = "UPDATE usuario SET NUM_VISITAS='$nuevo_num' WHERE ID_PERSONA ='$idusuario'";
    $actualizar2 = mysqli_query($conexion,$ACTUALIZARvisitas);


    
    $mail_usuario = array(
        'info' => array(
        'correo' =>  $row['CORREO'],
        'asunto' => 'Información sobre su servicio',
        'msg' => 'Me gustaría contratar sus servicios',
    
        )
    );
    
}

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <title>Panel Usuario</title>
    <link rel="icon" type="image/x-icon" href="assets/img/imagenes/minilogo.PNG" />
    <link rel="stylesheet" href="css/perfil.css">

    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">

    <link rel="stylesheet" href="css/estilos.css">
</head>





<body class="profile-page">

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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="clientes.php">
                            Servicios</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="sugerencias.html">Sugerencias</a>
                    </li>

                </ul>

            </div>
    </nav>

    <div class="page-header header-filter bg-dark" data-parallax="true"
        style="background-image:url('assets/img/map-image.png');">
    </div>

    <!-- FOTO - NOMBRE - REDES -->
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <?php
                                if ($row['FOTO'] == null) {
                                    $link = "http://ssl.gstatic.com/accounts/ui/avatar_2x.png";
                                } else {
                                    $link = $row['FOTO'];
                                }
                            ?>
                                <img src="<?php echo $link ?>" alt="FOTO NO REGISTRADA"
                                    class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title">
                                    <?php echo $row['NOMBRE'] ?>
                                </h3>
                                <h6>
                                    <?php echo $row['NOMBRE_SERVICIO'] ?>
                                </h6>
                                <a class="btn btn-dark btn-social mx-2" href="rdmail.php?id=<?php echo $idusuario ?>"><i class="fas fa-envelope-open-text" target="_blank"></i>
                                </a>
                                <a class="btn btn-dark btn-social mx-2" href="redireccion.php?id=<?php echo $idusuario ?>"><i
                                        class="fab fa-facebook-f" target="_blank"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="redirect2.php?id=<?php echo $idusuario ?>"><i
                                        class="fab fa-instagram-square" target="_blank"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="rdwsp.php?id=<?php echo $idusuario ?>"><i
                                        class="fab fa-whatsapp" target="_blank"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                    
                <!-- DATOS PERSONALES -->



                <div class="row mt-5">
                    <div class="col-sm-1 col-md-2 col-lg-2 ml-auto">

                    </div>
                    <div class="col-sm-5 col-md-4 col-lg-4 ">
                        <div class="container description ml-auto">
                            <h5 class="text-center">
                                Datos Personales
                            </h5>
                            <ul>
                                <li>Enfocado a brindar el servicio de:
                                    <?php echo $row['NOMBRE_SERVICIO'] ?>
                                </li>
                                <li>Edad:
                                    <?php echo $row['EDAD'] ?> años.
                                </li>
                                <li>Atención en la ciudad de:
                                    <?php echo $row['nombre_lugar'] ?>
                                </li>
                                <li>Comunicación directa por:
                                        
                                            <ol>
                                                <li>Teléfono:
                                                    <?php echo $row['TELEFONO'] ?>
                                                </li>
                                                <li>Celular:
                                                    <?php echo $row['CELULAR'] ?>
                                                </li>
                                            </ol>
                                        </li>
                                        <li>Cuenta con:
                                            <?php echo $row['AN_EXPERIENCIA'] ?> años de experiencia en su área
                                        </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ml-auto">
                        <div class="container-fluid description text-justify">
                            <h5 class="text-center">
                                Descripción
                            </h5>
                            <p>
                            <?php 
                                            if($row['DESCRIPCION']==null){
                                                echo "El usuario no ha agregado su descripción personal";
                                            }else{
                                                echo $row['DESCRIPCION'];
                                            }
                                            ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-2 col-lg-2 ml-auto">

                    </div>

                </div>


                <!-- EXPERIENCIA -- TRABAJOS -->


                <div class="profile-tabs">
                    <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#studio" role="tab" data-toggle="tab" id="experienciabtn">
                                <i class="fas fa-brain"></i>
                                Formación
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#works" role="tab" data-toggle="tab" id="trabajobtn">
                                <i class="fas fa-briefcase"></i>
                                Trabajos
                            </a>
                        </li>
                    </ul>
                </div>



                <div class="row ">
                    <div class="col-sm-6 col-md-6 col-lg-6 mr-auto ml-auto ">

                        <div class="container mr-auto ml-auto">
                            <div class="tab-content tab-space">
                                <div class="tab-pane active gallery" id="studio">
                                    <div class="row">
                                    <?php
                                        $ID = $idusuario;
                                        $query4 = "SELECT f.FOTO1,f.FOTO2 FROM formacion f,usuario U WHERE f.ID_PERSONA = '$ID' AND U.ID_PERSONA = '$ID'";
                                        include "conexion.php";
                                        $IMGS_F = mysqli_query($conexion,$query4);
                                        $result = mysqli_num_rows($IMGS_F);
                                            if($result >0){
                                                while($data4 = mysqli_fetch_array($IMGS_F)){    
                                        ?>
                                            <div class="col-md-6">
                                                <img src="<?php echo $data4[0] ?>"
                                                    class="rounded">
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo $data4[1] ?>"
                                                    class="rounded">
                                            </div>
                                            <?php    

                                   
                                        }
                                }else {
                                    echo "<br class='mt-5'><h5 class='descripcion mt-5'>No hay imagenes</h5>";
                                }
                                ?>
                                    </div>
                                </div>
                                <div class="tab-pane text-center gallery" id="works">
                                    <div class="row">
                                    <?php
                                        $ID = $idusuario;
                                        $query5 = "SELECT t.FOTO1,t.FOTO2,t.FOTO3 FROM trabajos t,usuario U WHERE t.ID_PERSONA = '$ID' AND U.ID_PERSONA = '$ID'";
                                        include "conexion.php";
                                        $IMGS_T = mysqli_query($conexion,$query5);
                                        $result5 = mysqli_num_rows($IMGS_T);
                                            if($result5 >0){
                                                while($data5 = mysqli_fetch_array($IMGS_T)){    
                                        ?>
                                            <div class="col-md-6">
                                                <img src="<?php echo $data5[0] ?>"
                                                    class="rounded">
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo $data5[1] ?>"
                                                    class="rounded">
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo $data5[2] ?>"
                                                    class="rounded">
                                            </div>
                                            <?php    

                                   
                                        }
                                }else {
                                    echo "<br class='mt-5'><h5 class='descripcion mt-5'>No hay imagenes</h5>";
                                }
                                ?>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-5 mt-5 mr-auto">
                        <br>
                        <div class="container-fluid text-justify" id="experiencia">
                        <h3 class="description">FORMACIÓN</h3>
                        <?php
                        $ID = $idusuario;
                        $query = "SELECT f.DESCRIPCION FROM formacion f,usuario U WHERE f.ID_PERSONA = '$ID' AND U.ID_PERSONA = '$ID'";
                        include "conexion.php";
                        $DESC_F = mysqli_query($conexion,$query);
                        $result = mysqli_num_rows($DESC_F);
                            if($result >0){
                                while($data2 = mysqli_fetch_array($DESC_F)){    
                                    ?>

                                    <p class="description">
                                        <ul class="description">
                                            <li>
                                            <?php echo $data2[0] ?>
                                            </li>
                                        </ul>
                                        
                                    </p>

                                    <?php    
                                        }
                                } else {
                                    echo "<br><h5 class='descripcion'>Sin Formación</h5>";
                                }
                                ?>
                        </div>
                        <div class="container-fluid text-justify" style="display: none;" id="trabajos_realizados">
                        <h3 class="description">TRABAJOS</h3>
                    <?php
                        $ID = $idusuario;
                        $query2 = "SELECT T.NOMBRE_TRABAJO,T.DESCRIPCION FROM trabajos T,usuario U WHERE T.ID_PERSONA = '$ID' AND U.ID_PERSONA = '$ID'";
                        include "conexion.php";
                        $DESC_T = mysqli_query($conexion,$query2);
                        $result2 = mysqli_num_rows($DESC_T);
                            if($result2 >0){
                                $i = 1;
                                while($data3 = mysqli_fetch_array($DESC_T)){    
                                    ?>
                                    <p class="description">
                                    NOMBRE DEL TRABAJO: <?php echo $data3[0] ?><br>
                                        <ul>
                                            
                                            <li>
                                            
                                        <p class="description">
                                            DESCRIPCIÓN: 
                                        <?php echo $data3[1] ?>
                                        </p> 
                                        
                                            </li>
                                        </ul>
                                        
                                    
                                    </p>

                                    <?php    

                                    $i++;
                                        }
                                }else {
                                    echo "<br><h5 class='descripcion'>Sin Trabajos</h5>";
                                }
                                ?>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-3 col-md-4 col-lg-4 text-lg-left">Copyright © TeContrato.com 2021</div>
                <div class="col-sm-6 col-md-4 col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="mailto:
                <?php echo $persona["datos"]["correo"]; ?>
                        ?subject=
                        <?php echo $persona["datos"]["asunto"]; ?>
                        &body=
                        <?php echo $persona["datos"]["msg"]; ?>
                        "><i class="fas fa-envelope-open-text"></i>
                    </a>
                    <a class="btn btn-dark btn-social mx-2" href="https://api.whatsapp.com/send?phone=
                    <?php echo $persona["datos"]["fono"]; ?>&text=
                        <?php echo $persona["datos"]["msg"]; ?>" target="_blank"><i class="fab fa-whatsapp"></i>
                    </a>
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
<script src="js/usuarios.js"></script>

</html>