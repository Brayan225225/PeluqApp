<?php
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claserol.php");
    require_once("../../Controlador/roles/mostrarroles.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluq.App</title>
    <link rel="stylesheet" href="../css/roles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
</head>
<body>
        <?php
            include("menu.php")
        ?>

    <div class="inforoles">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Registrar Rol
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form class="registroInfoRoles" method="POST" action="../../Controlador/roles/insertarrol.php">
                            <h1>Roles</h1>
                            <p class="subtexto">Recuerde que para poder realizar un registro exitoso debera de completar todos los campos.</p>
                            <div class="row">
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Numero de Rol</label>      
                                    <input disabled type="number" class="form-control" required placeholder="123456789" name="id_rol">         
                                </div>   
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Nombre de Rol</label>      
                                    <input type="text" class="form-control" required placeholder="Rol" name="nombre_rol">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Estado Rol</label>
                                    <select class="form-select" name="estado">
                                        <?php
                                            mostrarEstado();
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
                <h4>Roles</h4>
                <p class="subtexto">Por favor seleccione la accion que desea realizar</p>
            </div>
            <div class="card-body">
                <div class="table-resposive">
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar">
                    <br>
                    <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id. Rol</th>
                                <th>Nombre Rol</th>
                                <th>Ver/Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                mostrarroles();
                            ?>
                        </tbody>
                </div>
            </div>
        </div>
    </section>
</div>
</main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>