<?php
class usuarios
{
    public function RegistrarUsuarioExt($tipo_documento,$id_usuario,$Nombres_Usu,$apellidos_usu,$correo_usu,$direccion_usu,$genero_usu,$fecha_naUsu,$telefono_usu,$usuario_usu,$claveMd,$id_estado,$id_rol)
    {
        //creamos una coexion o traemos la conexion para realizar el proceso 
        //que se va a realizar usando la base de datos
        $objconexion = new Conexion;
        $conexion = $objconexion -> get_conexion();

        //en este caso primero se realizara un varificacion de los datos para no realizar un doble registro con su numero de indrtificacion y/o correo
        $consultar = "SELECT * FROM usuarios WHERE id_usuario=:id_usu OR correo_usu=:correo";

        //preparamos los campos a usar para la consulta
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":id_usu",$id_usuario);
        $resultado->bindParam(":correo",$correo_usu);

        //ejecutamos el resultado
        $resultado->execute();

        //convertimos las variables en arreglos
        $f = $resultado->fetch();

        //creamos la condicion si dentro de la base de datos ya existen dicho datos
        //nos los mostrara dentro del arreglo convertido por lo tanto el if sera verdadero y dira
        if ($f)
        {
            echo '<script> alert("los datos registrados ya se encuentran registrados en el sistema") </script>'; 
            echo "<script> location.href='../../Vista/login/registrarse.php'</script>"; 
        }
        //si no existen dichos dtos en la base de datos realizara el registro 
        else
        {
            //realizamos la consulta mysql en este caso insert 
            $insertar = "INSERT INTO usuarios VALUES (:tipo,:id,:tres,:cuatro,:cinco,:seis,:ciete,:ocho,:nueve,
            :dies,:once,:doce,:trece)";

            // preparamos lo necesario para ejecutar el insert
            $resultado= $conexion->prepare($insertar);
            //convertimos losargumentos en parametros con binparam
            $resultado->bindParam(":tipo",$tipo_documento);
            $resultado->bindParam(":id",$id_usuario);
            $resultado->bindParam(":tres",$Nombres_Usu);
            $resultado->bindParam(":cuatro",$apellidos_usu);
            $resultado->bindParam(":cinco",$correo_usu);
            $resultado->bindParam(":seis",$direccion_usu);
            $resultado->bindParam(":ciete",$genero_usu);
            $resultado->bindParam(":ocho",$fecha_naUsu);
            $resultado->bindParam(":nueve",$telefono_usu);
            $resultado->bindParam(":dies",$correo_usu);
            $resultado->bindParam(":once",$claveMd);
            $resultado->bindParam(":doce",$id_estado);
            $resultado->bindParam(":trece",$id_rol);

