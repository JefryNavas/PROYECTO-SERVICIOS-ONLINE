<?php
include ('conexion.php'); 


if(empty($_REQUEST['id'])){
    header('location: perfil.php');
}else{
    $idusuario2 = $_REQUEST['id'];
    $query2 = "SELECT CELULAR,NUM_SMS FROM usuario WHERE ID_PERSONA = $idusuario2";
    $llamarIG = mysqli_query($conexion,$query2);
    $row = mysqli_fetch_array($llamarIG);
    $nuevo_num = $row[1] +1;
    $actualizarSMS= "UPDATE usuario SET NUM_SMS='$nuevo_num' WHERE ID_PERSONA ='$idusuario2'";
    $actualizar2 = mysqli_query($conexion,$actualizarSMS);

    if($row[0] == null){
        echo "<script>
        alert('El usuario no ha registrado su WhatsApp');
        window.location = 'perfil.php?id=$idusuario2';
        </script>";
    }else{
        header("location: https://api.whatsapp.com/send?phone=$row[0]&text=Estoy interesado en su perfil de TeContrato.com");
    }
}



?>