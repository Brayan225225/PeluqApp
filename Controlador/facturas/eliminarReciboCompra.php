<?php
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/claseFacturas.php");
require_once("../../Controlador/facturas/mostrarFacturas.php");

$id_factura = $_GET['id_recibo_compra'];

$objfacturas = new facturas();
$resultado = $objfacturas->eliminarReciboCompra($id_factura);
?>