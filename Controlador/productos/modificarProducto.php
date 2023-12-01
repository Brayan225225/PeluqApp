<?php
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/claseProductos.php");

$identificacion = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$casa = $_POST['casa'];
$caracteristicas = $_POST['caracteristicas'];
$ubicacion = $_POST['ubicacion'];
$estado = 1;
$proveedor = $_POST['proveedor'];

define('LIMITE', 2000);
define('ARREGLO', serialize(array('image/jpg', 'image/png', 'image/jpeg', 'image/gif', 'image/webp')));
$PERMITIDOS = unserialize(ARREGLO);

$objproductos = new productos();
$fotoActual = $objproductos->mostrarProducto($identificacion);

$url1 = null;
foreach ($fotoActual as $f) 
{
    $url1 = $f['foto_producto'];
}

if ($_FILES['fotoProducto']['error'] === UPLOAD_ERR_OK) 
{
    // Se ha seleccionado un archivo de imagen nuevo, procedemos a actualizar la foto
    if (in_array($_FILES['fotoProducto']['type'], $PERMITIDOS) && $_FILES['fotoProducto']['size'] <= LIMITE * 1024) 
    {
        // Capturamos los valores a guardar en la base de datos
        $foto = "../../uploads/productos/" . $_FILES['fotoProducto']['name'];
        // Movemos el archivo a la carpeta seleccionada o creada
        $resultado = move_uploaded_file($_FILES['fotoProducto']['tmp_name'], $foto);

        $objproductos = new productos();
        $resultado = $objproductos->modificarProducto($identificacion, $foto, $nombre, $precio, $casa, $caracteristicas, $ubicacion, $proveedor, $estado);
    }
    
    else 
    {
        echo '<script> alert("Error al cargar la imagen, verificar formato y/o peso, por favor intente nuevamente") </script>';
    }
} 

else 
{
    // No se ha seleccionado un archivo de imagen nuevo, mantener la foto existente en la base de datos
    $objproductos = new productos();
    $resultado = $objproductos->modificarProducto($identificacion, $url1, $nombre, $precio, $casa, $caracteristicas, $ubicacion, $proveedor, $estado);
}

// Redirigir a la página de administrador después de la modificación
echo "<script> location.href='../../Vista/administrador/productos.php'</script>";

?>