<?php

require_once("../../Modelo/conexion.php");
require_once("../../Modelo/claseServicios.php");

$identificacion = $_GET['id_servicio'];

$objservicios = new servicios();
$resultado = $objservicios->EliminarServicio($identificacion);

?>