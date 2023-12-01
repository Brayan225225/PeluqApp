<?php

require_once ("../../modelo/conexion.php");
require_once ("../../modelo/claseusuario.php");

$tipoDoc = $_POST['tipo_doc'];
$identificacion = $_POST ['identificacion'];
$nombres = $_POST ['nombres'];
$apellidos = $_POST ['apellidos'];
$email = $_POST ['correo'];
$direccion = $_POST['direccion'];
$telefono = $_POST ['telefono'];
$genero = $_POST ['genero'];
$fechaNac = $_POST ['fecha'];
$fechaing = $_POST ['fechaIng'];
$epscol = $_POST ['eps'];
$arlcol = $_POST ['arl'];
$nombrecon = $_POST ['nombrecon'];
$telcontacto = $_POST ['telcon'];

$objusuarios = new usuarios();
$reultado = $objusuarios->actualizarColaborador($tipoDoc,$identificacion,$nombres,$apellidos,$email,$direccion,$telefono,$genero,$fechaNac,$fechaing,$epscol,$arlcol,$nombrecon,$telcontacto);

?>