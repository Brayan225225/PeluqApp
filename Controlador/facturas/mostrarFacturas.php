<?php

    function mostrarClientes()
    {
        $objfacturas = new facturas();
        $resultado = $objfacturas->mostrarClientes();

        foreach ($resultado as $f) 
        {
            echo'
                <option value="'.$f['id_usuario'].'">'.$f['nombres_usu']. ' ' .$f['apellidos_usu'].'</option>
            ';
        }
    }

    function mostrarProveedores()
    {
        $objfacturas = new facturas();
        $resultado = $objfacturas->mostrarProveedores();

        foreach ($resultado as $f) 
        {
            echo'
                <option value="'.$f['id_usuario'].'">'.$f['nombres_usu']. ' ' .$f['apellidos_usu'].'</option>
            ';
        }
    }

    function mostrarProductos()
    {
        $objfacturas = new facturas();
        $resultado = $objfacturas->mostrarProductos();

        foreach ($resultado as $f) 
        {
            echo'
                <option value="'.$f['id_productos'].'">'.$f['nombre_pro'].'</option>
            ';
        }
    }

    function mostrarServicios()
    {
        $objfacturas = new facturas();
        $resutado = $objfacturas->mostrarServicios();

        foreach($resutado as $f)
        {
            echo'
                <option value="'.$f['id_servicio'].'">'.$f['Nombre_ser'].'</option>
            ';
        }
    }

    function mostrarFormasPago()
    {
        $objfacturas = new facturas();
        $resultado = $objfacturas->mostrarFormasPago();

        foreach($resultado as $f)
        {
            echo'
                <option value="'.$f['id_forma_p'].'">'.$f['nombre_forma_p'].'</option>
            ';
        }
    }

    function mostrarDetallesCompra()
    {
        $id_usuario = null;
        $id_usuario = $_SESSION['id_usu'];
        $objfacturas = new facturas();
        $resultado = $objfacturas->mostrarDetallesFacturaCompra($id_usuario);

        if(!isset($resultado))
        {
            echo'<center><h4>No hay Productos Registrados</h4></center>';
        }
        else 
        {
            foreach($resultado as $f)
            {
                echo'
                <tr>
                    <td>'.$f['nombre_pro'].'</td>
                    <td>'.$f['cantidad'].'</td>
                    <td>'.$f['precio_pro'].'</td>
                    <td><a href="../../Controlador/facturas/eliminarDetallleCompra.php?id_temporal='.$f['id_temporal'].'" class="btn btn-danger">Eliminar</a></td>
                </tr>
                ';
            }
        }        
    }

    function mostrarDetalleVenta()
    {
        $id_usuario = null;
        $id_usuario = $_SESSION['id_usu'];
        $objfacturas = new facturas();
        $resultado = $objfacturas->mostrarDetalleVenta($id_usuario);

        if(!isset($resultado))
        {
            echo'<center><h4>No hay Productos Registrados</h4></center>';
        }
        else 
        {
            foreach($resultado as $f)
            {
                if(!isset($f['id_servicio']) && !isset($f['id_producto']))
                {
                    echo'<center><h4>No hay Productos Registrados</h4></center>';
                }
                else if(!isset($f['id_producto']))
                {
                    echo'
                    <tr>
                        <td>'.$f['id_servicio'].'</td>
                        <td>'.$f['Nombre_ser'].'</td>
                        <td>'.$f['precio_ser'].'</td>
                        <td>'.$f['cantidad_ser'].'</td>
                        <td><a href="../../Controlador/facturas/eliminarDetalleVentaServicio.php?id_temporal='.$f['id_temporal'].'" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                    ';
                }
                else if(!isset($f['id_servicio']))
                {
                    echo'
                    <tr>
                        <td>'.$f['id_producto'].'</td>
                        <td>'.$f['nombre_pro'].'</td>
                        <td>'.$f['precio_pro'].'</td>
                        <td>'.$f['cantidad_pro'].'</td>
                        <td><a href="../../Controlador/facturas/eliminarDetalleVentaProducto.php?id_temporal='.$f['id_temporal'].'" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                    ';
                }
                else
                {
                    echo'
                    <tr>
                        <td>'.$f['id_producto'].'</td>
                        <td>'.$f['nombre_pro'].'</td>
                        <td>'.$f['precio_pro'].'</td>
                        <td>'.$f['cantidad_pro'].'</td>
                        <td><a href="../../Controlador/facturas/eliminarDetalleVentaProducto.php?id_temporal='.$f['id_temporal'].'" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                    <tr>
                        <td>'.$f['id_servicio'].'</td>
                        <td>'.$f['Nombre_ser'].'</td>
                        <td>'.$f['precio_ser'].'</td>
                        <td>'.$f['cantidad_ser'].'</td>
                        <td><a href="../../Controlador/facturas/eliminarDetalleVentaServicio.php?id_temporal='.$f['id_temporal'].'" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                    ';
                }
            }
        }
    }

    function mostrarComrpvantesCompra()
    {
        $objfacturas = new facturas();
        $resultado = $objfacturas->mostrarComrpvantesCompra();

        if(!isset($resultado))
        {
            echo'<center><h4>No hay Recibos de compra Registrados</h4></center>';
        }
        else 
        {
            foreach($resultado as $f)
            {
                echo'
                    <tr>
                        <td>'.$f['id_recibo_compra'].'</td>
                        <td>'.$f['fecha_rc'].'</td>
                        <td>'.$f['id_usuario'].'</td>
                        <td>'.$f['id_proveedor'].'</td>
                        <td>'.$f['nombre_forma_p'].'</td>
                        <td>'.$f['subtotal_rc'].'</td>
                        <td>'.$f['iva_rc'].'</td>
                        <td>'.$f['total_rc'].'</td>
                        <td><a href="../../Vista/Administrador/verReciboCompra.php?id_recibo_compra='.$f['id_recibo_compra'].'" class="btn btn-success">Ver</a></td>
                        <td><a href="../../Controlador/facturas/eliminarReciboCompra.php?id_recibo_compra='.$f['id_recibo_compra'].'" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                ';
            }
        }   
    }

    function DetallesFacturaCompra()
    {
        $identificacion = $_GET['id_recibo_compra'];
        $objfacturas = new facturas();
        $resultado = $objfacturas->DetallesFacturaCompra($identificacion);

        if(!isset($resultado))
        {
            echo'<center><h4>No hay Productos Registrados</h4></center>';
        }
        else 
        {
            foreach($resultado as $f)
            {
                echo'
                <tr>
                    <td>'.$f['nombre_pro'].'</td>
                    <td>'.$f['cantidad_pro_rc'].'</td>
                    <td>'.$f['precio_pro'].'</td>
                </tr>
                ';
            }
        }  
    }

    function verFacturaCompra()
    {
        $id_recibo = $_GET['id_recibo_compra'];
        $objfacturas = new facturas();
        $resultado = $objfacturas->verFacturaCompra($id_recibo);
    
        foreach($resultado as $f)
        {
            echo'
                <div class="infoestados">
                    <div class="accordion" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Recibo de Compra
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form class="registroInfoEstado">
                                        <h1>Recibo de Compra</h1>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Numero de Factura</label>
                                                <input disabled class="form-control" value="'.$f['id_recibo_compra'].'">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Fecha Factura de Factura</label>
                                                <input disabled class="form-control" value="'.$f['fecha_rc'].'">
                                            </div>  
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Usuario</label>
                                                <input disabled class="form-control" value="'.$f['nombres_usu'].'">
                                            </div>  
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Proveedor</label>
                                                <input disabled class="form-control" value="'.$f['nombre_emp'].'">
                                            </div>  
                                            <h1>Productos</h1>
                                        <div class="table-resposive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
                                                        DetallesFacturaCompra(); 
                                                    echo'
                                                </tbody>
                                            </table>
                                        </div>
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Forma de Pago</label>
                                                <input disabled class="form-control" value="'.$f['nombre_forma_p'].'">
                                            </div> 
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Subtotal</label>
                                                <input disabled class="form-control" value="'.$f['subtotal_rc'].'">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Iva</label>
                                                <input disabled class="form-control" value="'.$f['iva_rc'].'">
                                            </div> 
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Total</label>
                                                <input disabled class="form-control" value="'.$f['total_rc'].'">
                                            </div>
                                            <a style="margin-top: 1%; background-color: #c27dfc; color:#fff" href="../../Vista/administrador/vistarRecibosCompra.php" class="btn btnregistrar">Volver</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }

    function mostrarComrpvantesVenta()
    {
        $objfacturas = new facturas();
        $resultado = $objfacturas->mostrarComrpvantesVenta();

        if(!isset($resultado))
        {
            echo'<center><h4>No hay Recibos de Venta Registrados</h4></center>';
        }
        else 
        {
            foreach($resultado as $f)
            {
                echo'
                    <tr>
                        <td>'.$f['id_recibo_venta'].'</td>
                        <td>'.$f['fecha_rv'].'</td>
                        <td>'.$f['id_usuario'].'</td>
                        <td>'.$f['id_cliente'].'</td>
                        <td>'.$f['nombre_forma_p'].'</td>
                        <td>'.$f['subtotal_rv'].'</td>
                        <td>'.$f['iva_rv'].'</td>
                        <td>'.$f['total_rv'].'</td>
                        <td><a href="../../Vista/Administrador/verReciboVenta.php?id_recibo_venta='.$f['id_recibo_venta'].'" class="btn btn-success">Ver</a></td>
                        <td><a href="../../Controlador/facturas/eliminarReciboVenta.php?id_recibo_venta='.$f['id_recibo_venta'].'" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                ';
            }
        } 
    }

    function mostrarDetallesReciboVenta()
    {
        $id_factura = $_GET['id_recibo_venta'];
        $objfacturas = new facturas();
        $resultado = $objfacturas->mostrarDetallesReciboVenta($id_factura);

        if(!isset($resultado))
        {
            echo'<center><h4>No hay Productos Registrados</h4></center>';
        }
        else 
        {
            foreach($resultado as $f)
            {
                echo'
                    <tr>
                        <td>'.$f['nombre_pro'].'</td>
                        <td>'.$f['precio_pro'].'</td>
                        <td>'.$f['cantidad_pro_rv'].'</td>
                    </tr>
                    <tr>
                        <td>'.$f['Nombre_ser'].'</td>
                        <td>'.$f['precio_ser'].'</td>
                        <td>'.$f['cantidad_ser_rv'].'</td>
                    </tr>
                ';
            }
        }
    }

    function verFacturaVenta()
    {
        $id_recibo = $_GET['id_recibo_venta'];
        $objfacturas = new facturas();
        $resultado = $objfacturas->verFacturaVenta($id_recibo);
    
        foreach($resultado as $f)
        {
            $id_cliente = $f['id_cliente'];
            $objfacturas = new facturas();
            $resultado = $objfacturas->nombreCliente($id_cliente);
            
            foreach($resultado as $x)
            {
            echo'
                <div class="infoestados">
                    <div class="accordion" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Recibo de Venta
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form class="registroInfoEstado">
                                        <h1>Recibo de Compra</h1>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Numero de Factura</label>
                                                <input disabled class="form-control" value="'.$f['id_recibo_venta'].'">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Fecha Factura de Factura</label>
                                                <input disabled class="form-control" value="'.$f['fecha_rv'].'">
                                            </div>  
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Usuario</label>
                                                <input disabled class="form-control" value="'.$f['nombres_usu'].'">
                                            </div>  
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Cliente</label>
                                                <input disabled class="form-control" value="'.$x['nombres_usu'].'">
                                            </div>  
                                            <h1>Productos</h1>
                                        <div class="table-resposive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
                                                        mostrarDetallesReciboVenta(); 
                                                        echo'
                                                </tbody>
                                            </table>
                                        </div>
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Forma de Pago</label>
                                                <input disabled class="form-control" value="'.$f['nombre_forma_p'].'">
                                            </div> 
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Subtotal</label>
                                                <input disabled class="form-control" value="'.$f['subtotal_rv'].'">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Iva</label>
                                                <input disabled class="form-control" value="'.$f['iva_rv'].'">
                                            </div> 
                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Total</label>
                                                <input disabled class="form-control" value="'.$f['total_rv'].'">
                                            </div>
                                            <a style="margin-top: 1%; background-color: #c27dfc; color:#fff" href="../../Vista/Administrador/vistarRecibosVenta.php" class="btn btnregistrar">Volver</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
            }
        }
    }

?>