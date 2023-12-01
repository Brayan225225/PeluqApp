<?php
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/clasebodegas.php");
require_once("../../Controlador/bodegas/mostrarbodegas.php");

$identificacion = $_GET['id_bodega'];

$objbodega = new bodegas();
$resultado = $objbodega->eliminarBodega($identificacion);
?>