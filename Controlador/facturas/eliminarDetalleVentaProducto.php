<?php
    session_start();
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claseFacturas.php");
    require_once("../../Controlador/facturas/mostrarFacturas.php");

    $cantidad_pro = null;
    $precio_pro = null;
    $id_producto = null;

    $id_temporal = $_GET['id_temporal'];
    $objfacturas = new facturas();
    $resultado = $objfacturas->consultarProducto($id_temporal);

    foreach($resultado as $f)
    {
        $cantidad_pro = $f['cantidad_pro'];
        $precio_pro = $f['precio_pro'];
        $id_producto = $f['id_producto'];
    }

    $descuento = $cantidad_pro * $precio_pro;
    $_SESSION['total'] = $_SESSION['total'] - $descuento;
    $descuentoIva = ($descuento*19)/100;
    $_SESSION['iva'] = $_SESSION['iva'] - $descuentoIva;
    $descuentoSub = ($descuento - $descuentoIva);
    $_SESSION['subtotal'] = $_SESSION['subtotal'] - $descuentoSub;

    $objfacturas = new facturas();
    $resultado = $objfacturas->eliminarDetalleVentaProducto($id_temporal);

?>
