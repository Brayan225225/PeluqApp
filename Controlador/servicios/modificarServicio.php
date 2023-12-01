<?php
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/claseServicios.php");
require_once("../../Controlador/servicios/mostrarServicios.php");

$identificacion = $_POST['id_servicio'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$estado = $_POST['estado'];

$objservicio = new servicios();
$resultado = $objservicio->modificarServicio($identificacion,$nombre,$precio,$estado);
?>