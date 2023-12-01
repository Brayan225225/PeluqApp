<?php
session_start();

require_once("../../Modelo/conexion.php");
require_once("../../Modelo/claseFacturas.php");
require_once("../../Modelo/clasebodegas.php");
require_once("../../Controlador/facturas/mostrarFacturas.php");

$tipoFactura = $_POST['selectFactura'];

if($tipoFactura == "Compra")
{
    $fecha = $_POST['fecha'];
    $subtotal = $_POST['subtotal'];
    $iva = $_POST['iva'];
    $total = $_POST['total'];
    $usuario = $_POST['identificacionUsuario'];
    $proveedor = $_POST['proveedor'];
    $formaPago = $_POST['formaPago'];
    $estado = 1;

    $validar = null;
    $nombres = "";
    $objfacturas = new facturas();
    $resultadoStock = $objfacturas->stockMaximo($usuario);
    
    foreach($resultadoStock as $f)
    {
        $total = ($f['cantidad'] + $f['cantidad_disponible']); 
        
        if($total <= $f['stock_max'])
        {
            $validar = true;
        }
        else
        {
            $nombres = $nombres." ".$f['nombre_pro'];
            $validar = false;
        }
    }

    if($validar)
    {
        $resultado =  $objfacturas->InsertarFacturaCompra($fecha,$subtotal,$iva,$total,$usuario,$proveedor,$formaPago,$estado);
        $_SESSION['total'] = 0;
        $_SESSION['iva'] = 0;
        $_SESSION['subtotal'] = 0;
    }
    else
    {
        echo "<script>alert('Alguno de los productos que intenta comprar ya se encuentra en su Stock al Maximo')</script>";
        echo "<script>alert('El producto es: ".$nombres."')</script>";
        echo "<script>location.href = '../../Vista/Administrador/facturacion.php?select=1'</script>";
    }
}
if($tipoFactura == "Venta")
{
    $fecha = $_POST['fecha'];
    $subtotal = $_POST['subtotal'];
    $iva = $_POST['iva'];
    $total = $_POST['total'];
    $usuario = $_POST['identificacionUsuario'];
    $cliente = $_POST['clientes'];
    $formaPago = $_POST['formaPago'];
    $estado = 1;

    $validar = null;
    $nombres = "";
    $objfacturas = new facturas();
    $resultadoStock = $objfacturas->stockMinimo($usuario);

    foreach($resultadoStock as $f)
    {
        $total = ($f['cantidad_disponible'] - $f['cantidad_pro']); 

        if($total >= $f['stock_min'] && $total <= $f['stock_max'])
        {
            $nombres = $nombres." ".$f['nombre_pro'];
            $validar = 1;
        }
        else if($total <= $f['stock_min'] && $total > 0)
        {
            $nombres = $nombres." ".$f['nombre_pro'];
            $validar = 2;
        }
        else if($total <= 0)
        {
            $nombres = $nombres." ".$f['nombre_pro'];
            $validar = 3;
        }
        else
        {
            $nombres = $nombres." ".$f['nombre_pro'];
            $validar = 3;
        }

        
    }

    if($validar == 1)
    {
        $resultado =  $objfacturas->InsertarFacturaVenta($fecha,$subtotal,$iva,$total,$usuario,$cliente,$formaPago,$estado);
        
        $_SESSION['total'] = 0;
        $_SESSION['iva'] = 0;
        $_SESSION['subtotal'] = 0;
    }
    else if($validar == 2)
    {
        echo "<script>alert('Alguno de los productos que intenta Vender ya estan proximos a terminar por favor verificar y realizar la accion respectiva')</script>";
        echo "<script>alert('El producto es: ".$nombres."')</script>";

        $resultado =  $objfacturas->InsertarFacturaVenta($fecha,$subtotal,$iva,$total,$usuario,$cliente,$formaPago,$estado);
        
        $_SESSION['total'] = 0;
        $_SESSION['iva'] = 0;
        $_SESSION['subtotal'] = 0;
    }
    else
    {
        echo "<script>alert('El siguiente producto no se encuentra en almacenamiento por favor verifique')</script>";
        echo "<script>alert('".$nombres."')</script>";
        echo "<script>location.href = '../../Vista/Administrador/facturacion.php?select=2'</script>";
    }
}

?>