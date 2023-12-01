<?php

session_start();
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/claseFacturas.php");
require_once("../../Controlador/facturas/mostrarFacturas.php");

$precioProductos = null;
$precioServicios = null;
$cantidadServicios = $_POST['cantidad_servicios'];
$cantidadProductos = $_POST['cantidad_productos'];
$id_productos = $_POST['productos'];
$id_servicios = $_POST['servicios'];
$usuario = $_SESSION['id_usu'];

if($cantidadServicios == null && $cantidadProductos == null)
{
    echo "<script>alert('No se ha podido realizar el registro con exito')</script>";
    echo "<script>location.href = '../../Vista/administrador/facturacion.php'</script>";
}

else if($_POST['cantidad_servicios'] && $_POST['cantidad_productos'])
{
    $objfacturas = new facturas();
    $resultado = $objfacturas->PrecioProducto($id_productos);
    foreach ($resultado as $f) 
    {
        $precioProductos = $f['precio_pro'];
    }

    $objfacturas = new facturas();
    $resultado = $objfacturas->PrecioServicios($id_servicios);
    foreach ($resultado as $f) 
    {
        $precioServicios = $f['precio_ser'];
    }

    $total1 = $cantidadProductos * $precioProductos;
    $total2 = $cantidadServicios * $precioServicios;
    $total = $total1 + $total2;
    $_SESSION['total'] = $_SESSION['total'] + $total;
    $iva = ($total * 19 ) /100;
    $_SESSION['iva'] = $_SESSION['iva'] + $iva;
    $subtotal = ($total - $iva);
    $_SESSION['subtotal'] = $_SESSION['subtotal'] + $subtotal;

    $objfacturas = new facturas();
    $resultado = $objfacturas->detalleFacturaVenta($cantidadProductos,$precioProductos,$id_productos,$cantidadServicios,$precioServicios,$id_servicios,$usuario);

}

else if($_POST['cantidad_servicios'])
{
    $objfacturas = new facturas();
    $resultado = $objfacturas->PrecioServicios($id_servicios);
    foreach ($resultado as $f) 
    {
        $precioServicios = $f['precio_ser'];
    }

    $total = $cantidadServicios * $precioServicios;
    $_SESSION['total'] = $_SESSION['total'] + $total;
    $iva = ($total * 19 ) /100;
    $_SESSION['iva'] = $_SESSION['iva'] + $iva;
    $subtotal = ($total - $iva);
    $_SESSION['subtotal'] = $_SESSION['subtotal'] + $subtotal;

    $objfacturas = new facturas();
    $resultado = $objfacturas->detalleFacturaVentaServicios($cantidadServicios,$precioServicios,$id_servicios,$usuario);
}

else if($_POST['cantidad_productos'])
{
    $objfacturas = new facturas();
    $resultado = $objfacturas->PrecioProducto($id_productos);
    foreach ($resultado as $f) 
    {
        $precioProductos = $f['precio_pro'];
    }

    $total = $cantidadProductos * $precioProductos;
    $_SESSION['total'] = $_SESSION['total'] + $total;
    $iva = ($total * 19 ) /100;
    $_SESSION['iva'] = $_SESSION['iva'] + $iva;
    $subtotal = ($total - $iva);
    $_SESSION['subtotal'] = $_SESSION['subtotal'] + $subtotal;

    $objfacturas = new facturas();
    $resultado = $objfacturas->detalleFacturaVentaProductos($cantidadProductos,$precioProductos,$id_productos,$usuario);
}


?>