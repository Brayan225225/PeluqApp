<?php
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/claseServicios.php");

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$estado = $_POST['estado'];

$objservicio = new servicios();
$resultado = $objservicio->insertarServicio($nombre,$precio,$estado);
?>