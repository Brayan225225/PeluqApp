<?php
class servicios
{
    public function mostrarEstados()
    {
        $f = null;
        // creamos el objeto de conexion //
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();
        // WHERE rol_usu='Cliente'
        $consultar= "SELECT * FROM estado";
        $result = $conexion->prepare($consultar);
        $result->execute();

        while($resultado=$result->fetch())
        {
            $f[]=$resultado;
        }
        return $f;
    }

    public function mostrarServicios()
    {
        $f = null;
        // creamos el objeto de conexion //
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();
        // WHERE rol_usu='Cliente'
        $consultar= "SELECT * FROM servicios
        INNER JOIN estado ON servicios.id_estado = estado.id_estado WHERE servicios.id_estado = 1";
        $result = $conexion->prepare($consultar);
        $result->execute();

        while($resultado=$result->fetch())
        {
            $f[]=$resultado;
        }
        return $f;
    }

    public function insertarServicio($nombre,$precio,$estado)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM servicios WHERE Nombre_ser = :nombre";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":nombre",$nombre);
        $resultado->execute();

        $f = $resultado->fetch();

        if($f)
        {
            echo"<script>alert('Datos Registrados ya Existentes')</script>";
            echo"<script>location.href='../../Vista/administrador/servicios.php'</script>";
        }
        else
        {
            $insertar = "INSERT INTO servicios VALUES(NULL,:nombre,:precio,:estado)";
            $resultado = $conexion->prepare($insertar);
            $resultado->bindParam(":nombre",$nombre);
            $resultado->bindParam(":precio",$precio);
            $resultado->bindParam(":estado",$estado);
            $resultado->execute();
    
            echo"<script>alert('Registro Exitoso')</script>";
            echo"<script>location.href='../../Vista/administrador/servicios.php'</script>";
        }
    }

    public function bucarServicio($id_servicio)
    {
        $f = null;
        // creamos el objeto de conexion //
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();
        $consulta= "SELECT * FROM servicios WHERE id_servicio=:identificacion";
        $result = $conexion->prepare($consulta);
        $result->bindParam(":identificacion",$id_servicio);
        $result->execute();
        
        while($resultado=$result->fetch())
        {
            $f[]=$resultado;
        }
        return $f;
    }

    public function modificarServicio($identificacion,$nombre,$precio,$estado)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $actualizar =  "UPDATE servicios SET Nombre_ser = :nombre, precio_ser = :precio, id_estado = :estado WHERE id_servicio = :identificacion";
        $resultado = $conexion->prepare($actualizar);
        $resultado->bindParam(":identificacion",$identificacion);
        $resultado->bindParam(":nombre",$nombre);
        $resultado->bindParam(":precio",$precio);
        $resultado->bindParam(":estado",$estado);
        $resultado->execute();

        echo'<script>alert("Registro Actualizado con Exito")</script>';
        echo'<script>location.href="../../Vista/administrador/servicios.php"</script>';

    }

    public function EliminarServicio($identificacion)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $eliminar = "UPDATE servicios SET id_estado = 2 WHERE id_servicio = :identificacion";
        $resultado = $conexion->prepare($eliminar);
        $resultado->bindParam(":identificacion",$identificacion);
        $resultado->execute();

        echo'<script>alert("Registro Eliminado con Exito")</script>';
        echo'<script>location.href="../../Vista/administrador/servicios.php"</script>';
    }
}
?>