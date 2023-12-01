<?php
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/claseProductos.php");

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$casa = $_POST['casa'];
$caracteristicas = $_POST['caracteristicas'];
$ubicacion = $_POST['ubicacion'];
$estado = 1;
$proveedor = $_POST['proveedor'];

define ('LIMITE',2000);
define ('ARREGLO', serialize(array('image/jpg','image/png','image/jpeg','image/gif','image/webp')));
$PERMITIDOS = unserialize(ARREGLO);

if($_FILES['fotoProducto']['error'])
{
    echo '<script> alert("Error al cargar la imagen por favor intente nuevamente") </script>'; 
    echo "<script> location.href='../../Vista/administrador/productos.php'</script>"; 
}
else
{
    //confirmamos formato de imagen y peso
    if(in_array($_FILES['fotoProducto']['type'],$PERMITIDOS,) && $_FILES['fotoProducto']['size'] <= LIMITE * 1024 )
    {
        //capturamos los valores a guardar en la base de datos 
        $foto = "../../uploads/productos/".$_FILES['fotoProducto']['name'];
        // movemos el archivo a la carpeta seleccionada o creada
        $resultado = move_uploaded_file($_FILES['fotoProducto']['tmp_name'],$foto);

        $objproductos = new productos();
        $resultado = $objproductos->registrarProducto($foto,$nombre,$precio,$casa,$caracteristicas,$ubicacion,$proveedor,$estado);
    }
    else
    {
        echo '<script> alert("Error al cargar la imagen, verificar formato y/o peso, por favor intente nuevamente") </script>'; 
        echo "<script> location.href='../../Vista/administrador/productos.php'</script>";
    }
}

?>