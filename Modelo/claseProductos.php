<?php
class productos
{
    public function mostrarEmpresas()
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT nombre_emp FROM proveedores WHERE id_estado = 1";
        $resultado = $conexion->prepare($consultar);
        $resultado->execute();

        while($result = $resultado->fetch())
        {
            $f[] = $result;
        }
        return $f;
    }

    public function mostrarProveedores()
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT usuarios.id_usuario,usuarios.nombres_usu,
        usuarios.apellidos_usu FROM usuarios WHERE usuarios.id_rol = 3 AND usuarios.id_estado = 1";
        $resultado = $conexion->prepare($consultar);
        $resultado->execute();

        while($result = $resultado->fetch())
        {
            $f[] = $result;
        }
        return $f;
    }

    public function registrarProducto($foto,$nombre,$precio,$casa,$caracteristicas,$ubicacion,$proveedor,$estado)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $insertar = "INSERT INTO productos VALUES(NULL, :foto, :nombre, :precio, :casa, :caracteristicas, :ubicacion, :proveedor, :estado)";
        $resultado = $conexion->prepare($insertar);
        $resultado->bindParam(":foto",$foto);
        $resultado->bindParam(":nombre",$nombre);
        $resultado->bindParam(":precio",$precio);
        $resultado->bindParam(":casa",$casa);
        $resultado->bindParam(":caracteristicas",$caracteristicas);
        $resultado->bindParam(":ubicacion",$ubicacion);
        $resultado->bindParam(":proveedor",$proveedor);
        $resultado->bindParam(":estado",$estado);
        $resultado->execute();

        echo"<script>alert('Registro Exitoso')</script>";
        echo"<script>location.href='../../Vista/administrador/productos.php'</script>";        
    }

    public function mostrarProductos()
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM productos
        LEFT JOIN usuarios ON productos.id_proveedor = usuarios.id_usuario
        LEFT JOIN proveedores ON productos.id_proveedor = proveedores.id_proveedor WHERE productos.id_estado = 1 AND usuarios.id_rol = 3";
        $resultado = $conexion->prepare($consultar);
        $resultado->execute();

        while($result = $resultado->fetch())
        {
            $f[]=$result;
        }
        return $f;
    }

    public function mostrarProducto($id_producto)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT productos.*, 
        usuarios.nombres_usu AS nombre_proveedor, 
        usuarios.apellidos_usu AS apellido_proveedor
        FROM productos
        LEFT JOIN usuarios ON productos.id_proveedor = usuarios.id_usuario
        LEFT JOIN proveedores ON usuarios.id_usuario = proveedores.id_usuario
        WHERE productos.id_estado = 1 AND productos.id_productos = :identificacion";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$id_producto);
        $resultado->execute();
        
        while($result = $resultado->fetch())
        {
            $f[] = $result;
        }
        return $f;
    }

    public function modificarProducto($identificacion, $foto, $nombre, $precio, $casa, $caracteristicas, $ubicacion, $proveedor, $estado)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $modificar = "UPDATE productos SET foto_producto = :foto, nombre_pro = :nombre, precio_pro = :precio, casa_pro = :casa, caracteristica_pro = :caracteristicas, 
        ubicacion_pro = :ubicacion, id_proveedor = :proveedor, id_estado = :estado WHERE id_productos = :identificacion";
        $resultado = $conexion->prepare($modificar);
        $resultado->bindParam(":foto",$foto);
        $resultado->bindParam(":nombre",$nombre);
        $resultado->bindParam(":precio",$precio);
        $resultado->bindParam(":casa",$casa);
        $resultado->bindParam(":caracteristicas",$caracteristicas);
        $resultado->bindParam(":ubicacion",$ubicacion);
        $resultado->bindParam(":proveedor",$proveedor);
        $resultado->bindParam(":estado",$estado);
        $resultado->bindParam(":identificacion",$identificacion);
        $resultado->execute();

        echo"<script>alert('Registro Exitoso')</script>";
        echo"<script>location.href='../../Vista/administrador/productos.php'</script>";        
    
    }

    public function eliminarProducto($identificacion)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $eliminar = "UPDATE productos SET id_estado = 2 WHERE id_productos = :identificacion";
        $resultado = $conexion->prepare($eliminar);
        $resultado->bindParam(":identificacion",$identificacion);
        $resultado->execute();

        echo"<script>alert('Producto Eliminado con Exito')</script>";
        echo"<script>location.href='../../Vista/administrador/productos.php'</script>";     
    }
}
?>