<?php
session_start();
$target_dir = "imagenes//fotos_perfil//"; //directorio en el que se subira
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//se añade el directorio y el nombre del archivo
$uploadOk = 1;//se añade un valor determinado en 1
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Comprueba si el archivo de imagen es una imagen real o una imagen falsa
if(isset($_POST["submit"])) {//detecta el boton
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {//si es falso es una imagen y si no lanza error
        echo "Archivo es una imagen- " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo '<script> 
    
    
        alert("El archivo no es una imagen");
        window.location = "datos.php";
    
    </script>';
        $uploadOk = 0;
    }
}
// Comprobar si el archivo ya existe
if (file_exists($target_file)) {
    echo '<script> 
    
    
    alert("El archivo ya existe.");
    window.location = "datos.php";

</script>';
    $uploadOk = 0;//si existe lanza un valor en 0
}
// Comprueba el peso
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo '<script> 
    
    alert("Perdon pero el archivo es muy pesado.");
    window.location = "datos.php";

</script>';
    $uploadOk = 0;
}
// Permitir ciertos formatos de archivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo '<script> 
    alert("Perdon solo, JPG, JPEG, PNG & GIF Estan soportados.");
    window.location = "datos.php";

</script>';
    $uploadOk = 0;
}
//Comprueba si $ uploadOk se establece en 0 por un error
if ($uploadOk == 0) {
    echo '<script> 
    alert("Error al subir el archivo.");
    window.location = "datos.php";

</script>';
// si todo está bien, intenta subir el archivo
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $ruta_foto = $target_file;
        $ID = $_SESSION['ID_PERSONA'];
        $ACTUALIZARDatos5 = "UPDATE usuario SET FOTO='$ruta_foto' WHERE ID_PERSONA ='$ID'";
        include 'conexion.php';
        $actualizar5 = mysqli_query($conexion,$ACTUALIZARDatos5);

if($actualizar5 == TRUE){
    $_SESSION['FOTO'] = $ruta_foto;
    
    echo '<script> 


        alert("Actualización exitosa.");
        window.location = "datos.php";
    </script>';
} else {
    echo '<script> 


        alert("Error.");


    </script>';
}

        echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " Se subio correctamente";
    } else {
        echo "Error al cargar el archivo";
    }
}





    
       
    
?>