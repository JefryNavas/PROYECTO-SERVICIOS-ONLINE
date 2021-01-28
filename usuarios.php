<?php
session_start();
$persona = array(
    'datos' => array(
    'nombre' => 'Edwin Hernández',
    'correo' => 'fonsihernández8@gmail.com',
    'asunto' => 'Mas Información sobre TeContrato.com',
    'msg' => 'Se requiere mayor información sobre el funcionamiento de su página',
    'fono' => '5930996434838'
    )
); 

$mail_usuario = array(
    'info' => array(
    'correo' =>  $_SESSION['CORREO'],
    'asunto' => 'Información sobre su servicio',
    'msg' => 'Me gustaría contratar sus servicios',

    )
);


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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="datos.php">EDITAR Datos
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

    <div class="page-header header-filter bg-dark" data-parallax="true"
        style="background-image:url('assets/img/map-image.png');">
    </div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row ">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <?php
                                if ($_SESSION['FOTO'] == null) {
                                    $link = "http://ssl.gstatic.com/accounts/ui/avatar_2x.png";
                                } else {
                                    $link = $_SESSION['FOTO'];
                                }
                            ?>
                                <img src="<?php echo $link ?>" alt="FOTO NO REGISTRADA"
                                    class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title">
                                    <?php echo $_SESSION['NOMBRE'] ?>
                                </h3>
                                <h6>
                                    <?php echo $_SESSION['NOMBRE_SERVICIO'] ?>
                                </h6>
                                <a class="btn btn-dark btn-social mx-2 mt-3" href="mailto:
                                    <?php echo $mail_usuario[" info"]["correo"]; ?>
                                    ?subject=
                                    <?php echo $persona["info"]["asunto"]; ?>
                                    &body=
                                    <?php echo $persona["info"]["msg"]; ?>
                                    "><i class="fas fa-envelope-open-text" target="_blank"></i>
                                </a>
                                <a class="btn btn-dark btn-social mx-2 mt-3"
                                    href="<?php echo $_SESSION['FACEBOOK'] ?>"><i class="fab fa-facebook-f"
                                        target="_blank"></i></a>
                                <a class="btn btn-dark btn-social mx-2 mt-3"
                                    href="<?php echo $_SESSION['INSTAGRAM'] ?>"><i class="fab fa-instagram-square"
                                        target="_blank"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

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
                                <?php echo $_SESSION['NOMBRE_SERVICIO'] ?>
                            </li>
                            <li>Edad:
                                <?php echo $_SESSION['EDAD'] ?> años.
                            </li>
                            <li>Atención en la ciudad de:
                                <?php echo $_SESSION['NOMBRE_LUGAR'] ?>
                            </li>
                            <li>Comunicación directa por:
                                <ol>
                                    <li>Teléfono:
                                        <?php echo $_SESSION['TELEFONO'] ?>
                                    </li>
                                    <li>Celular:
                                        <?php echo $_SESSION['CELULAR'] ?>
                                    </li>
                                </ol>
                            </li>
                            <li>Cuenta con:
                                <?php echo $_SESSION['AN_EXPERIENCIA'] ?> años de experiencia en su área
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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores totam delectus nemo itaque
                            nostrum, qui soluta illum quae asperiores voluptatem laboriosam eos blanditiis magni
                            consectetur?
                        </p>
                    </div>
                </div>
                <div class="col-sm-1 col-md-2 col-lg-2 ml-auto">

                </div>

            </div>

            <div class="profile-tabs">
                <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#studio" role="tab" data-toggle="tab" id="experienciabtn">
                            <i class="fas fa-brain"></i>
                            Experiencia
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
                                    <div class="col-md-6">
                                        <img src="https://images.unsplash.com/photo-1524498250077-390f9e378fc0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83079913579babb9d2c94a5941b2e69d&auto=format&fit=crop&w=751&q=80"
                                            class="rounded">
                                        <img src="https://images.unsplash.com/photo-1528249227670-9ba48616014f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=66b8e7db17b83084f16fdeadfc93b95b&auto=format&fit=crop&w=357&q=80"
                                            class="rounded">
                                    </div>
                                    <div class="col-md-6">
                                        <img src="https://images.unsplash.com/photo-1521341057461-6eb5f40b07ab?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=72da2f550f8cbd0ec252ad6fb89c96b2&auto=format&fit=crop&w=334&q=80"
                                            class="rounded">
                                        <img src="https://images.unsplash.com/photo-1506667527953-22eca67dd919?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6326214b7ce18d74dde5e88db4a12dd5&auto=format&fit=crop&w=750&q=80"
                                            class="rounded">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane text-center gallery" id="works">
                                <div class="row">
                                    <div class="col-md-6">

                                        <img src="https://images.unsplash.com/photo-1506667527953-22eca67dd919?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6326214b7ce18d74dde5e88db4a12dd5&auto=format&fit=crop&w=750&q=80"
                                            class="rounded">
                                        <img src="https://images.unsplash.com/photo-1505784045224-1247b2b29cf3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ec2bdc92a9687b6af5089b335691830e&auto=format&fit=crop&w=750&q=80"
                                            class="rounded">
                                    </div>
                                    <div class="col-md-6">
                                        <img src="https://images.unsplash.com/photo-1504346466600-714572c4b726?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6754ded479383b7e3144de310fa88277&auto=format&fit=crop&w=750&q=80"
                                            class="rounded">
                                        <img src="https://images.unsplash.com/photo-1494028698538-2cd52a400b17?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83bf0e71786922a80c420c17b664a1f5&auto=format&fit=crop&w=334&q=80"
                                            class="rounded">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-5 mt-5 mr-auto">
                    <br>
                    <div class="container-fluid text-justify" id="experiencia">
                        <p class="description">
                            Experiencia 1
                            <br>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis adipisci maiores vel tempore
                            ab
                            officiis omnis laborum! Molestias earum pariatur nobis, ullam non, consequuntur fugit, id
                            eligendi possimus hic magnam.

                        </p>
                        <p class="description">
                            Experiencia 2
                            <br>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis adipisci maiores vel tempore
                            ab
                            officiis omnis laborum! Molestias earum pariatur nobis, ullam non, consequuntur fugit, id
                            eligendi possimus hic magnam.

                        </p>
                    </div>
                    <div class="container-fluid text-justify" style="display: none;" id="trabajos_realizados">
                        <p class="description">
                            Trabajo 1
                            <br>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis adipisci maiores vel tempore
                            ab
                            officiis omnis laborum! Molestias earum pariatur nobis, ullam non, consequuntur fugit, id
                            eligendi possimus hic magnam.

                        </p>
                        <p class="description">
                            Trabajo 2
                            <br>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis adipisci maiores vel tempore
                            ab
                            officiis omnis laborum! Molestias earum pariatur nobis, ullam non, consequuntur fugit, id
                            eligendi possimus hic magnam.

                        </p>
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
                <?php echo $persona[" datos"]["correo"]; ?>
                        ?subject=
                        <?php echo $persona["datos"]["asunto"]; ?>
                        &body=
                        <?php echo $persona["datos"]["msg"]; ?>
                        "><i class="fas fa-envelope-open-text"></i>
                    </a>
                    <a class="btn btn-dark btn-social mx-2" href="https://api.whatsapp.com/send?phone=
                    <?php echo $persona[" datos"]["fono"]; ?>&text=
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