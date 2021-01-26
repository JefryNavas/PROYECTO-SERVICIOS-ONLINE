<?php
include ('conexion.php');
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Administrador</title>
    <link href="css/dashboard.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand bg-info">
        <a class="navbar-brand text-uppercase" href=""><img src="assets/img/imagenes/logo.png" alt="LOGO" style="width: 90%"></a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 bg-white" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto bg-white mr-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    
                    <a class="dropdown-item" href="salir.php">Cerrar Sesión</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav bg-white" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Interfaz</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Paneles
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>



                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Sesión como:</div>
                    <?php echo $_SESSION['NOMBRE'] ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid ">
                    <h1 class="mt-4">ADMINISTRADOR</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active text-uppercase">Numeros totales de cada indicador</li>
                    </ol>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body text-uppercase text-center">usuarios Registrados</div>
                                <div class="card-footer text-center">
                                <?php
                                    $query_numero = mysqli_query($conexion,"SELECT count(ID_PERSONA) FROM usuario");
                                    $numero = mysqli_fetch_array($query_numero);
                                    ?>
                                    <?php echo $numero[0] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body text-uppercase text-center">Mensajería interna</div>
                                <div class="card-footer text-center">
                                    1234
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body text-uppercase text-center">visitas a las paginas</div>
                                <div class="card-footer text-center">
                                    1234
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body text-uppercase text-center">Acceso a redes sociales</div>
                                <div class="card-footer text-center">
                                    1234

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-user-plus"></i>
                            USUARIOS MÁS VISITADOS
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-striped">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Servicio</th>
                                            <th>Ciudad</th>
                                            <th>Edad</th>
                                            <th>Telefono</th>
                                            <th>Clicks a redes sociales</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Nombre</td>
                                            <td>Servicio</td>
                                            <td>Ciudad</td>
                                            <td>Edad</td>
                                            <td>Teléfono</td>
                                            <td>Clicks a redes sociales</td>
                                        </tr>
                                        <tr>
                                        <td>Nombre</td>
                                            <td>Servicio</td>
                                            <td>Ciudad</td>
                                            <td>Edad</td>
                                            <td>Teléfono</td>
                                            <td>Clicks a redes sociales</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-users"></i>
                            USUARIOS REGISTRADOS 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-striped">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                    <tr>
                                            <th>Nombre</th>
                                            <th>Servicio</th>
                                            <th>Ciudad</th>
                                            <th>Edad</th>
                                            <th>Telefono</th>
                                            <th>Acciones</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $query = "SELECT NOMBRE,s.NOMBRE_SERVICIO,l.nombre_lugar, EDAD,TELEFONO, ID_PERSONA FROM `usuario`, servicios s, lugar l WHERE usuario.ID_SERVICIOS = s.ID_SERVICIOS AND usuario.ID_LUGAR = l.ID_LUGAR
                                     and usuario.NOMBRE != 'ADMINISTRADOR DEL SISTEMA'and ESTATUS = 1";
                                    $llenarUsuarios = mysqli_query($conexion,$query);
                                    $result = mysqli_num_rows($llenarUsuarios);
                                    if($result >0){
                                        while($data = mysqli_fetch_array($llenarUsuarios)){
                                            ?>    
                                            <tr>
                                            <td><?php echo $data[0] ?></td>
                                            <td><?php echo $data[1] ?></td>
                                            <td><?php echo $data[2] ?></td>
                                            <td><?php echo $data[3] ?></td>
                                            <td><?php echo $data[4] ?></td>
                                            <td>
                                            <a  class="link_delete" href="confirmacion.php?id=<?php echo $data[5];?>">Dar de Baja</a>
                                            </td>
                                        </tr>
                                    <?php    

                                        }
                                    }
                                    ?>
                                   

                                    </tbody>
                                </table>
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