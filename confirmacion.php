
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Confirmación Eliminar</title>
    <link href="css/dashboard.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-info">
        <a class="navbar-brand text-uppercase" href="dashboard.php"><img src="assets/img/imagenes/logo.png" alt="LOGO" style="width: 90%"></a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class=" d-md-inline-block ml-auto mr-0 mr-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Configuraciones</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="salir.php">Cerrar Sesión</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
       
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid ">
                    <h1 class="mt-4">CONFIRMAR BORRADO</h1>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-user-slash"></i>
                            ESTÁ SEGURO DE ELIMINAR EL SIGUIENTE USUARIO? :
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-striped">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Servicio</th>
                                            <th>Ciudad</th>
                                            <th>Edad</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    if(empty($_REQUEST['id'])){
                                        header('location: dashboard.php');
                                    }else{
                                        include('conexion.php');
                                        $idusuario = $_REQUEST['id'];
                                        $query = "SELECT ID_PERSONA,NOMBRE,s.NOMBRE_SERVICIO,l.nombre_lugar, EDAD,TELEFONO FROM `usuario`, servicios s, lugar l WHERE usuario.ID_SERVICIOS = s.ID_SERVICIOS AND usuario.ID_LUGAR = l.ID_LUGAR 
                                        and usuario.NOMBRE != 'ADMINISTRADOR DEL SISTEMA' AND ID_PERSONA = $idusuario";
                                        $llamarUsuario = mysqli_query($conexion,$query);
                                        $result = mysqli_num_rows($llamarUsuario);
                                        if($result >0){
                                            while($data = mysqli_fetch_array($llamarUsuario)){
                                                ?>    
                                                <tr>
                                                <td><?php echo $data[0] ?></td>
                                                <td><?php echo $data[1] ?></td>
                                                <td><?php echo $data[2] ?></td>
                                                <td><?php echo $data[3] ?></td>
                                                <td><?php echo $data[4] ?></td>
                                            </tr>
                                        <?php    
    
                                            }
                                        }


                                    }
                                    ?>
                                    </tbody>
                                    
                                </table>
                                <div align='center'>
                                <form action="" method='post'>
                                <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                                <button><a href="dashboard.php">Cancelar</a></button> &nbsp;&nbsp;&nbsp;
                                <input type="submit" name="" value="Confirmar">
                                </form>
                                <?php
                                if(!empty($_POST)){
                                    $idusuario = $_POST['idusuario'];
                                    $query_delete = "DELETE FROM usuario WHERE ID_PERSONA = $idusuario";
                                    $borrar_usuario = mysqli_query($conexion,$query_delete);
                                    if($borrar_usuario){
                                        header('location: dashboard.php');
                                    }else{
                                        echo "Error al eliminar";
                                    }
                                }


                                ?> 


                                </div>

                                
                            </div>
                        </div>
                    </div>

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; TeContrato.com 2021 </div>
                        <div>
                            <a href="#">Políticas de la Empresa</a>
                            &middot;
                            <a href="#">Términos y Condiciones</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts2.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
</body>

</html>