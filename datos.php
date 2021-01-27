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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="datos.php">Editar Datos
                            Personales</a>
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
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="mx-auto rounded-circle"
                        alt="avatar">
                    <input type="file" class="text-center center-block" value="subir">
                </div>

                </hr><br>
                <div class="card">
                    <div class="card-header">Redes Sociales</div>
                    <div class="card-body">
                        <form class="form" action="##" method="post" id="registrationForm2">
                            <div class="row ">
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="col-xs-6">

                                            <input type="email" class="form-control" name="" id=""
                                                placeholder="tu facebook..."  value="<?php echo $_SESSION['FACEBOOK'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="col-xs-6">

                                            <input type="password" class="form-control" name="" id=""
                                                placeholder="tu instagram..."  value="<?php echo $_SESSION['INSTAGRAM'] ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12">

                                    <button class="btn btn-md btn-success" type="submit"><i
                                            class="fa fa-check-square"></i> Guardar</button>

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
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h4>Nombre</h4>
                                        </label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="tu nombre..." value=" <?php echo $_SESSION['NOMBRE'] ?>">
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
                                    <option value="<?php echo $_SESSION['ID_LUGAR']?>" ><?php echo $_SESSION['NOMBRE_LUGAR'] ?></option>
                                       
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
                                            placeholder="tu telefono..." value="<?php echo $_SESSION['TELEFONO'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile">
                                            <h4>Celular</h4>
                                        </label>
                                        <input type="text" class="form-control" name="mobile" id="mobile"
                                            placeholder="tu número cecular..."  value="<?php echo $_SESSION['CELULAR'] ?>">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-md btn-success" type="submit"><i class="fa fa-check-square"></i>
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

                    <form class="form" action="##" method="post" id="registrationForm2">
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
                                        
                                        <option value="<?php echo $_SESSION['ID_SERVICIO']?>" ><?php echo $_SESSION['NOMBRE_SERVICIO'] ?></option>
                                        
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
                                        <input type="password" class="form-control" name=""
                                            placeholder="tus años de experiencia..." value="<?php echo $_SESSION['AN_EXPERIENCIA'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-md btn-success" type="submit"><i
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
                    <form class="form" action="##" method="post" id="registrationForm2">
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Correo</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="tu correo..." value=" <?php echo $_SESSION['CORREO'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password">
                                            <h4>Contraseña</h4>
                                        </label>
                                        <input type="text" class="form-control" name="password" id="password"
                                            placeholder="tu contraseña..." value="<?php echo $_SESSION['PSWD'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-md btn-success" type="submit"><i
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

</html>