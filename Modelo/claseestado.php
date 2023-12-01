<?php 
 class estados
 {
    public function InsertarEstado($nombre_estado)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM estado WHERE nombre_estado = :nombre";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":nombre",$nombre_estado);
        $resultado->execute();
        $f = $resultado->fetch();

        if($f)
        {
            echo "<script>alert('El registro ya existe por favor verifique')</script>";
            echo "<script>location.href = '../../Vista/administrador/estados.php'</script>";
        }
        else
        {
            $insertar = "INSERT INTO estado VALUES (NULL,:nombre)";
            $resultado = $conexion->prepare($insertar);
            $resultado->bindParam(":nombre",$nombre_estado);
            $resultado->execute();
            
            echo "<script>alert('Registro Exitoso')</script>";
            echo "<script>location.href = '../../Vista/administrador/estados.php'</script>";
        }
    }
    
    public function mostrarestados()
    {
        $f = null;
        // creamos el objeto de conexion //
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();
        $consultar= "SELECT * FROM estado";
        $result = $conexion->prepare($consultar);
        $result->execute();

        while($resultado=$result->fetch())
        {
            $f[]=$resultado;
        }
        return $f;
    }

    public function buscarEstado($id_estado)
    {
        $f = null;
        // creamos el objeto de conexion //
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();
        $consulta= "SELECT * FROM estado WHERE id_estado=:id_estado";
        $result = $conexion->prepare($consulta);
        $result->bindParam(":id_estado",$id_estado);
        $result->execute();
        
        while($resultado=$result->fetch())
        {
            $f[]=$resultado;
        }
        return $f;
    }

    public function ModificarEstado($id_estado,$nombre)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();

        $modificar = "UPDATE estado SET estado.id_estado = :id_estado,
        estado.nombre_estado = :nombre WHERE estado.id_estado = :id_estado";
        $resultado = $conexion->prepare($modificar);

        $resultado->bindParam(":id_estado",$id_estado);
        $resultado->bindParam(":nombre",$nombre);

        $resultado->execute();

        echo '<script> alert("!se ha modificado la informacion¡") </script>'; 
        echo "<script> location.href='../../Vista/administrador/estados.php'</script>"; 
    }

    public function eliminarEstado($id_estado)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();

        $eliminar = "DELETE FROM estado WHERE id_estado = :id_estado";

        $resultado = $conexion->prepare($eliminar);
        $resultado->bindParam(":id_estado",$id_estado);
        $resultado->execute();

        echo "<script>alert('Registro Eliminado con Exitoso')</script>";
        echo "<script>location.href = '../../Vista/administrador/estados.php'</script>";

    }
 }
?>