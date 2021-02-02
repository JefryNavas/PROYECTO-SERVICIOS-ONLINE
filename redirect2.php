<?php

include('conexion.php');

if(empty($_REQUEST['id'])){
    header('location: perfil.php');
}else{
    $idusuario2 = $_REQUEST['id'];
    $query2 = "SELECT INSTAGRAM,NUM_REDES FROM usuario WHERE ID_PERSONA = $idusuario2";
    $llamarIG = mysqli_query($conexion,$query2);
    $row = mysqli_fetch_array($llamarIG);
    $nuevo_num = $row[1] +1;
    $ACTUALIZARredes = "UPDATE usuario SET NUM_REDES='$nuevo_num' WHERE ID_PERSONA ='$idusuario2'";
    $actualizar2 = mysqli_query($conexion,$ACTUALIZARredes);

    if($row[0] == null){
        echo "<script>
        alert('El usuario no ha registrado su Instagram');
        window.location = 'perfil.php?id=$idusuario2';
        </script>";
    }else{
        header("location: $row[0] ");
    }
}

?>