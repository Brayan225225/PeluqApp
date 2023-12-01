<?php

class claselogin
{
    public function ValidarSesion($usuario_usu,$contraseña_usu)
    {
        //traemos la conexion
        $objconexion = new conexion;
        $conexio = $objconexion->get_conexion();
        
        //iniciamos lo que vamos a realizar 
        $consultar = "SELECT * FROM usuarios WHERE usuario_usu=:uno";
        //preparamos el resultado a consultar
        $resultado = $conexio->prepare($consultar);
        //damos el parametro
        $resultado->bindParam(":uno",$usuario_usu); 
        //ejecutamos el parametro 
        $resultado->execute();

        //convertimos la variable en un arreglo y validamos su nombre de usuario
        if($f = $resultado ->fetch())
        {
            //dado el caso de que el usuario sea valido se procedera a validar su contraseña 
            //se iguala el parametro con al nombre del input dado en el html
            if($contraseña_usu == $f['contraseña_usu'])
            {
                if($f['id_estado'] == '1')
                {
                    //se dara inicio y si queremos usar algunas de las variable del usuario dentro de su formulario
                    //podremos hacerlo 
                    session_start();
                    $_SESSION['id_usu']= $f['id_usuario'];
                    $_SESSION['usuario']=$f['correo_usu'];
                    $_SESSION['nombres']=$f['nombres_usu'];
                    $_SESSION['apellidos']=$f['apellidos_usu'];
                    $_SESSION['id_rol']=$f['id_rol'];
                    $_SESSION['subtotal'] = 0;
                    $_SESSION['iva'] = 0;
                    $_SESSION['total'] = 0;
                    //ARCHIVO DE SEGURIDAD
                    //esta variable de sesion se utilisa para validar la seguridad de las interfaces
                    //valida una autentificacion un rol y que cumpla todo lo requerido para estar aqui
                    $_SESSION['autenticado']="SI";

                    //validamos el rol para redireccionar a su debido formulario
                    switch ($f['id_rol']) 
                    {
                        case '1':
                            echo '<script> alert("Bienvenido Colaborador del sistema") </script>'; 
                            echo "<script> location.href='../../Vista/colaboradores/inicio.php'</script>";          
                            break;
                        case '2':
                            echo '<script> alert("Bienvenido al sistema Cliente") </script>'; 
                            echo "<script> location.href='../../Vista/clientes/inicio.php'</script>";          
                            break;
                        case '3':
                            echo '<script> alert("Bienvenido Proveedor del sistema") </script>'; 
                            echo "<script> location.href='../../Vista/proveedores/inicio.php'</script>";          
                            break;
                            case '4':
                                echo '<script> alert("Bienvenido Administrador al sistema") </script>'; 
                                echo "<script> location.href='../../Vista/administrador/inicio.php'</script>";          
                                break;
                        default:
                            break;    
                    } 
                }
                    
                else
                {
                    echo '<script> alert("Cuenta inactiva por favor llamar y/o contactar directamente con la entidad") </script>'; 
                    echo "<script> location.href='../../Vista/login/ingresar.php'</script>"; 
                }        
            }
    
            else
            {
                echo '<script> alert("La clave ingresada no coinside con la de la base de datos") </script>'; 
                echo "<script> location.href='../..//Vista/login/ingresar.php'</script>"; 
            }
        }
        
        else
        {
            echo '<script> alert("El email ingresado no existe en la base de datos") </script>'; 
            echo "<script> location.href='../..//Vista/login/ingresar.php'</script>"; 
        }
    }
}

?>