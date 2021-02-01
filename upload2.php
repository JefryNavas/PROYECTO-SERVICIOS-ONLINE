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
      $carpeta = "imagenes//fotos_trabajo//";

      if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
      {
          $reporte .= "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
      }
      else if($size > 3024*3024)
      {
          $reporte .= "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
      }
      else if($width > 3000 || $height > 3000)
      {
          $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura máxima permitida es de 500px</p>";
      }
         else {

                $src = $carpeta.$id_unico.$nombre;

                        move_uploaded_file($ruta_provisional, $src);       
                 
                        array_push($fotos,$carpeta.$id_unico.$nombre);
                      
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
                window.location = "trabajos.php";

            </script>';
        } else {
            echo '<script> 
                alert("Error.");
            </script>';
        }
}