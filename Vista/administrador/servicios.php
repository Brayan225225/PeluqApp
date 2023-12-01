<?php
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claseServicios.php");
    require_once("../../Controlador/servicios/mostrarServicios.php");
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
                    Registrar Servicio
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form class="registroInfoEstado" method="POST" action="../../Controlador/servicios/insertarServicio.php">
                            <h1>Servicios</h1>
                            <p class="subtexto">Recuerde que para poder realizar un registro exitoso debera de completar todos los campos.</p>
                            <div class="row">
                                <div class="form-group col-md-12 col-lg-6">
                                    <label>Numero de Servicio</label>      
                                    <input disabled type="number" class="form-control" placeholder="123456789" name="identificacion">         
                                </div>   
                                <div class="form-group col-md-12 col-lg-6">
                                    <label>Nombre de Servicio</label>      
                                    <input type="text" class="form-control" required placeholder="Nombre" name="nombre">         
                                </div>
                                <div class="form-group col-md-12 col-lg-6">
                                    <label>Precio de Servicio</label>      
                                    <input type="number" class="form-control" required placeholder="Precio" name="precio">         
                                </div>
                                <div class="form-group col-md-12 col-lg-6">
                                    <label>Estado</label>
                                    <select name="estado" class="form-select" id="">
                                        <?php
                                            mostrarEstados();
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
                <h4>Servicios</h4>
                <p class="subtexto">Por favor seleccione la accion que desea realizar</p>
            </div>
            <div class="card-body">
                <div class="table-resposive">
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar">
                    <br>
                    <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id. Servicio</th>
                                <th>Nombre Servicio</th>
                                <th>Precio Servicio</th>
                                <th>Estado</th>
                                <th>Ver/Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                mostrarServicios();
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