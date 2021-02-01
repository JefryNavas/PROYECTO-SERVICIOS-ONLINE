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
      $ruta_provisional = $file["tmp_name"][$x];
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "imagenes//fotos_trabajo//";

      if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
      {
          $reporte .= "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
      }
      else if($size > 1024*1024)
      {
          $reporte .= "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
      }
      else if($width < 60 || $height < 60)
      {
          $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura mínima permitida es de 60px</p>";
      }
      else
      {
          $src = $carpeta.$nombre;

          //Caragamos imagenes al servidor
          move_uploaded_file($ruta_provisional, $src);       
       
          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
          
          array_push($fotos,$nombre);
        
          
      }
    }

    $nombre_trabajo = $_POST['nombre_trabajo'];
    $desc_trabajo = $_POST['desc_trabajo'];
    $ID = $_SESSION['ID_PERSONA'];

    $INGRESARTRABAJO = "INSERT INTO trabajos VALUES (null,'$nombre_trabajo','$desc_trabajo','$fotos[0]','$fotos[1]','$fotos[2]','$ID')";
    include 'conexion.php';
    $ingresar_trabajo = mysqli_query($conexion,$INGRESARTRABAJO);
        if($ingresar_trabajo == TRUE){
            
            echo '<script> 
                alert("Actualización exitosa.");
                
            </script>';
        } else {
            echo '<script> 
                alert("Error.");
            </script>';
        }

    echo $reporte;
}