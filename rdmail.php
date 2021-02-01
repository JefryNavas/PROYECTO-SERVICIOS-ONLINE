<?php
include ('conexion.php'); 

$query = "INSERT INTO mails VALUES(NULL,1)";
$guardarMail = mysqli_query($conexion,$query);

if(empty($_REQUEST['id'])){
    header('location: perfil.php');
}else{
    $idusuario2 = $_REQUEST['id'];
    $query2 = "SELECT CORREO,NUM_COR FROM usuario WHERE ID_PERSONA = $idusuario2";
    $llamarIG = mysqli_query($conexion,$query2);
    $row = mysqli_fetch_array($llamarIG);
    $nuevo_num = $row[1] +1;
    $actualizarCor= "UPDATE usuario SET NUM_COR='$nuevo_num' WHERE ID_PERSONA ='$idusuario2'";
    $actualizar2 = mysqli_query($conexion,$actualizarCor);

    if($row[0] == null){
        header("location: perfil.php?id=$idusuario2");
    }else{
        header("location: mailto:$row[0]?subject=Interés desde TeContrato.com");
    }
}



?>