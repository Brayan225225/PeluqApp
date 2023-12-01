<?php
class facturas 
{
    public function mostrarClientes()
    {
        $f = null;
        
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM usuarios WHERE id_rol = 2";
        $resultado = $conexion->prepare($consultar);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function mostrarProveedores()
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM usuarios WHERE id_rol = 3";
        $resultado = $conexion->prepare($consultar);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function mostrarProductos()
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM productos WHERE id_estado = 1";
        $resultado = $conexion->prepare($consultar);
                
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function mostrarServicios()
    {
        $f = null; 

        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM servicios WHERE id_estado = 1";
        $resultado = $conexion->prepare($consultar);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function mostrarFormasPago()
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM formas_pago";
        
        $resultado = $conexion->prepare($consultar);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function PrecioProducto($id_productos)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT precio_pro FROM productos WHERE id_productos = :identificacion";       
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$id_productos);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function PrecioServicios($id_servicios)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar2 = "SELECT precio_ser FROM servicios WHERE id_servicio = :identificacion";
        $resultado = $conexion->prepare($consultar2); 
        $resultado->bindParam(":identificacion",$id_servicios);

        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function consultarProducto($id_temporal)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM tmp_detalle_rv WHERE id_temporal = :identificacion";       
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$id_temporal);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function DescuentoProductos($identificacion)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM tmp_detalle_rc  WHERE id_temporal = :identificacion";       
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$identificacion);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function DescuentoProductosServicios($identificacion)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM tmp_detalle_rv  WHERE id_temporal = :identificacion";       
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$identificacion);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function mostrarDetallesFacturaCompra($id_usuario)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM tmp_detalle_rc INNER JOIN productos ON id_producto = productos.id_productos WHERE id_usuario = :identificacion";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$id_usuario);

        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function mostrarDetalleVenta($id_usuario)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM tmp_detalle_rv 
        LEFT JOIN productos ON productos.id_productos = tmp_detalle_rv.id_producto
        LEFT JOIN servicios ON servicios.id_servicio = tmp_detalle_rv.id_servicio
        WHERE tmp_detalle_rv.id_usuario = :identificacion";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$id_usuario);

        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function detalleFacturaCompra($cantidadProductos,$precio,$id_productos,$usuario)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $insertar = "INSERT INTO tmp_detalle_rc VALUES(null,:cantidad,:precio,:id_producto,:usuario)";
        $resultado = $conexion->prepare($insertar);
        $resultado->bindParam(":cantidad",$cantidadProductos);
        $resultado->bindParam(":precio",$precio);
        $resultado->bindParam(":id_producto",$id_productos);
        $resultado->bindParam(":usuario",$usuario);
        $resultado->execute();

        echo "<script>alert('Producto registrado')</script>";
        echo "<script>location.href = '../../Vista/administrador/facturacion.php?select=1'</script>";
    }

    public function detalleFacturaVenta($cantidadProductos,$precioProductos,$id_productos,$cantidadServicios,$precioServicios,$id_servicios,$usuario)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $insertar = "INSERT INTO tmp_detalle_rv VALUES (null,:cantidad_pro,:precio_pro,:id_producto,:cantidad_ser,:precio_ser,:id_servicio,:usuario)";
        $resultado = $conexion->prepare($insertar);
        $resultado->bindParam(":cantidad_pro",$cantidadProductos);
        $resultado->bindParam(":precio_pro",$precioProductos);
        $resultado->bindParam(":id_producto",$id_productos);
        $resultado->bindParam(":cantidad_ser",$cantidadServicios);
        $resultado->bindParam(":precio_ser",$precioServicios);
        $resultado->bindParam(":id_servicio",$id_servicios);
        $resultado->bindParam(":usuario",$usuario);
        $resultado->execute();

        echo "<script>alert('Producto y Servicio registrado')</script>";
        echo "<script>location.href = '../../Vista/administrador/facturacion.php?select=2'</script>";
    }

    public function detalleFacturaVentaServicios($cantidadServicios,$precioServicios,$id_servicios,$usuario)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $insertar = "INSERT INTO tmp_detalle_rv VALUES (null,null,null,null,:cantidad_ser,:precio_ser,:id_servicio,:usuario)";
        $resultado = $conexion->prepare($insertar);
        $resultado->bindParam(":cantidad_ser",$cantidadServicios);
        $resultado->bindParam(":precio_ser",$precioServicios);
        $resultado->bindParam(":id_servicio",$id_servicios);
        $resultado->bindParam(":usuario",$usuario);
        $resultado->execute();

        echo "<script>alert('Servicio registrado')</script>";
        echo "<script>location.href = '../../Vista/administrador/facturacion.php?select=2'</script>";
    }

    public function detalleFacturaVentaProductos($cantidadProductos,$precioProductos,$id_productos,$usuario)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $insertar = "INSERT INTO tmp_detalle_rv VALUES (null,:cantidad_pro,:precio_pro,:id_producto,null,null,null,:usuario)";
        $resultado = $conexion->prepare($insertar);
        $resultado->bindParam(":cantidad_pro",$cantidadProductos);
        $resultado->bindParam(":precio_pro",$precioProductos);
        $resultado->bindParam(":id_producto",$id_productos);
        $resultado->bindParam(":usuario",$usuario);
        $resultado->execute();

        echo "<script>alert('Producto registrado')</script>";
        echo "<script>location.href = '../../Vista/administrador/facturacion.php?select=2'</script>";
    }

    public function eliminarDetalleCompra($identificacion)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $eliminar = "DELETE FROM tmp_detalle_rc  WHERE id_temporal = :identificacion";
        $resultado = $conexion->prepare($eliminar);
        $resultado->bindParam(":identificacion",$identificacion);
        $resultado->execute();

        echo "<script>alert('Producto Eliminado con exito')</script>";
        echo "<script>location.href = '../../Vista/administrador/facturacion.php?select=1'</script>";
    }

    public function eliminarDetalleVentaProducto($id_temporal)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM tmp_detalle_rv WHERE id_temporal = :identificacion";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$id_temporal);
        $resultado->execute();
        $f = $resultado->fetch();

        if($f)
        {
            if($f['cantidad_ser'] === null && $f['precio_ser'] === null && $f['id_servicio'] === null)
            {
                $actualizar = "UPDATE tmp_detalle_rv
                SET cantidad_pro = null, precio_pro = null, id_producto = null WHERE id_temporal = :identificacion";
                $resultado = $conexion->prepare($actualizar);
                $resultado->bindParam(":identificacion",$id_temporal);
                
                if($resultado->execute())
                {
                    $procedimiento = "CALL EliminarRegistrosNull()";
                    $resultado = $conexion->prepare($procedimiento);
                    $resultado->execute();
    
                    echo "<script>alert('Producto Eliminado con exito')</script>";
                    echo "<script>location.href = '../../Vista/administrador/facturacion.php?select=2'</script>";
                }
            }
            else
            {
                $actualizar = "UPDATE tmp_detalle_rv
                SET cantidad_pro = null, precio_pro = null, id_producto = null WHERE id_temporal = :identificacion";
                $resultado = $conexion->prepare($actualizar);
                $resultado->bindParam(":identificacion",$id_temporal);
                $resultado->execute();
    
                echo "<script>alert('Producto Eliminado con exito')</script>";
                echo "<script>location.href = '../../Vista/administrador/facturacion.php?select=2'</script>";
            }
        }
    }

    public function eliminarDetalleVentaServicio($id_temporal)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM tmp_detalle_rv WHERE id_temporal = :identificacion";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$id_temporal);
        $resultado->execute();
        $f = $resultado->fetch();

        if($f)
        {
            if($f['cantidad_pro'] === null && $f['precio_pro'] === null && $f['id_producto'] === null)
            {
                $actualizar = "UPDATE tmp_detalle_rv
                SET cantidad_ser = null, precio_ser = null, id_servicio = null WHERE id_temporal = :identificacion";
                $resultado = $conexion->prepare($actualizar);
                $resultado->bindParam(":identificacion",$id_temporal);
                
                if($resultado->execute())
                {
                    $procedimiento = "CALL EliminarRegistrosNull()";
                    $resultado = $conexion->prepare($procedimiento);
                    $resultado->execute();
    
                    echo "<script>alert('Servicio Eliminado con exito')</script>";
                    echo "<script>location.href = '../../Vista/administrador/facturacion.php?select=2'</script>";
                }
            }
            else
            {
                $actualizar = "UPDATE tmp_detalle_rv
                SET cantidad_ser = null, precio_ser = null, id_servicio = null WHERE id_temporal = :identificacion";
                $resultado = $conexion->prepare($actualizar);
                $resultado->bindParam(":identificacion",$id_temporal);
                $resultado->execute();
        
                echo "<script>alert('Servicio Eliminado con exito')</script>";
                echo "<script>location.href = '../../Vista/administrador/facturacion.php?select=2'</script>";
            }
        }
    }

    public function InsertarFacturaCompra($fecha,$subtotal,$iva,$total,$usuario,$proveedor,$formaPago,$estado)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();     
        $insertar = "INSERT INTO recibo_compra VALUES (NULL,:fecha,:subtotal,:iva,:total,:usuario,:proveedor,:formaPago,:estado)";
        $resultado = $conexion->prepare($insertar);
        $resultado->bindParam(":fecha",$fecha);
        $resultado->bindParam(":subtotal",$subtotal);
        $resultado->bindParam(":iva",$iva);
        $resultado->bindParam(":total",$total);
        $resultado->bindParam(":usuario",$usuario);
        $resultado->bindParam(":proveedor",$proveedor);
        $resultado->bindParam(":formaPago",$formaPago);
        $resultado->bindParam(":estado",$estado);

        if($subtotal == 0 || $iva == 0 || $total == 0)
        {
            echo "<script>alert('No se ha podido realizar el registro con exito')</script>";
            echo "<script>location.href = '../../Vista/administrador/facturacion.php'</script>";
        }
        else
        {
            if($resultado->execute())
            {
                $f = null;
                $consulta = "SELECT MAX(id_recibo_compra) FROM recibo_compra";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                $f = $resultado->fetch();
                
                if($f)
                {
                    $id_factura = ($f[0]);
                    $insertar = "CALL MoverDatos_rc (?,?)";
                    $resultado = $conexion->prepare($insertar);
                    $resultado->bindParam(1,$usuario);
                    $resultado->bindParam(2,$id_factura);
                    $resultado->execute();
    
                    echo "<script>alert('Factura Registrada con Exito')</script>";
                    echo "<script>location.href = '../../Vista/administrador/facturacion.php'</script>";
                }
                else
                {
                    echo "<script>alert('No se ha podido realizar el registro con exito')</script>";
                    echo "<script>location.href = '../../Vista/administrador/facturacion.php'</script>";
                }
            }
            else
            {
                echo "<script>alert('No se ha podido realizar el registro con exito')</script>";
                echo "<script>location.href = '../../Vista/administrador/facturacion.php'</script>";
            }
        }
    }

    public function InsertarFacturaVenta($fecha,$subtotal,$iva,$total,$usuario,$cliente,$formaPago,$estado)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $insertar = "INSERT INTO recibo_venta VALUES (NULL,:fecha,:subtotal,:iva,:total,:usuario,:cliente,:formaPago,:estado)";
        $resultado = $conexion->prepare($insertar);
        $resultado->bindParam(":fecha",$fecha);
        $resultado->bindParam(":subtotal",$subtotal);
        $resultado->bindParam(":iva",$iva);
        $resultado->bindParam(":total",$total);
        $resultado->bindParam(":usuario",$usuario);
        $resultado->bindParam(":cliente",$cliente);
        $resultado->bindParam(":formaPago",$formaPago);
        $resultado->bindParam(":estado",$estado);

        if($subtotal == 0 || $iva == 0 || $total == 0)
        {
            echo "<script>alert('No se ha podido realizar el registro con exito')</script>";
            echo "<script>location.href = '../../Vista/administrador/facturacion.php'</script>";
        }
        else
        {
            if($resultado->execute())
            {
                $f = null;
                $consulta = "SELECT MAX(id_recibo_venta) FROM recibo_venta";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                $f = $resultado->fetch();

                if($f)
                {
                    $id_factura = ($f[0]);
                    $insertar = "CALL MoverDatos_rv (?,?)";
                    $resultado = $conexion->prepare($insertar);
                    $resultado->bindParam(1,$usuario);
                    $resultado->bindParam(2,$id_factura);
                    $resultado->execute();
    
                    echo "<script>alert('Factura Registrada con Exito')</script>";
                    echo "<script>location.href = '../../Vista/administrador/facturacion.php'</script>";
                }
                else
                {
                    echo "<script>alert('No se ha podido realizar el registro con exito')</script>";
                    echo "<script>location.href = '../../Vista/administrador/facturacion.php'</script>";
                }
            }
            else
            {
                echo "<script>alert('No se ha podido realizar el registro con exito')</script>";
                echo "<script>location.href = '../../Vista/administrador/facturacion.php'</script>";
            }
        }
    }

    public function mostrarComrpvantesCompra()
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT recibo_compra.id_recibo_compra, recibo_compra.fecha_rc, usuarios.id_usuario, proveedores.id_proveedor,
        formas_pago.nombre_forma_p, recibo_compra.subtotal_rc, recibo_compra.iva_rc, recibo_compra.total_rc, recibo_compra.id_estado
        FROM recibo_compra 
        INNER JOIN usuarios ON usuarios.id_usuario = recibo_compra.id_uusario 
        INNER JOIN proveedores ON proveedores.id_proveedor = recibo_compra.id_proveedor 
        INNER JOIN formas_pago ON formas_pago.id_forma_p = recibo_compra.id_forma_p
        WHERE recibo_compra.id_estado = 1";
        $resultado = $conexion->prepare($consultar);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function DetallesFacturaCompra($identificacion)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM recibo_compra 
        INNER JOIN detalle_rc ON detalle_rc.id_recibo_compra = recibo_compra.id_recibo_compra
        INNER JOIN productos ON  detalle_rc.id_productos = productos.id_productos WHERE recibo_compra.id_recibo_compra = :identificacion";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$identificacion);

        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function verFacturaCompra($id_recibo)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM recibo_compra 
        INNER JOIN usuarios ON recibo_compra.id_uusario = usuarios.id_usuario 
        INNER JOIN proveedores ON recibo_compra.id_proveedor = proveedores.id_proveedor 
        INNER JOIN formas_pago ON recibo_compra.id_forma_p = formas_pago.id_forma_p 
        INNER JOIN detalle_rc ON detalle_rc.id_recibo_compra = recibo_compra.id_recibo_compra 
        INNER JOIN productos ON detalle_rc.id_productos = productos.id_productos 
        WHERE recibo_compra.id_estado = 1 AND recibo_compra.id_recibo_compra = :identificacion LIMIT 1";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$id_recibo);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function eliminarReciboCompra($id_factura)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $eliminar = "UPDATE recibo_compra SET id_estado = 2 WHERE id_recibo_compra = :identificacion";
        $resultado = $conexion->prepare($eliminar);
        $resultado->bindParam(":identificacion",$id_factura);
        $resultado->execute();

        echo "<script>alert('Recibo de compra eliminado con exito')</script>";
        echo "<script>location.href = '../../Vista/Administrador/vistarRecibosCompra.php'</script>";
    }

    public function mostrarComrpvantesVenta()
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM recibo_venta 
        INNER JOIN usuarios ON usuarios.id_usuario = recibo_venta.id_usuario 
        INNER JOIN clientes ON clientes.id_cliente = recibo_venta.id_cliente
        INNER JOIN formas_pago ON formas_pago.id_forma_p = recibo_venta.id_forma_p
        WHERE recibo_venta.id_estado = 1";
        $resultado = $conexion->prepare($consultar);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function nombreCliente($id_cliente)
    {
        $x = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT nombres_usu FROM usuarios WHERE id_usuario = :identificacion";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$id_cliente);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $x[] = $result;
            }
            return $x;
        }
    }

    public function verFacturaVenta($id_recibo)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM recibo_venta 
        INNER JOIN usuarios ON recibo_venta.id_usuario = usuarios.id_usuario 
        INNER JOIN clientes ON recibo_venta.id_cliente = clientes.id_cliente 
        INNER JOIN formas_pago ON recibo_venta.id_forma_p = formas_pago.id_forma_p 
        INNER JOIN detalle_rv ON detalle_rv.id_recibo_venta = recibo_venta.id_recibo_venta 
        INNER JOIN productos ON detalle_rv.id_productos = productos.id_productos 
        LEFT JOIN servicios ON detalle_rv.id_servicio = servicios.id_servicio
        WHERE recibo_venta.id_estado = 1 AND recibo_venta.id_recibo_venta = :identificacion";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$id_recibo);
        
        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function mostrarDetallesReciboVenta($id_factura)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT * FROM recibo_venta 
        INNER JOIN detalle_rv ON detalle_rv.id_recibo_venta = recibo_venta.id_recibo_venta
        LEFT JOIN productos ON  detalle_rv.id_productos = productos.id_productos 
        LEFT JOIN servicios ON detalle_rv.id_servicio = servicios.id_servicio WHERE recibo_venta.id_recibo_venta = :identificacion";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$id_factura);

        if($resultado->execute())
        {
            while($result = $resultado->fetch())
            {
                $f[] = $result;
            }
            return $f;
        }
    }

    public function eliminarReciboVenta($id_factura)
    {
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $eliminar = "UPDATE recibo_venta SET id_estado = 2 WHERE id_recibo_venta = :identificacion";
        $resultado = $conexion->prepare($eliminar);
        $resultado->bindParam(":identificacion",$id_factura);
        $resultado->execute();

        echo "<script>alert('Recibo de venta eliminado con exito')</script>";
        echo "<script>location.href = '../../Vista/Administrador/vistarRecibosVenta.php'</script>";
    }

    public function stockMaximo($usuario)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT tmp_detalle_rc.*, bodega.*, productos.nombre_pro 
        FROM bodega 
        INNER JOIN tmp_detalle_rc ON tmp_detalle_rc.id_producto = bodega.id_producto 
        INNER JOIN productos ON productos.id_productos = bodega.id_producto WHERE tmp_detalle_rc.id_usuario = :identificacion";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$usuario);
        $resultado->execute();
        
        while($x = $resultado->fetch())
        {
            $f[] = $x;
        }
        return $f;
    }

    public function stockMinimo($usuario)
    {
        $f = null;
        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $consultar = "SELECT tmp_detalle_rv.*, bodega.*, productos.nombre_pro 
        FROM bodega 
        INNER JOIN tmp_detalle_rv ON tmp_detalle_rv.id_producto = bodega.id_producto 
        INNER JOIN productos ON productos.id_productos = bodega.id_producto WHERE tmp_detalle_rv.id_usuario = :identificacion";
        $resultado = $conexion->prepare($consultar);
        $resultado->bindParam(":identificacion",$usuario);
        $resultado->execute();
        
        while($x = $resultado->fetch())
        {
            $f[] = $x;
        }
        return $f;
    }

}

?>