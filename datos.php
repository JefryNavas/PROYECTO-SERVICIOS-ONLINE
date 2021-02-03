<?php
session_start();

?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Datos Personales</title>
    <link rel="icon" type="image/x-icon" href="assets/img/imagenes/minilogo.PNG" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/estilos.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>


</head>





<body class="profile-page">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="mainNav">
        <div class="container">
            <a class="masthead-subheading text-uppercase" href="index.html">TECONTRATO.COM</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>


            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="usuarios.php">Perfil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">  EDITAR PERFIL </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="datos.php">DATOS PERSONALES</a></li>
                                <li><a class="dropdown-item" href="formacion.php">FORMACIÓN</a></li>
                                <li><a class="dropdown-item" href="trabajos.php">TRABAJOS</a></li>
                            </ul>
                        </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fas fa-user fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="salir.php">Cerrar Sesión</a>
                        </div>
                    </li>



                </ul>

            </div>
    </nav>

    <div class="container-fluid bg-dark pt-5 ">
        <div class="container text-white pt-5 pb-1">
            <h1 class="display-4"><b>Datos Personales</b></h1>

        </div>

    </div>

    <div class="container pt-4">
        <div class="row">
            <div class="col-sm-9 col-md-10 col-lg-10">
                <h1>
                    <?php echo $_SESSION['NOMBRE'] ?>
                </h1>
            </div>
            <div class="col-sm-3 col-md-2 col-lg-2"><img width="100%" class="foto" src="assets/img/imagenes/avatar.png">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="text-center">

                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="file-upload">
                            <?php
                                if ($_SESSION['FOTO'] == null) {
                                    $link = "http://ssl.gstatic.com/accounts/ui/avatar_2x.png";
                                } else {
                                    $link = $_SESSION['FOTO'];
                                }
                            ?>
                        <img src="<?php echo $link ?>"
                            class="avatar mx-auto rounded-circle" width="90%">
                        <input type="file" class="text-center center-block file-upload" name="fileToUpload" id="fileToUpload">
                        </div>
                        <button type="submit" class="btn btn-md btn-success" name="cargar_imagen"><i class="fas fa-cloud-upload-alt"></i>
                                            Subir</button>
                    </form>

                </div>

                </hr><br>
                <div class="card">
                    <div class="card-header">Redes Sociales</div>
                    <div class="card-body">
                        <form class="form1" method="POST">
                            <div class="row ">
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="col-xs-6">

                                            <input type="text" class="form-control" name="facebook_"
                                                placeholder="tu perfil facebook..."
                                                value="<?php echo $_SESSION['FACEBOOK'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="col-xs-6">

                                            <input type="text" class="form-control" name="instagram_"
                                                placeholder="tu perfil de instagram..."
                                                value="<?php echo $_SESSION['INSTAGRAM'] ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button type="submit" class="btn btn-md btn-success" name="redes_sociales"><i
                                                class="fa fa-check-square"></i>
                                            Guardar</button>
                                        <button class="btn btn-md" type="reset"><i class="fas fa-redo"></i>
                                            Restablecer</button>
                                    </div>
                                </div>


                            </div>




                        </form>

                    </div>
                </div>
                </hr><br>


            </div>
            <div class="col-sm-12 col-md-8">
                <p class="display-4">Datos Personales</p>

                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form1" method="POST">
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h4>Nombre</h4>
                                        </label>
                                        <input type="text" class="form-control" name="nombre" id="nombre"
                                            placeholder="tu nombre..." value="<?php echo $_SESSION['NOMBRE'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="">
                                            <h4>Edad</h4>
                                        </label>
                                        <input type="text" class="form-control" name="edad" id="edad"
                                            placeholder="tu edad..." value="<?php echo $_SESSION['EDAD'] ?>">
                                    </div>
                                </div>
                                <label for="">
                                    <h4>Ubicación</h4>
                                </label>
                                <div class="form-group">
                                    <?php
                                        include 'conexion.php';
                                        $consulta = 'SELECT * FROM lugar';
                                        $ejecutar = mysqli_query($conexion,$consulta);
                                        ?>
                                    <select name="lugar" class="form-control">
                                        <option value="<?php echo $_SESSION['ID_LUGAR']?>">
                                            <?php echo $_SESSION['NOMBRE_LUGAR'] ?>
                                        </option>

                                        <?php foreach ($ejecutar as $opciones):?>
                                        <option value="<?php echo $opciones['ID_LUGAR']?>">
                                            <?php echo $opciones['nombre_lugar'] ?>
                                        </option>
                                        <?php endforeach?>
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="phone">
                                            <h4>Teléfono</h4>
                                        </label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="tu telefono..." value="<?php echo $_SESSION['TELEFONO'] 
                                            ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile">
                                            <h4>Celular (WhatsApp)</h4>
                                        </label>
                                        <input type="text" class="form-control" pattern="[0-9]{1,15}" name="mobile" id="mobile"
                                            placeholder="tu número celular..."  value="<?php echo $_SESSION['CELULAR'] 
                                            ?>">
                                    </div>

                                    <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile">
                                            <h4>Descripción Personal</h4>
                                        </label>
                                        <textarea rows="8" cols="20" class="form-control" name="desc" id="desc"
                                            placeholder="una descripción personal tuya..." ><?php echo $_SESSION['DESCRIPCION'] 
                                            ?></textarea>  
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button type="submit" class="btn btn-md btn-success" name="personales"><i
                                        class="fa fa-check-square"></i>
                                    Guardar</button>
                                <button class="btn btn-md" type="reset"><i class="fas fa-redo"></i>
                                    Restablecer</button>
                            </div>
                        </div>
                    </form>

                    <hr>



                </div>
                <div class="tab-pane active">
                    <p class="display-4">Servicios</p>
                    <hr>

                    <form class="form1" method="POST">
                        <div class="row ">
                            <div class="col-sm-6">
                                <label for="">
                                    <h4>Servicio</h4>
                                </label>
                                <div class="form-group">
                                    <?php
                                        include 'conexion.php';
                                        $consulta = 'SELECT * FROM servicios';
                                        $ejecutar = mysqli_query($conexion,$consulta);
                                        ?>
                                    <select name="servicio" class="form-control">

                                        <option value="<?php echo $_SESSION['ID_SERVICIO']?>">
                                            <?php echo $_SESSION['NOMBRE_SERVICIO'] ?>
                                        </option>

                                        <?php foreach ($ejecutar as $opciones):?>
                                        <option value="<?php echo $opciones['ID_SERVICIOS']?>">
                                            <?php echo $opciones['NOMBRE_SERVICIO'] ?>
                                        </option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="">
                                            <h4>Años de Experiencia</h4>
                                        </label>
                                        <input type="number" class="form-control" name="expe"
                                            placeholder="tus años de experiencia..." min=1 max=25
                                            value="<?php echo $_SESSION['AN_EXPERIENCIA'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button type="submit" class="btn btn-md btn-success" name="datos_servicios"><i
                                                class="fa fa-check-square"></i> Guardar</button>
                                        <button class="btn btn-md" type="reset"><i class="fas fa-redo"></i>
                                            Restablecer</button>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </form>

                    <hr>


                </div>
                <div class="tab-pane active">
                    <p class="display-4">Usuario</p>
                    <hr>
                    <form method="POST">
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Correo</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" placeholder="tu correo..."
                                            value=" <?php echo $_SESSION['CORREO'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password">
                                            <h4>Contraseña</h4>
                                        </label>
                                        <input type="text" class="form-control" name="contra"
                                            placeholder="tu contraseña..." value="<?php echo $_SESSION['PSWD'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-md btn-success" type="submit" name="login"><i
                                                class="fa fa-check-square"></i> Guardar</button>
                                        <button class="btn btn-md" type="reset"><i class="fas fa-redo"></i>
                                            Restablecer</button>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </form>

                    <hr>


                </div>

            </div>
            <!--/tab-content-->
        </div>
    </div>
    <?php
                            if(isset($_POST['personales'])){
                                $nombre = $_POST["nombre"];
                                $edad = $_POST["edad"];
                                $telefono = $_POST["phone"];
                                $lugar = $_POST["lugar"];
                                $extencion = '593';
                                $celular = $_POST["mobile"];
                                
                                $rest = substr($celular, 0, 3);
                                if($rest =='593'){
                                $extencion=$celular;
                                }else{
                                $extencion .=$celular;
                                }
                                $descripcion = $_POST["desc"];
                                $ID = $_SESSION['ID_PERSONA'];
                                $ACTUALIZARDatos = "UPDATE usuario SET NOMBRE='$nombre',
                                                                     EDAD='$edad',
                                                                     TELEFONO='$telefono',
                                                                     ID_LUGAR='$lugar',
                                                                     CELULAR='$extencion',
                                                                     DESCRIPCION='$descripcion'
                                                                     WHERE ID_PERSONA ='$ID'";
                                include 'conexion.php';
                                $actualizar = mysqli_query($conexion,$ACTUALIZARDatos);

                                if($actualizar == TRUE){
                                    $_SESSION['NOMBRE'] = $nombre;
                                    $_SESSION['EDAD'] = $edad;
                                    $_SESSION['TELEFONO'] = $telefono;
                                    $_SESSION['CELULAR'] = $celular;
                                    $_SESSION['ID_LUGAR'] = $lugar;
                                    $_SESSION['DESCRIPCION'] = $descripcion;
                                    if($lugar == 1){
                                        $_SESSION['NOMBRE_LUGAR'] = "Quito";
                                    } else if ($lugar == 2){
                                         $_SESSION['NOMBRE_LUGAR'] = "Guayaquil";
                                    }else if ($lugar == 3){
                                         $_SESSION['NOMBRE_LUGAR'] = "Cuenca";
                                    }else if ($lugar == 4){
                                         $_SESSION['NOMBRE_LUGAR'] = "Ambato";
                                    }
                                    echo '<script> 
            
           
                                        alert("Actualización exitosa.");
                                        window.location="datos.php";
                    
                                     </script>';
                                } else {
                                    echo "Error en la linea SQL";
                                }

                                
                                   
                                
                            }
                            if(isset($_POST['datos_servicios'])){
                                $serv = $_POST["servicio"];
                                $a_exp = $_POST["expe"];
                                $ID = $_SESSION['ID_PERSONA'];
                                $ACTUALIZARDatos2 = "UPDATE usuario SET ID_SERVICIOS='$serv',
                                                                     AN_EXPERIENCIA ='$a_exp'
                                                                     WHERE ID_PERSONA ='$ID'";
                                include 'conexion.php';
                                $actualizar2 = mysqli_query($conexion,$ACTUALIZARDatos2);

                                if($actualizar2 == TRUE){
                                    $_SESSION['ID_SERVICIO'] = $serv;
                                    $_SESSION['AN_EXPERIENCIA'] = $a_exp;
                                    if($serv == 1){
                                        $_SESSION['NOMBRE_SERVICIO'] = "Albañilería";
                                    } else if ($serv == 2){
                                        $_SESSION['NOMBRE_SERVICIO'] = "Carpintería";
                                    }else if ($serv == 3){
                                       $_SESSION['NOMBRE_SERVICIO'] = "Plomería";
                                    }else if ($serv == 4){
                                        $_SESSION['NOMBRE_SERVICIO'] = "Transportación";
                                    }else if ($serv == 5){
                                        $_SESSION['NOMBRE_SERVICIO'] = "Cuidado de Niños";
                                    }else if ($serv == 6){
                                        $_SESSION['NOMBRE_SERVICIO'] = "Soporte Técnico";
                                    }
                                    
                                    echo '<script> 


                                        alert("Actualización exitosa.");
                                        window.location = "datos.php";

                                    </script>';
                                } else {
                                    echo '<script> 


                                        alert("Error.");


                                    </script>';
                                }

                                
                                   
                                
                            }
                            if(isset($_POST['login'])){
                                $user = $_POST["email"];
                                $contra = $_POST["contra"];
                                $ID = $_SESSION['ID_PERSONA'];
                                $ACTUALIZARDatos3 = "UPDATE usuario SET CORREO='$user',
                                                                     PSWD ='$contra'
                                                                     WHERE ID_PERSONA ='$ID'";
                                include 'conexion.php';
                                $actualizar3 = mysqli_query($conexion,$ACTUALIZARDatos3);

                                if($actualizar3 == TRUE){
                                    $_SESSION['CORREO'] = $user;
                                    $_SESSION['PSWD'] = $contra;
                                    
                                    echo '<script> 


                                        alert("Actualización exitosa.");
                                        window.location = "datos.php";

                                    </script>';
                                } else {
                                    echo '<script> 


                                        alert("Error.");


                                    </script>';
                                }

                                
                                   
                                
                            }
                            if(isset($_POST['redes_sociales'])){
                                $facebook_ = $_POST["facebook_"];
                                $instagram_ = $_POST["instagram_"];
                                $ID = $_SESSION['ID_PERSONA'];
                                $ACTUALIZARDatos4 = "UPDATE usuario SET FACEBOOK='$facebook_',
                                                                     INSTAGRAM ='$instagram_'
                                                                     WHERE ID_PERSONA ='$ID'";
                                include 'conexion.php';
                                $actualizar4 = mysqli_query($conexion,$ACTUALIZARDatos4);

                                if($actualizar4 == TRUE){
                                    $_SESSION['FACEBOOK'] = $facebook_;
                                    $_SESSION['INSTAGRAM'] = $instagram_;
                                    
                                    echo '<script> 


                                        alert("Actualización exitosa.");
                                        window.location = "datos.php";

                                    </script>';
                                } else {
                                    echo '<script> 


                                        alert("Error.");


                                    </script>';
                                }

                                
                                   
                                
                            }
                            
                            ?>
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
<script src="js/imgperfil.js"></script>
<script src="js/usuarios.js"></script>

</html>