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
$nit = $_POST['nit'];
$empresa = $_POST['empresa'];

$objusuarios = new usuarios();
$reultado = $objusuarios->actualizarProveedor($tipoDoc,$identificacion,$nombres,$apellidos,$email,$direccion,$telefono,$genero,$fechaNac,$nit,$empresa);

?>