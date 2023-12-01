<?php
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claseProductos.php");
    require_once("../../Controlador/productos/mostrarProductos.php");
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
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Registrar Producto
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form class="registroInfoEstado" method="POST" action="../../Controlador/productos/insertarProducto.php" enctype="multipart/form-data">
                            <h1>Productos</h1>
                            <p class="subtexto">Recuerde que para poder realizar un registro exitoso debera de completar todos los campos.</p>
                            <div class="row">
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Numero de Producto</label>      
                                    <input disabled type="number" class="form-control" required placeholder="123456789" name="id_estado">         
                                </div>   
                                <div class="form-group col-lg-4 col-md-12">
                                        <label>Foto de Producto</label>
                                        <input type="file" accept=".png, .jpg, .jpeg, .gif" class="form-control" name="fotoProducto">
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Nombre de Producto</label>      
                                    <input type="text" class="form-control" placeholder="Producto" name="nombre">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Precio de Producto</label>      
                                    <input type="number" class="form-control" required placeholder="25000" name="precio">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Casa de Producto</label> 
                                    <select name="casa" id="" class="form-control" required>
                                        <?php
                                            mostrarEmpresas();
                                        ?>
                                    </select>     
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Caracteristicas de Producto</label>      
                                    <input type="text" class="form-control" required placeholder="Caracteristicas" name="caracteristicas">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Ubicacion de Producto</label>      
                                    <input type="text" class="form-control" required placeholder="Bodega" name="ubicacion">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Proveedor de Producto</label>  
                                    <select name="proveedor" id="" class="form-control">
                                        <?php
                                            mostrarProveedores();
                                        ?>
                                    </select>    
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
                <h4>Productos</h4>
                <p class="subtexto">Por favor seleccione la accion que desea realizar</p>
            </div>
            <div class="card-body">
                <div class="table-resposive">
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar">
                    <br>
                    <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id. Producto</th>
                                <th>Foto Producto</th>
                                <th>Nombre Producto</th>
                                <th>Precio Producto</th>
                                <th>Casa Comercial</th>
                                <th>Caracteristicas</th>
                                <th>Ubicacion</th>
                                <th>Proveedor</th>
                                <th>Ver/Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                mostrarProductos();
                            ?>
                        </tbody>
                </div>
            </div>
        </div>
    </section>
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