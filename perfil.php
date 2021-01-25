<?php
session_start();
if(isset($_SESSION['CORREO'])){
    echo "";
}else{
    header("Location.. index.php");
    exit();
}
echo "Bienvenido ".$_SESSION['CORREO']."<br>
<a href = 'control/cerral.php'>SALIR</a>";

?>