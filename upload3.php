<?php
session_start();
if (isset($_FILES["file"]))
{
    $reporte = null;
    $fotos = array();
     for($x=0; $x<count($_FILES["file"]["name"]); $x++)
    {
      $file = $_FILES["file"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $id_unico = uniqid();
      $ruta_provisional = $file["tmp_name"][$x];
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "imagenes/fotos_formacion/";

      if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
      {
          
      }
      else if($size > 1024*1024)
      {
          
      }
      else if($width > 3000 || $height > 3000)
      {
          
      }
      else if($width < 60 || $height < 60)
      {
          
      }
      else
      {
          $src = $carpeta.$id_unico.$nombre;
          move_uploaded_file($ruta_provisional, $src);       

          array_push($fotos,$carpeta.$id_unico.$nombre);
      }
    }
    echo $reporte;

    $desc_formacion = $_POST['desc_formacion'];
    $ID = $_SESSION['ID_PERSONA'];
    $INGRESARFORMACION = "INSERT INTO formacion VALUES (null,'$desc_formacion','$fotos[0]','$fotos[1]','$ID')";
    include 'conexion.php';
    $ingresar_formacion = mysqli_query($conexion,$INGRESARFORMACION);
        if($ingresar_formacion == TRUE){
            
            echo '<script> 
                alert("Actualización exitosa.");
                window.location = "formacion.php";

            </script>';
        } else {
            echo '<script> 
                alert("Error.");
            </script>';
        }

}