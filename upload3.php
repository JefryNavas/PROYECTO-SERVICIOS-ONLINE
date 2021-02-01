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
      $carpeta = "imagenes//fotos_formacion//";

      if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
      {
          $reporte .= "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
      }
      else if($size > 1024*1024)
      {
          $reporte .= "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
      }
      else if($width > 3000 || $height > 3000)
      {
          $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura máxima permitida es de 500px</p>";
      }
      else if($width < 60 || $height < 60)
      {
          $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura mínima permitida es de 60px</p>";
      }
      else
      {
          $src = $carpeta.$id_unico.$nombre;
          move_uploaded_file($ruta_provisional, $src);       

          array_push($fotos,$carpeta.$id_unico.$nombre);
          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
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