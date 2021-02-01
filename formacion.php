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



    <style>
        .file-upload {
            margin: 40px auto;
            border: 1px solid #f0c0d0;
            border-radius: 100px;
            overflow: hidden;
            position: relative;
        }

        .file-upload input {
            position: absolute;
            height: 500%;
            width: 500%;
            left: -200px;
            top: -200px;
            background: transparent;
            opacity: 0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            filter: alpha(opacity=0);
        }

        .file-upload img {
            display: block;
            margin: auto;
            height: 80%;
            width: 80%;
        }
    </style>
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
                        <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"> EDITAR PERFIL </a>
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
            <h1 class="display-4 mb-3"><b>Formación</b></h1>

        </div>

    </div>



    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="container mt-3">
                <div class="display-4 mt-3">Subir Imagenes</div>
                <form action="upload3.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="file-upload">
                                <img src="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_960_720.png"
                                    class="avatar1">
                                <input type="file" class="file-upload1" id="input" name="file[]"  required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-upload">
                                <img src="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_960_720.png"
                                    class="avatar2">
                                <input type="file" class="file-upload2" name="file[]" id="fileToUpload">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="display-4">Descripción del trabajo</div>
                            <div class="form-group mt-5 mb-5">
                                <div class="col-xs-6">
                                    <textarea rows="8" cols="20" class="form-control" name="desc_formacion"
                                        placeholder="Una descripción de la Formación..."  required></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">

                            <button type="submit" class="btn btn-md btn-success ml-5" name=""><i
                                    class="fa fa-check-square"></i>
                                Guardar</button>
                            <button class="btn btn-md" type="reset"><i class="fas fa-redo"></i>
                                Restablecer</button>

                        </div>


                    </div>
                </form>


            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="container mt-3">
                <p class="display-4">
                    Formación Guardada
                </p>

                <div class="table-responsive table-striped">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Descripción</th>
                                <th>Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $ID = $_SESSION['ID_PERSONA'];
                        $query = "SELECT DESCRIPCION,ID_FORMACION FROM FORMACION WHERE ID_PERSONA = '$ID'";
                        include 'conexion.php';
                        $llenarFormacion = mysqli_query($conexion,$query);
                        $result = mysqli_num_rows($llenarFormacion);
                        if($result >0){
                            while($data = mysqli_fetch_array($llenarFormacion)){
                                ?>   
                                <tr>
                                            <td><?php echo $data[0] ?></td>
                                            <td>
                                            <form method="post">
                                            <button type="submit" class="bg-dark text-warning"  name="btnBorrar" value="<?php echo $data[1]; ?>"><i class="fas fa-trash-alt text-warning"></i> Borrar</button>
                                            
                                            </form>
                                            
                                            </td>
                                        </tr>
                                    <?php    

                                        }
                                    }
                                    ?>
                                    <?php
                                            if (isset($_POST['btnBorrar'])) {
                                                $borrar_id = $_POST['btnBorrar'];
                                                $borrar = "DELETE FROM formacion WHERE ID_FORMACION = '$borrar_id'";
                                                include "conexion.php";
                                                $ejecutar = mysqli_query($conexion, $borrar);
                                                if ($ejecutar) {
                                                    echo '<script> 


                                                    alert("Se ha eliminado correctamente.");
                                                    window.location = "formacion.php";
            
                                                </script>';
                                                }
                                            }
                                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>



    <script>

    </script>

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
<script src="js/imagen.js"></script>

</html>