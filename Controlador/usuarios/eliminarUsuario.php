<?php
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/claseusuario.php");

$identificacion = $_GET['id_usuario'];

$objusuario = new usuarios();
$resultado = $objusuario->eliminarUsuario($identificacion);
?>