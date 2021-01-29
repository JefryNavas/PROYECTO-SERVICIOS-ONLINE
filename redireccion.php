<?php

include('conexion.php');

if(empty($_REQUEST['id'])){
    header('location: perfil.php');
}else{
    $idusuario2 = $_REQUEST['id'];
    $query2 = "SELECT FACEBOOK,NUM_REDES FROM usuario WHERE ID_PERSONA = $idusuario2";
    $llamarFb = mysqli_query($conexion,$query2);
    $row = mysqli_fetch_array($llamarFb);
    $nuevo_num = $row[1] +1;
    $ACTUALIZARredes = "UPDATE usuario SET NUM_REDES='$nuevo_num' WHERE ID_PERSONA ='$idusuario2'";
    $actualizar2 = mysqli_query($conexion,$ACTUALIZARredes);
    if($row[0] == null){
        header("location: perfil.php?id=$idusuario2");
    }else{
        header("location: $row[0] ");
    }

    
}

?>