<?php

function mostrarProductos()
{
    $objbodegas = new bodegas();
    $resultado = $objbodegas->mostrarProductos();

    foreach($resultado as $f)
    {
        echo'
            <option value="'.$f['id_productos'].'">'.$f['nombre_pro'].'</option>
        ';
    }
}

function mostrarbodegas()
{
    $objbodegas = new bodegas();
    $resultado = $objbodegas->mostrarbodegas();
    
    if(!isset($resultado))
    {
        echo'<h4>No hay Productos ALmacenados en el momento.</h4>';
    }
    else
    {
        foreach($resultado as $f)
        {
            echo'
            <tbody>
            <tr>
                <td>'.$f['id_bodega'].'</td>
                <td>'.$f['nombre_pro'].'</td>
                <td>'.$f['stock_max'].'</td>
                <td>'.$f['stock_min'].'</td>
                <td>'.$f['cantidad_disponible'].'</td>
                <td>'.$f['ubicacion_pro'].'</td>
                <td><a href="../../Vista/administrador/modificarBodega.php?id_bodega='.$f['id_bodega'].'" class="btn btn-success">Ver/Editar</a></td>
                <td><a href="../../Controlador/bodegas/eliminarBodega.php?id_bodega='.$f['id_bodega'].'" class="btn btn-danger">Eliminar</a></td>
            </tr>
            </tbody>
            ';
        }
    }
}

function informacionBodega()
{
    $id_bodega = $_GET['id_bodega'];
    $objbodega = new bodegas();
    $resultado = $objbodega->buscarBodega($id_bodega);

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
                <?php
                    include("menu.php")
                ?>
            
                <div class="infoestados">
                    <div class="accordion" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Registrar Almacenamiento de Productos
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form class="registroInfoEstado" method="POST" action="../../Controlador/bodegas/modificarBodega.php">
                                        <h1>Almacenamiento de Productos</h1>
                                        <p class="subtexto">Recuerde que para poder realizar un registro exitoso deberá completar todos los campos.</p>
                                        <div class="row">                                
                                                <input readonly class="form-control" hidden value="'.$f['id_bodega'].'" name="id_bodega">
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Producto</label>                                  
                                                <input readonly class="form-control" required value="'.$f['nombre_pro'].'" name="cantidad_ing">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Cantidad Productos Ingreso</label>
                                                <input type="number" class="form-control" required value="'.$f['productos_ing'].'" name="cantidad_ing">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Cantidad Productos Salida</label>
                                                <input type="number" class="form-control" required value="'.$f['productos_sal'].'" name="cantidad_sal">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Stock Minimo</label>
                                                <input type="number" class="form-control" required value="'.$f['stock_min'].'" name="stock_min">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Stock Maximo</label>
                                                <input type="number" class="form-control" required value="'.$f['stock_max'].'" name="stock_max">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Ubicacion del Producto</label>
                                                <input type="text" class="form-control" required value="'.$f['ubicacion_pro'].'" name="ubicacion_pro">
                                            </div>
                                            <button type="submit" class="btn btnregistrar">Modificar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            
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