            if($resultado->execute())
            {
                $insertar = "INSERT INTO clientes VALUES (:id,:id_usuario,:id_estado)";
                $resultado = $conexion->prepare($insertar);
                $resultado->bindParam(":id",$id_usuario);
                $resultado->bindParam(":id_usuario",$id_usuario);
                $resultado->bindParam(":id_estado",$id_estado);
                $resultado->execute();  

                echo '<script> alert("ha creado su cuenta exitosamente") </script>'; 
                echo "<script> location.href='../../Vista/login/ingresar.php'</script>";     
            }
            else
            {
                echo '<script> alert("hubo un ERROR por favor verifique") </script>'; 
                echo "<script> location.href='../../Vista/login/registrarse.php'</script>";     
            }
        } 
    }

    public function RegistrarUsuario($tipo_documento,$id_usuario,$Nombres_Usu,$apellidos_usu,$correo_usu,$direccion_usu,$genero_usu,$fecha_naUsu,$telefono_usu,$usuario_usu,$claveMd,$id_estado,$id_rol)
    {
        //creamos una coexion o traemos la conexion para realizar el proceso 
        //que se va a realizar usando la base de datos
        $objconexion = new Conexion;
        $conexion = $objconexion -> get_conexion();

        //en este caso primero se realizara un varificacion de los datos para no realizar un doble registro con su numero de indrtificacion y/o correo
        $consultar = "SELECT * FROM usuarios WHERE id_usuario=:id_usu OR correo_usu=:correo";

        //preparamos los campos a usar para la consulta
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":id_usu",$id_usuario);
        $resultado->bindParam(":correo",$correo_usu);

        //ejecutamos el resultado
        $resultado->execute();

        //convertimos las variables en arreglos
        $f = $resultado->fetch();

        //creamos la condicion si dentro de la base de datos ya existen dicho datos
        //nos los mostrara dentro del arreglo convertido por lo tanto el if sera verdadero y dira
        if ($f)
        {
            echo '<script> alert("los datos registrados ya se encuentran registrados en el sistema") </script>'; 
            echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>"; 
        }
        //si no existen dichos dtos en la base de datos realizara el registro 
        else
        {
            //realizamos la consulta mysql en este caso insert 
            $insertar = "INSERT INTO usuarios VALUES (:uno,:dos,:tres,:cuatro,:cinco,:seis,:ciete,:ocho,:nueve,
            :dies,:once,:doce,:trece)";

            // preparamos lo necesario para ejecutar el insert
            $resultado= $conexion->prepare($insertar);
            //convertimos losargumentos en parametros con binparam
            $resultado->bindParam(":uno",$tipo_documento);
            $resultado->bindParam(":dos",$id_usuario);
            $resultado->bindParam(":tres",$Nombres_Usu);
            $resultado->bindParam(":cuatro",$apellidos_usu);
            $resultado->bindParam(":cinco",$correo_usu);
            $resultado->bindParam(":seis",$direccion_usu);
            $resultado->bindParam(":ciete",$genero_usu);
            $resultado->bindParam(":ocho",$fecha_naUsu);
            $resultado->bindParam(":nueve",$telefono_usu);
            $resultado->bindParam(":dies",$correo_usu);
            $resultado->bindParam(":once",$claveMd);
            $resultado->bindParam(":doce",$id_estado);
            $resultado->bindParam(":trece",$id_rol);

            
            if($resultado->execute())
            {
                $insertar = "INSERT INTO clientes VALUES (:id,:id_usuario,:id_estado)";
                $resultado = $conexion->prepare($insertar);
                $resultado->bindParam(":id",$id_usuario);
                $resultado->bindParam(":id_usuario",$id_usuario);
                $resultado->bindParam(":id_estado",$id_estado);
                $resultado->execute();

                echo '<script> alert("Registro Exitoso") </script>'; 
                echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>";     
            }
            else
            {
                // confirmamos el registro y redirrecionamos  al login //
                echo '<script> alert("Hubo un error en el registro") </script>'; 
                echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>";     
            }

        } 
    }    

    public function Insertarcolaborador($tipo_documento,$id_usuario,$Nombres_Usu,$apellidos_usu,$correo_usu,$direccion_usu,$genero_usu,$fecha_naUsu,$telefono_usu,$usuario_usu,$claveMd,$id_estado,$id_rol,$id_colaborador,$fecha_igrCol,$eps_col,$arl_col,$nombre_contacto,$tel_contacto,$id_estado_col,$id_usuario_col)
    {
        // traemos la conecxion a base de datos 
        $objconexion = new conexion;
        $conexion = $objconexion->get_conexion();

        // realizamos la consulta en este caso que el colaborador no exista dentro del sistema
        $consultar = "SELECT * FROM usuarios WHERE id_usuario=:id_usu OR correo_usu=:correo_usu";

        // preparamos los parametros a usar para la consulta 
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":id_usu",$id_usuario);
        $resultado->bindParam(":correo_usu",$correo_usu);
        
        // ejecutamos el resultado
        $resultado->execute();

        // convertimos las variables en un rreglo para poder identificar si se hayo algo o no 
        $f = $resultado->fetch();

        // realizamos la condicion de que si alguno de los dos datos anteriores existe no e podra crear de nuevo 
        if ($f)
        {
            echo '<script> alert("los datos registrados ya se encuentran registrados en el sistema por favor verifique") </script>'; 
            echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>"; 
        }

        // al no existir los datos se realizara la insersion 
        else
        {
            // creamos el registro o la insercion de datos
            $insertar = "INSERT INTO usuarios VALUES (:tipo,:id_usu,:nombres,
            :apellidos,:correo_usu,:direccion,:genero,:fechan,:telefono,:usuario,:contrasena,
            :estado,:rol)";
            
            // preparamos lo necesario para el registro
            $resultado = $conexion->prepare($insertar);

            // convertimos los argumentos en parametros
            $resultado->bindParam(":tipo",$tipo_documento);
            $resultado->bindParam(":id_usu",$id_usuario);
            $resultado->bindParam(":nombres",$Nombres_Usu);
            $resultado->bindParam(":apellidos",$apellidos_usu);
            $resultado->bindParam(":correo_usu",$correo_usu);
            $resultado->bindParam(":direccion",$direccion_usu);
            $resultado->bindParam(":genero",$genero_usu);
            $resultado->bindParam(":fechan",$fecha_naUsu);
            $resultado->bindParam(":telefono",$telefono_usu);
            $resultado->bindParam(":usuario",$correo_usu);
            $resultado->bindParam(":contrasena",$claveMd);
            $resultado->bindParam(":estado",$id_estado);
            $resultado->bindParam(":rol",$id_rol);

            if ($resultado->execute())
            {
                $insert = 'INSERT INTO colaboradores VALUES (:id_usu,:fechaing,:eps,:arl,:contacto,:telcontacto,:estado,:id_usu)';
                $result = $conexion->prepare($insert);
                $result->bindParam(":id_usu",$id_colaborador);
                $result->bindParam(":fechaing",$fecha_igrCol);
                $result->bindParam(":eps",$eps_col);
                $result->bindParam(":arl",$arl_col);
                $result->bindParam(":contacto",$nombre_contacto);
                $result->bindParam(":telcontacto",$tel_contacto);
                $result->bindParam(":estado",$id_estado_col);
                $result->bindParam(":id_usu",$id_usuario_col);
                $result->execute(); 

                echo '<script> alert("Registro Exitoso") </script>'; 
                echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>";             
            }

            else
            {
                echo '<script> alert("Hubo un error por favor verificar") </script>'; 
                echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>"; 
            }
            
        }
    }

    public function insertarProveedor($tipo_documento,$id_usuario,$Nombres_Usu,$apellidos_usu,$correo_usu,$direccion_usu,$genero_usu,$fecha_naUsu,$telefono_usu,$usuario_usu,$claveMd,$id_estado,$id_rol,$id_proveedor,$empresa,$nit,$id_estado_pro,$id_usuario_pro)
    {
                // traemos la conecxion a base de datos 
                $objconexion = new conexion;
                $conexion = $objconexion->get_conexion();
        
                // realizamos la consulta en este caso que el colaborador no exista dentro del sistema
                $consultar = "SELECT * FROM usuarios WHERE id_usuario=:id_usu OR correo_usu=:correo_usu";
        
                // preparamos los parametros a usar para la consulta 
                $resultado = $conexion->prepare($consultar);
                $resultado->bindParam(":id_usu",$id_usuario);
                $resultado->bindParam(":correo_usu",$correo_usu);
                
                // ejecutamos el resultado
                $resultado->execute();
        
                // convertimos las variables en un rreglo para poder identificar si se hayo algo o no 
                $f = $resultado->fetch();
        
                // realizamos la condicion de que si alguno de los dos datos anteriores existe no e podra crear de nuevo 
                if ($f)
                {
                    echo '<script> alert("los datos registrados ya se encuentran registrados en el sistema por favor verifique") </script>'; 
                    echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>"; 
                }
                else
                {
                    // creamos el registro o la insercion de datos
                    $insertar = "INSERT INTO usuarios VALUES (:tipo,:id_usu,:nombres,
                    :apellidos,:correo_usu,:direccion,:genero,:fechan,:telefono,:usuario,:contrasena,
                    :estado,:rol)";
                    
                    // preparamos lo necesario para el registro
                    $resultado = $conexion->prepare($insertar);

                    // convertimos los argumentos en parametros
                    $resultado->bindParam(":tipo",$tipo_documento);
                    $resultado->bindParam(":id_usu",$id_usuario);
                    $resultado->bindParam(":nombres",$Nombres_Usu);
                    $resultado->bindParam(":apellidos",$apellidos_usu);
                    $resultado->bindParam(":correo_usu",$correo_usu);
                    $resultado->bindParam(":direccion",$direccion_usu);
                    $resultado->bindParam(":genero",$genero_usu);
                    $resultado->bindParam(":fechan",$fecha_naUsu);
                    $resultado->bindParam(":telefono",$telefono_usu);
                    $resultado->bindParam(":usuario",$correo_usu);
                    $resultado->bindParam(":contrasena",$claveMd);
                    $resultado->bindParam(":estado",$id_estado);
                    $resultado->bindParam(":rol",$id_rol);

                    if ($resultado->execute())
                    {
                        $insert = 'INSERT INTO proveedores VALUES 
                        (:id_pro,:nit,:empresa,:estado,:id_usuario)';

                        $result = $conexion->prepare($insert);

                        $result->bindParam(":id_pro",$id_proveedor);
                        $result->bindParam(":nit",$nit);
                        $result->bindParam(":empresa",$empresa);
                        $result->bindParam(":estado",$id_estado_pro);
                        $result->bindParam(":id_usuario",$id_usuario_pro);
                        $result->execute();

                        echo '<script> alert("Registro Exitoso") </script>'; 
                        echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>"; 
                    }
                    else
                    {
                        echo '<script> alert("Hubo un error por favor verificar") </script>'; 
                        echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>";         
                    }
                }
    }

    public function mostrarUsuarios()
    {
        $f = null;
        // creamos el objeto de conexion //
        $objconexion = new conexion;
        $conexion = $objconexion->get_conexion();
        // WHERE rol_usu='Cliente'
        $consultar= "SELECT usuarios.tipo_documento,usuarios.id_usuario,usuarios.nombres_usu,
        usuarios.apellidos_usu,usuarios.correo_usu,usuarios.direccion_usu,usuarios.genero_usu, 
        usuarios.fecha_naUsu,usuarios.telefono_usu,roles.nombre_rol 
        FROM usuarios 
        INNER JOIN roles 
        ON usuarios.id_rol = roles.id_rol 
        WHERE usuarios.id_estado = 1 AND roles.nombre_rol IN('Colaborador','Cliente','Proveedor')";
        $result = $conexion->prepare($consultar);
        $result->execute();

        while($resultado=$result->fetch())
        {
            $f[]=$resultado;
        }
        return $f;
    }

    public function mostrarRoles()
    {
        $f = null;
        // creamos el objeto de conexion //
        $objconexion = new conexion;
        $conexion = $objconexion->get_conexion();
        // WHERE rol_usu='Cliente'
        $consultar= "SELECT * FROM roles WHERE id_estado = 1 AND nombre_rol NOT LIKE 'Administrador'";
        $result = $conexion->prepare($consultar);
        $result->execute();

        while($resultado=$result->fetch())
        {
            $f[]=$resultado;
        }
        return $f;
    }

    public function buscarUsuario($id_usuario)
    {
        $f = null;
        // creamos el objeto de conexion //
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();
        $consulta= "SELECT usuarios.tipo_documento,usuarios.id_usuario,
        usuarios.nombres_usu,usuarios.apellidos_usu,usuarios.correo_usu,
        usuarios.direccion_usu,usuarios.genero_usu,usuarios.fecha_naUsu,
        usuarios.telefono_usu,usuarios.id_rol,
        IFNULL(colaboradores.fecha_igrCol, '') AS fecha_igrCol,
        IFNULL(colaboradores.eps_col, '') AS eps_col,
        IFNULL(colaboradores.arl_col, '') AS arl_col,
        IFNULL(colaboradores.nobre_contacto, '') AS nobre_contacto,
        IFNULL(colaboradores.tel_contacto, '') AS tel_contacto,
        IFNULL(proveedores.nit_proveedor, '') AS nit_proveedor,
        IFNULL(proveedores.nombre_emp, '') AS nombre_emp
        FROM usuarios
        INNER JOIN roles ON usuarios.id_rol = roles.id_rol
        LEFT JOIN colaboradores ON usuarios.id_usuario = colaboradores.id_colaborador
        LEFT JOIN proveedores ON usuarios.id_usuario = proveedores.id_proveedor
        WHERE usuarios.id_usuario = :id_col;";
        $result = $conexion->prepare($consulta);
        $result->bindParam(":id_col",$id_usuario);
        $result->execute();

        while($resultado = $result->fetch())
        {
            $f[] = $resultado;
        }
        return $f;
    } 

    public function actualizarColaborador($tipoDoc,$identificacion,$nombres,$apellidos,$email,$direccion,$telefono,$genero,$fechaNac,$fechaing,$epscol,$arlcol,$nombrecon,$telcontacto)
    {
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();

        $actualizar = "UPDATE usuarios,colaboradores SET usuarios.tipo_documento=:tipoDoc,
        usuarios.nombres_usu=:nombres,usuarios.apellidos_usu=:apellidos,usuarios.correo_usu=:email,
        usuarios.direccion_usu=:direccion,usuarios.telefono_usu=:telefono,usuarios.genero_usu=:genero,
        usuarios.fecha_nausu=:fechaNac,colaboradores.fecha_igrCol=:fechaing,colaboradores.eps_col=:eps,
        colaboradores.arl_col=:arl,colaboradores.nobre_contacto=:contacto,
        colaboradores.tel_contacto=:telcontacto WHERE colaboradores.id_usuario=:identificacion AND usuarios.id_usuario=:identificacion";
        $result = $conexion->prepare($actualizar);
        $result->bindParam(":identificacion",$identificacion);
        $result->bindParam(":tipoDoc",$tipoDoc);
        $result->bindParam(":nombres",$nombres);
        $result->bindParam(":apellidos",$apellidos);
        $result->bindParam(":email",$email);
        $result->bindParam(":direccion",$direccion);
        $result->bindParam(":telefono",$telefono);
        $result->bindParam(":genero",$genero);
        $result->bindParam(":fechaNac",$fechaNac);
        $result->bindParam(":fechaing",$fechaing);
        $result->bindParam(":eps",$epscol);
        $result->bindParam(":arl",$arlcol);
        $result->bindParam(":contacto",$nombrecon);
        $result->bindParam(':telcontacto',$telcontacto);
        $result->execute();

        echo '<script> alert("!se ha modificado la informacion¡") </script>'; 
        echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>"; 
    }

    public function actualizarCliente($tipoDoc,$identificacion,$nombres,$apellidos,$email,$direccion,$telefono,$genero,$fechaNac)
    {
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();

        $actualizar = "UPDATE usuarios SET usuarios.tipo_documento=:tipoDoc,
        usuarios.nombres_usu=:nombres,usuarios.apellidos_usu=:apellidos,usuarios.correo_usu=:email,
        usuarios.direccion_usu=:direccion,usuarios.telefono_usu=:telefono,usuarios.genero_usu=:genero,
        usuarios.fecha_nausu=:fechaNac WHERE usuarios.id_usuario=:identificacion AND usuarios.id_usuario=:identificacion";
        $result = $conexion->prepare($actualizar);
        $result->bindParam(":identificacion",$identificacion);
        $result->bindParam(":tipoDoc",$tipoDoc);
        $result->bindParam(":nombres",$nombres);
        $result->bindParam(":apellidos",$apellidos);
        $result->bindParam(":email",$email);
        $result->bindParam(":direccion",$direccion);
        $result->bindParam(":telefono",$telefono);
        $result->bindParam(":genero",$genero);
        $result->bindParam(":fechaNac",$fechaNac);
        $result->execute();

        echo '<script> alert("!se ha modificado la informacion¡") </script>'; 
        echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>"; 

    }

    public function actualizarProveedor($tipoDoc,$identificacion,$nombres,$apellidos,$email,$direccion,$telefono,$genero,$fechaNac,$nit,$empresa)
    {
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();

        $actualizar = "UPDATE usuarios,proveedores SET usuarios.tipo_documento=:tipoDoc,
        usuarios.nombres_usu=:nombres,usuarios.apellidos_usu=:apellidos,usuarios.correo_usu=:email,
        usuarios.direccion_usu=:direccion,usuarios.telefono_usu=:telefono,usuarios.genero_usu=:genero,
        usuarios.fecha_nausu=:fechaNac,proveedores.nit_proveedor=:nit,proveedores.nombre_emp=:empresa 
        WHERE usuarios.id_usuario=:identificacion";
        $result = $conexion->prepare($actualizar);
        $result->bindParam(":identificacion",$identificacion);
        $result->bindParam(":tipoDoc",$tipoDoc);
        $result->bindParam(":nombres",$nombres);
        $result->bindParam(":apellidos",$apellidos);
        $result->bindParam(":email",$email);
        $result->bindParam(":direccion",$direccion);
        $result->bindParam(":telefono",$telefono);
        $result->bindParam(":genero",$genero);
        $result->bindParam(":fechaNac",$fechaNac);
        $result->bindParam(":nit",$nit);
        $result->bindParam(":empresa",$empresa);
        $result->execute();

        echo '<script> alert("!se ha modificado la informacion¡") </script>'; 
        echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>"; 
    }
    
    public function eliminarUsuario($identificacion)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $eliminar = "UPDATE usuarios SET id_estado = 2 WHERE id_usuario = :identificacion";
        $resultado = $conexion->prepare($eliminar);
        $resultado->bindParam(":identificacion",$identificacion);
        $resultado->execute();        
        
        echo '<script> alert("!se ha Eliminado la informacion¡") </script>'; 
        echo "<script> location.href='../../Vista/administrador/usuarios.php'</script>"; 
    }

    public function informacionAdministrador($id)
    {
        $f = null;
        $objconexion = new conexion;
        $conexion = $objconexion->get_conexion();
        $query = "SELECT * FROM usuarios WHERE id_usuario = :identificacion";
        $result = $conexion->prepare($query);
        $result->bindParam(":identificacion",$id);
        $result->execute();

        while ($resultado=$result->fetch())
        {
            $f[]=$resultado;
        }
        return $f;
    }

    public function actualizarAdministrador($tipo_documento,$nombre_usu,$apellido_usu,$correo_usu,$direccion_usu,$genero_usu,$fecha_naUsu,$telefono_usu,$id_usuario)
    {
        $objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();

        $actualizar = "UPDATE usuarios SET usuarios.tipo_documento=:tipo_documento,
        usuarios.nombres_usu=:nombre_usu,
        usuarios.apellidos_usu=:apellido_usu,
        usuarios.correo_usu=:correo_usu,
        usuarios.direccion_usu=:direccion_usu,
        usuarios.genero_usu=:genero_usu,
        usuarios.fecha_naUsu=:fecha_naUsu,
        usuarios.telefono_usu=:telefono_usu WHERE usuarios.id_usuario=:id_usuario";

        $result = $conexion->prepare($actualizar);
        $result->bindParam("tipo_documento",$tipo_documento);
        $result->bindParam("nombre_usu",$nombre_usu);
        $result->bindParam("apellido_usu",$apellido_usu);
        $result->bindParam("correo_usu",$correo_usu);
        $result->bindParam("direccion_usu",$direccion_usu);
        $result->bindParam("genero_usu",$genero_usu);
        $result->bindParam("fecha_naUsu",$fecha_naUsu);
        $result->bindParam("telefono_usu",$telefono_usu);
        $result->bindParam("id_usuario",$id_usuario);
        $result->execute();

        echo '<script> alert("!se ha modificado la informacion¡")</script>'; 
        echo "<script> location.href='../../Vista/administrador/inicio.php'</script>"; 
    }
}

?>