<?php
class rol
{
    function InsertarRol($nombre_rol,$estado_rol)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();

        $consultar = "SELECT * FROM roles WHERE id_rol = :idrol OR nombre_rol = :nombrerol";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":idrol",$id_rol);
        $resultado->bindParam(":nombrerol",$nombre_rol);
        $resultado->execute();
        $f = $resultado->fetch();

        if($f)
        {
            echo "<script>alert('El registro ya existe por favor verifique')</script>";
            echo "<script>location.href = '../../Vista/administrador/roles.php'</script>";
        }
        else
        {
            $insertar = "INSERT INTO roles VALUES (NULL,:nombrerol,:estado)";
            $resultado = $conexion->prepare($insertar);
            $resultado->bindParam("nombrerol",$nombre_rol);
            $resultado->bindParam(":estado",$estado_rol);
            $resultado->execute();
            
            echo "<script>alert('Registro Exitoso')</script>";
            echo "<script>location.href = '../../Vista/administrador/roles.php'</script>";
        }
    }

    public function mostrarroles()
    {
        $f = null;
        // creamos el objeto de conexion //
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();
        // WHERE rol_usu='Cliente'
        $consultar= "SELECT * FROM roles WHERE nombre_rol NOT LIKE 'Administrador' AND id_estado = 1";
        $result = $conexion->prepare($consultar);
        $result->execute();

        while($resultado=$result->fetch())
        {
            $f[]=$resultado;
        }
        return $f;
    }

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

    public function buscarRol($id_rol)
    {
        $f = null;
        // creamos el objeto de conexion //
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();
        $consulta= "SELECT * FROM roles WHERE id_rol=:idrol";
        $result = $conexion->prepare($consulta);
        $result->bindParam(":idrol",$id_rol);
        $result->execute();
        
        while($resultado=$result->fetch())
        {
            $f[]=$resultado;
        }
        return $f;
    }

    public function ModificarRol($id_rol,$nombre_rol,$estado)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();

        $modificar = "UPDATE roles SET roles.id_rol = :idrol,
        roles.nombre_rol = :nombrerol, roles.id_estado = :estado WHERE roles.id_rol = :idrol";
        $resultado = $conexion->prepare($modificar);

        $resultado->bindParam(":idrol",$id_rol);
        $resultado->bindParam(":nombrerol",$nombre_rol);
        $resultado->bindParam(":estado",$estado);
        $resultado->execute();

        echo '<script> alert("!se ha modificado la informacion¡") </script>'; 
        echo "<script> location.href='../../Vista/administrador/roles.php'</script>"; 
    }

    public function eliminarRol($id_rol)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();

        $eliminar = "UPDATE roles SET roles.id_estado = '2' WHERE id_rol = :idrol";

        $resultado = $conexion->prepare($eliminar);
        $resultado->bindParam(":idrol",$id_rol);
        $resultado->execute();

        echo "<script>alert('Registro Eliminado con Exitoso')</script>";
        echo "<script>location.href = '../../Vista/administrador/roles.php'</script>";

    }
    
}
?>