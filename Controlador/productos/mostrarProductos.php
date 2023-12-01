<?php

    function mostrarEmpresas()
    {
        $objproducto = new productos();
        $resultado = $objproducto->mostrarEmpresas();
        
        foreach($resultado as $f)
        {
            echo'
            <option value="'.$f['nombre_emp'].'">'.$f['nombre_emp'].'</option>
            ';
        }
    }

    function mostrarProveedores()
    {
        $objproducto = new productos();
        $resultado = $objproducto->mostrarProveedores();

        foreach($resultado as $f)
        {
            echo'
            <option value="'.$f['id_usuario'].'">'.$f['nombres_usu'].' '.$f['apellidos_usu'].'</option>
            ';
        }
    }

    function mostrarProductos()
    {
        $objproductos = new productos();
        $resultado = $objproductos->mostrarProductos();

        if(!isset($resultado))
        {
            echo'<h4>No hay Productos registrados en el sistema.</h4>';
        }
        else
        {
            foreach($resultado as $f)
            {    
                echo '
                <tbody>
                <tr>
                    <td>'.$f['id_productos'].'</td>
                    <td><img width="50" src="'.$f['foto_producto'].'"/></td>
                    <td>'.$f['nombre_pro'].'</td>
                    <td>'.$f['precio_pro'].'</td>
                    <td>'.$f['casa_pro'].'</td>
                    <td>'.$f['caracteristica_pro'].'</td>
                    <td>'.$f['ubicacion_pro'].'</td>
                    <td>'.$f['nombres_usu'].'</td>
                    <td><a href="../../Vista/administrador/modificarProduto.php?id_productos='.$f['id_productos'].'" class="btn btn-success">Ver/Editar</a></td>
                    <td><a href="../../Controlador/productos/eliminarProducto.php?id_productos='.$f['id_productos'].'" class="btn btn-danger">Eliminar</a></td>
                </tr>
                </tbody>
                ';
            }
        }
    }

    function informacionProducto()
    {
        $id_producto = $_GET['id_productos'];
        $objproducto = new productos();
        $resultado = $objproducto->mostrarProducto($id_producto);

        foreach($resultado as $f)
        {
            
            echo'
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Peluq.App</title>
                <link rel="stylesheet" href="../css/estados.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
            </head>
            <body>
                <div class="infoestados">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Modificar Producto
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form class="registroInfoEstado" method="POST" action="../../Controlador/productos/modificarProducto.php" enctype="multipart/form-data">
                                        <h1>Productos</h1>
                                        <p class="subtexto">Recuerde que para poder realizar un registro exitoso debera de completar todos los campos.</p>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Numero de Producto</label>  
                                                <input type="number" class="form-control" readonly value="'.$f['id_productos'].'" name="identificacion">         
                                            </div>   
                                            <div class="form-group col-lg-4 col-md-12">
                                                    <label>Foto de Producto</label>
                                                    <img src="'.$f['foto_producto'].'" style="display: none;"></img>
                                                    <input type="file" accept=".png, .jpg, .jpeg, .gif" class="form-control" name="fotoProducto">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Nombre de Producto</label>      
                                                <input type="text" class="form-control" value="'.$f['nombre_pro'].'" name="nombre">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Precio de Producto</label>      
                                                <input type="number" class="form-control" value="'.$f['precio_pro'].'" name="precio">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Casa de Producto</label> 
                                                <select name="casa" class="form-control">
                                                    <option values="'.$f['casa_pro'].'">'.$f['casa_pro'].'</option>';
                                                   mostrarEmpresas();
                                                   echo'                                                   
                                                </select>     
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Caracteristicas de Producto</label>      
                                                <input type="text" class="form-control" required value="'.$f['caracteristica_pro'].'" name="caracteristicas">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Ubicacion de Producto</label>      
                                                <input type="text" class="form-control" required value="'.$f['ubicacion_pro'].'" name="ubicacion">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Proveedor de Producto</label>  
                                                <select name="proveedor" class="form-control">
                                                    <option values="'.$f['id_proveedor'].'">'.$f['nombre_proveedor']. " " .$f['apellido_proveedor'].'</option>';
                                                    mostrarProveedores();
                                                    echo'                                          
                                                </select>    
                                            </div>
                                            <button type="submit" class="btn btnregistrar">Actualizar</button>  
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

                <script src="../javascript/filtrar.js"></script>
                <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
            </body>
            </html>
            ';
        }
    }
?>