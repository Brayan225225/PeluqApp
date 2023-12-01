<?php
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/claseFacturas.php");
require_once("../../Controlador/facturas/mostrarFacturas.php");
session_start();

$precio = null;
$usuario = null;
$cantidadProductos = $_POST['cantidadProductos'];
$id_productos = $_POST['idproducto'];
$usuario = $_SESSION['id_usu'];

$objfacturas = new facturas();
$resultado = $objfacturas->PrecioProducto($id_productos);

foreach ($resultado as $f) 
{
    $precio = $f['precio_pro'];
}

$total = $cantidadProductos * $precio;
$_SESSION['total'] = $_SESSION['total'] + $total;
$iva = ($total * 19 ) /100;
$_SESSION['iva'] = $_SESSION['iva'] + $iva;
$subtotal = ($total - $iva);
$_SESSION['subtotal'] = $_SESSION['subtotal'] + $subtotal;


// $_SESSION['subtotal'] = 0;
// $_SESSION['iva'] = 0;
// $_SESSION['total'] = 0;

$objfacturas = new facturas();
$resultado = $objfacturas->detalleFacturaCompra($cantidadProductos,$precio,$id_productos,$usuario);

?>