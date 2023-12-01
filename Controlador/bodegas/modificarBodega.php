<?php
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/clasebodegas.php");
require_once("../../Controlador/bodegas/mostrarbodegas.php");

$productos_ing = $_POST['cantidad_ing'];
$productos_sal = $_POST['cantidad_sal'];
$stock_min = $_POST['stock_min'];
$stock_max = $_POST['stock_max'];
$ubicacion_pro = $_POST['ubicacion_pro'];
$id_estado = 1;
$cantidad_dis = ($productos_ing - $productos_sal);
$id_bodega = $_POST['id_bodega'];

if($cantidad_dis > $stock_max)
{
    echo "<script>alert('La cantidad Disponible No puede ser Mayor al Stock Maximo por favor verifique')</script>";
    echo "<script>location.href = '../../Vista/administrador/bodegas.php'</script>";
}
if($cantidad_dis <= 0)
{
    echo "<script>alert('No hay productos a registrar')</script>";
    echo "<script>location.href = '../../Vista/administrador/bodegas.php'</script>";
}
if($cantidad_dis <= $stock_min)
{
    echo "<script>alert('No se puede realizar el registro debido a que hay menos del stock minimo')</script>";
    echo "<script>location.href = '../../Vista/administrador/bodegas.php'</script>";
}
else
{
    $objbodega = new bodegas();
    $resultado = $objbodega->modificarBodega($productos_ing,$productos_sal,$stock_min,$stock_max,$cantidad_dis,$ubicacion_pro,$id_estado,$id_bodega);
}
?>