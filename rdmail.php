<?php
include ('conexion.php'); 
$persona = array(
    'datos' => array(
    'nombre' => 'Edwin Hernández',
    'correo' => 'fonsihernández8@gmail.com',
    'asunto' => 'Mas Información sobre TeContrato.com',
    'msg' => 'Se requiere mayor información sobre el funcionamiento de su página',
    'fono' => '5930996434838'
    )
);

$query = "INSERT INTO mails VALUES(NULL,1)";
$guardarMail = mysqli_query($conexion,$query);



if($guardarMail){
    mail($persona["datos"]["correo"], $persona["datos"]["asunto"], $persona["datos"]["msg"], null,
    'fonsihernandez8@gmail.com');
    header("location: ");
}


?>

<!-- <a href="mailto:<?php echo $persona["datos"]["correo"]; ?> ?subject=<?php echo $persona["datos"]["asunto"]; ?>
&body=<?php echo $persona["datos"]["msg"]; ?>"></a> -->