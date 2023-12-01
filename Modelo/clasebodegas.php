<?php
class bodegas
{
    public function consultarId_Producto($usuario)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consulta = "SELECT * FROM tmp_detalle_rc WHERE id_usuario = :identificacion";
        $resultado = $conexion->prepare($consulta);
        $resultado->bindParam(":identificacion",$usuario);
        $resultado->execute();

        while($result=$resultado->fetch())
        {
            $f[]=$result;
        }
        return $f;
    }

    public function consultarStocMax($id_producto)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consulta = "SELECT stock_max,cantidad_disponible FROM bodega WHERE id_producto = :identificacion";
        $resultado = $conexion->prepare($consulta);
        $resultado->bindParam(":identificacion",$id_producto);
        $resultado->execute();

        while($result=$resultado->fetch())
        {
            $f[]=$result;
        }
        return $f;
    }

    public function mostrarProductos()
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consulta = "SELECT * FROM productos WHERE id_estado = 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        while($result=$resultado->fetch())
        {
            $f[]=$result;
        }
        return $f;
    }

    public function insertarBodega($productos_ing,$productos_sal,$stock_min,$stock_max,$cantidad_dis,$ubicacion_pro,$id_prodcuto,$id_estado)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM bodega WHERE id_producto = :id_producto";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":id_producto",$id_prodcuto);
        $resultado->execute();
        $f = $resultado->fetch();

        if($f)
        {
            echo "<script>alert('El producto ya se encuentra registrado')</script>";
            echo "<script>location.href = '../../Vista/administrador/bodegas.php'</script>";
        }
        else
        {
            $insertar = "INSERT INTO bodega VALUES (null, :cantidad_ing, :cantidad_sal, :stock_min, :stock_max, :cantidad_dis, :ubicacion_pro, :id_producto, :id_estado)";
            $resultado = $conexion->prepare($insertar);
            $resultado->bindParam(":cantidad_ing",$productos_ing);
            $resultado->bindParam(":cantidad_sal",$productos_sal);
            $resultado->bindParam(":stock_min",$stock_min);
            $resultado->bindParam(":stock_max",$stock_max);
            $resultado->bindParam(":cantidad_dis",$cantidad_dis);
            $resultado->bindParam(":ubicacion_pro",$ubicacion_pro);
            $resultado->bindParam(":id_producto",$id_prodcuto);
            $resultado->bindParam(":id_estado",$id_estado);
            $resultado->execute();
            
            echo "<script>alert('Registro Exitoso')</script>";
            echo "<script>location.href = '../../Vista/administrador/bodegas.php'</script>";
        }
    }
    public function mostrarbodegas()
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM bodega 
        INNER JOIN productos ON productos.id_productos = bodega.id_producto WHERE bodega.id_estado = 1";
        $resultado = $conexion->prepare($consultar);
        $resultado->execute();

        while($result=$resultado->fetch())
        {
            $f[]=$result;
        }
        return $f;

    }

    public function buscarBodega($id_bodega)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consulta = "SELECT * FROM bodega 
        INNER JOIN productos ON productos.id_productos = bodega.id_producto 
        WHERE id_bodega = :identificacion";
        $resultado = $conexion->prepare($consulta);
        $resultado->bindParam(":identificacion",$id_bodega);
        $resultado->execute();

        while($result=$resultado->fetch())
        {
            $f[]=$result;
        }
        return $f;
    }

    public function modificarBodega($productos_ing,$productos_sal,$stock_min,$stock_max,$cantidad_dis,$ubicacion_pro,$id_estado,$id_bodega)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $modificar = "UPDATE bodega SET productos_ing = :cantidad_ing, productos_sal = :cantidad_sal, stock_min = :stock_min, stock_max = :stock_max, 
        cantidad_disponible = :cantidad_dis, ubicacion_pro = :ubicacion_pro, id_estado = :id_estado WHERE id_bodega = :identificacion";
        $resultado = $conexion->prepare($modificar);
        $resultado->bindParam(":cantidad_ing",$productos_ing);
        $resultado->bindParam(":cantidad_sal",$productos_sal);
        $resultado->bindParam(":stock_min",$stock_min);
        $resultado->bindParam(":stock_max",$stock_max);
        $resultado->bindParam(":cantidad_dis",$cantidad_dis);
        $resultado->bindParam(":ubicacion_pro",$ubicacion_pro);
        $resultado->bindParam(":id_estado",$id_estado);
        $resultado->bindParam(":identificacion",$id_bodega);
        $resultado->execute();
        
        echo "<script>alert('Se ha modificado satisfactoriamente')</script>";
        echo "<script>location.href = '../../Vista/administrador/bodegas.php'</script>";
    }

    public function eliminarBodega($identificacion)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $eliminar = "UPDATE bodega SET id_estado = 2 WHERE id_bodega = :identificacion";
        $resultado = $conexion->prepare($eliminar);
        $resultado->bindParam(":identificacion",$identificacion);
        $resultado->execute();

        echo "<script>alert('Se a eliminado el Almacenamiento Correctamente')</script>";
        echo "<script>location.href = '../../Vista/administrador/bodegas.php'</script>";
    }
}
?>