<?php
    
    session_start();
    
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claseFacturas.php");
    require_once("../../Controlador/facturas/mostrarFacturas.php");
    
    $cantidad = null;
    $id_producto = null;
    $precio = null;
    $identificacion = $_GET['id_temporal'];

    $objfacturas = new facturas();
    $resultado = $objfacturas->DescuentoProductos($identificacion);

    foreach($resultado as $f)
    {
        $cantidad = $f['cantidad'];
        $id_producto = $f['id_producto'];
    }
    
    $objfacturas = new facturas();
    $resultados = $objfacturas->PrecioProducto($id_producto);
    
    foreach($resultados as $f) 
    {
        $precio = $f['precio_pro'];
    }

    $descuento = $cantidad * $precio;
    $_SESSION['total'] = $_SESSION['total'] - $descuento;
    $descuentoIva = ($descuento*19)/100;
    $_SESSION['iva'] = $_SESSION['iva'] - $descuentoIva;
    $descuentoSub = ($descuento - $descuentoIva);
    $_SESSION['subtotal'] = $_SESSION['subtotal'] - $descuentoSub;

    // $_SESSION['subtotal'] = 0;
    // $_SESSION['iva'] = 0;
    // $_SESSION['total'] = 0;

    $objfacturas = new facturas();
    $resultado = $objfacturas->eliminarDetalleCompra($identificacion);

?>