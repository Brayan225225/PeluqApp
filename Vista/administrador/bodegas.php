<?php
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/clasebodegas.php");
    require_once("../../Controlador/bodegas/mostrarbodegas.php");
?>

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
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form class="registroInfoEstado" method="POST" action="../../Controlador/bodegas/Insertarbodega.php">
                            <h1>Almacenamiento de Productos</h1>
                            <p class="subtexto">Recuerde que para poder realizar un registro exitoso deberá completar todos los campos.</p>
                            <div class="row">
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Producto</label>                                  
                                    <select class="form-select" name="id_producto" >
                                        <?php
                                            mostrarProductos();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Cantidad Productos Ingreso</label>
                                    <input type="number" class="form-control" required placeholder="0" name="cantidad_ing">
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Cantidad Productos Salida</label>
                                    <input type="number" class="form-control" required placeholder="0" name="cantidad_sal">
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Stock Minimo</label>
                                    <input type="number" class="form-control" required placeholder="0" name="stock_min">
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Stock Maximo</label>
                                    <input type="number" class="form-control" required placeholder="0" name="stock_max">
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Ubicacion del Producto</label>
                                    <input type="text" class="form-control" required placeholder="vitrina" name="ubicacion_pro">
                                </div>
                                <button type="submit" class="btn btnregistrar">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section class="TablaInformacion">
            <div class="col-md-12">
                <div class="card-head">
                    <h4>Almacenamiento de Productos</h4>
                    <p class="subtexto">Por favor seleccione la accion que desea realizar</p>
                </div>
                <div class="card-body">
                    <div class="table-resposive">
                        <input type="text" id="searchInput" class="form-control" placeholder="Buscar">
                        <br>
                        <table id="dataTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>identificacion</th>
                                    <th>Producto</th>
                                    <th>Stock Maximo</th>
                                    <th>Stock Minimo</th>
                                    <th>Cantidad Disponible</th>
                                    <th>Ubicacion</th>
                                    <th>Ver/Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    mostrarbodegas();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="../javascript/filtrar.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>