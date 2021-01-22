<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $clave ='';
    $baseDeDatos = 'tecontrato';
    $conexion = mysqli_connect($servidor,$usuario,$clave,$baseDeDatos) or die(mysqli_error());
?>