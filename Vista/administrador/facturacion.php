<?php
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claseFacturas.php");
    require_once("../../Controlador/facturas/mostrarFacturas.php");
    
    $fcha = date("Y-m-d");
    $option = "";
    if(!isset($_GET['select'])){
        $option = "<option value=''>Seleccione</option>
        <option value='Compra'>Factura Compra</option>
        <option value='Venta'>Factura Venta</option>";
    }
    else{
        if($_GET['select'] == 1){
            $option = "<option value=''>Seleccione</option>
            <option value='Compra' selected>Factura Compra</option>
            <option value='Venta'>Factura Venta</option>";
        }
        else{
            $option = "<option value=''>Seleccione</option>
            <option value='Compra'>Factura Compra</option>
            <option value='Venta' selected>Factura Venta</option>";
        }
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluq.App</title>
    <link rel="stylesheet" href="../css/facturas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
</head>
<body>
    <?php
        include("menu.php")
    ?>

    <div class="infoestados">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Registrar Factura
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse " data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <h1>Facturas</h1>
                            <p class="subtexto">Recuerde que para poder realizar un registro exitoso debera de completar todos los campos.</p>


                            <div id="inputFacturaCompra" style="display:none">
                                <form action="../../Controlador/facturas/detalleFacturaCompra.php" method="POST">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-lg-6">
                                            <label>Producto</label>
                                            <select name="idproducto" class="form-control inputFacturaCompra" required>
                                                <option>Seleccione</option>
                                                <?php
                                                    mostrarProductos();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 col-lg-6">
                                            <label>Cantidad</label> 
                                            <input type="number" class="form-control inputFacturaCompra" id="inputFacturaCompra" name="cantidadProductos" required>
                                        </div>
                                    <div class="table-resposive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    mostrarDetallesCompra();
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btnregistrar">Registrar Productos</button>
                                </form>
                            </div>
                        </div>


                        <div id="inputFacturaVenta" style="display:none">
                            <form action="../../Controlador/facturas/detalleFacturaVenta.php" method="POST">
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label>Producto</label>
                                        <select name="productos" id="inputFacturaVenta" class="form-control">
                                            <option value="NULL">Seleccione</option>
                                            <?php
                                                mostrarProductos();
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label>Cantidad</label> 
                                        <input type="number" class="form-control" id="inputFacturaVenta" name="cantidad_productos">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label>Servicio</label>
                                        <select name="servicios" id="inputFacturaVenta" class="form-control" >
                                            <option value="NULL">Seleccione</option>
                                            <?php
                                                mostrarServicios();
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label>Cantidad</label> 
                                        <input type="number" class="form-control" id="inputFacturaVenta" name="cantidad_servicios">
                                    </div>
                                    <div class="table-resposive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Producto/Servicio</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    mostrarDetalleVenta();
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btnregistrar">Registrar</button>  
                                </div>
                            </form>
                        </div>

                        <form class="registroInfoEstado" method="POST" action="../../Controlador/facturas/registrarFactura.php">
                            <div class="row">
                                <div class="form-group col-md-12 col-lg-3">
                                    <label>Fecha Factura</label>      
                                    <input type="datetime" class="form-control" required value="<?php echo $fcha;?>" readonly name="fecha">         
                                </div>    
                                <div class="form-group col-md-12 col-lg-3">
                                    <label>Usuario</label>  
                                    <input type="number" value="<?php echo $_SESSION['id_usu']?>" style="display:none" name="identificacionUsuario">    
                                    <input type="text" class="form-control" required value="<?php echo $_SESSION['nombres'] . ' ' . $_SESSION['apellidos']; ?>" disabled name="nombreUsuario">         
                                </div>
                                <div class="form-group col-md-12 col-lg-3">
                                    <label>Tipo de Factura</label>
                                    <select id="selectFactura" name="selectFactura" required class="form-control">
                                        <?php echo $option; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-lg-3">
                                    <label>Forma de Pago</label>     
                                    <select class="form-select" name="formaPago">
                                        <?php
                                            mostrarFormasPago();
                                        ?>
                                    </select>         
                                </div> 
                                <div id="inputFacturaCompraProveedor" style="display:none">
                                    <div class="form-group col-md-12 col-lg-3">
                                         <label>Proveedor</label>
                                        <select class="form-control" name="proveedor" required>
                                            <?php
                                                mostrarProveedores();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div id="inputFacturaVentaCliente" style="display:none">
                                    <div class="form-group col-md-12 col-lg-3">
                                        <label>Cliente</label>
                                        <select class="form-control" name="clientes" require>
                                            <?php
                                                mostrarClientes();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-lg-3">
                                    <label>Subtotal</label>   
                                    <input readonly type="number" class="form-control" required value="<?php echo $_SESSION['subtotal'] ?>" name="subtotal">         
                                </div>   
                                <div class="form-group col-md-12 col-lg-3">
                                    <label>Iva</label>      
                                    <input readonly type="number" class="form-control" required value="<?php echo $_SESSION['iva'] ?>" name="iva">         
                                </div>   
                                <div class="form-group col-md-12 col-lg-3">
                                    <label>Total</label>      
                                    <input readonly type="number" class="form-control" required value="<?php echo $_SESSION['total'] ?>" name="total">         
                                </div>
                                <button type="submit" class="btn btnregistrar">Registrar Factura</button>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../javascript/ocultar.js"></script>
    <script src="../javascript/tipoFactura.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>