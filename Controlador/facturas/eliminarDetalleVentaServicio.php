<?php
    session_start();
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claseFacturas.php");
    require_once("../../Controlador/facturas/mostrarFacturas.php");

    $cantidad_ser = null;
    $precio_ser = null;
    $id_servicio = null;

    $id_temporal = $_GET['id_temporal'];
    $objfacturas = new facturas();
    $resultado = $objfacturas->consultarProducto($id_temporal);

    foreach($resultado as $f)
    {
        $cantidad_ser = $f['cantidad_ser'];
        $precio_ser = $f['precio_ser'];
        $id_servicio = $f['id_servicio'];
    }

    $descuento = $cantidad_ser * $precio_ser;
    $_SESSION['total'] = $_SESSION['total'] - $descuento;
    $descuentoIva = ($descuento*19)/100;
    $_SESSION['iva'] = $_SESSION['iva'] - $descuentoIva;
    $descuentoSub = ($descuento - $descuentoIva);
    $_SESSION['subtotal'] = $_SESSION['subtotal'] - $descuentoSub;

    $objfacturas = new facturas();
    $resultado = $objfacturas->eliminarDetalleVentaServicio($id_temporal);

?>