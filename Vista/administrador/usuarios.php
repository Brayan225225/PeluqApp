<?php
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/claseusuario.php");
require_once("../../Controlador/usuarios/mostrarUsuarios.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluq.App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
    <link rel="stylesheet" href="../css/usuarios.css">
</head>
<body>

    <?php
        include("menu.php")
    ?>

    <div class="infousuarios">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Registrar Usuario
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form class="registroInfoUsuarios" method="POST" action="../../Controlador/usuarios/insertarUsuario.php">
                            <h1>Usuarios</h1>
                            <p class="subtexto">Recuerde que para poder realizar un registro exitoso debera de completar todos los campos.</p>
                            <div class="row">
                                <div class="form-group col-md-12 col-lg-4">        
                                    <label>Tipo de Documento</label>
                                    <select name="tipo_doc" id="" class="form-control">
                                        <option value="CC">CC</option>
                                        <option value="TI">TI</option>
                                        <option value="CE">CE</option>
                                        <option value="Pasaporte">PASAPORTE</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Identificacion Usuario</label>      
                                    <input type="number" class="form-control" required placeholder="123456789" name="identificacion">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Nombres</label>      
                                    <input type="text" class="form-control" required placeholder="Nombre" name="nombre">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Apellidos</label>      
                                    <input type="text" class="form-control" required placeholder="Apellidos" name="apellidos">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Correo</label>      
                                    <input type="email" class="form-control" required placeholder="Correo@correo.co" name="correo">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Direccion</label>      
                                    <input type="text" class="form-control" required placeholder="Direccion 80 # 06 A 70 Sur" name="direccion">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Genero</label>
                                    <select name="genero" id="" required class="form-control">
                                        <option>Seleccione una Opcion</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Fecha de Nacimiento</label>      
                                    <input type="date" class="form-control" required name="fecha">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>N° Telefono</label>      
                                    <input type="number" class="form-control" required placeholder="3005556666" name="Telefono">         
                                </div>
                                <div class="form-group col-md-12 col-lg-4">
                                    <label>Rol</label>
                                    <select name="rol" id="select" required class="form-control">
                                        <?php
                                            mostrarRoles();
                                        ?>
                                    </select>
                                </div>
                                <div id="inputcolaborador" style="display:none" class="row">
                                    <div class="form-group col-md-12 col-lg-4">
                                        <label>Fecha de Ingreso</label> 
                                        <input type="date" class="form-control inputcolaborador"  name="fechaIng">         
                                    </div>
                                    <div class="form-group col-md-12 col-lg-4">
                                        <label>EPS</label>      
                                        <input type="text" class="form-control inputcolaborador"  name="eps" placeholder="NUEVA EPS">         
                                    </div>
                                    <div class="form-group col-md-12 col-lg-4">
                                        <label>ARL</label>      
                                        <input type="text" class="form-control inputcolaborador"  name="arl" placeholder="COLPATRIA">         
                                    </div>
                                    <div class="form-group col-md-12 col-lg-4">
                                        <label>Nombre de Contacto</label>      
                                        <input type="text" class="form-control inputcolaborador"  name="nombrecon" placeholder="Nombre Contacto">         
                                    </div>
                                    <div class="form-group col-md-12 col-lg-4">
                                        <label>N° Telefono Contacto</label>      
                                        <input type="number" class="form-control inputcolaborador"  name="telcon" placeholder="30006665555">         
                                    </div>
                                </div>

                                <div id="inputproveedor" style="display:none" class="row">
                                    <div class="form-group col-md-12 col-lg-4">
                                        <label>NIT Empresa</label>      
                                        <input type="numbre" class="form-control inputproveedor"  name="nit">         
                                    </div>
                                    <div class="form-group col-md-12 col-lg-4">
                                        <label>Empresa</label>      
                                        <input type="text" class="form-control inputproveedor"  name="empresa">         
                                    </div>
                                </div>
                                <button type="submit" class="btn btnregistrar">registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    <section class="TablaInformacion">
        <div class="col-md-12">
            <div class="card-head">
                <h4>Usuarios</h4>
                <p class="subtexto">Por favor seleccione la accion que desea realizar</p>
            </div>
            <div class="card-body">
                <div class="table-resposive">
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar">
                    <br>
                    <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Doc</th>
                                <th>Identificacion</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Dirreccion</th>
                                <th>Genero</th>
                                <th>Fecha Nacimiento</th>
                                <th>Telefono</th>
                                <th>Rol</th>
                                <th>Ver/Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                mostrarUsuarios();
                            ?>
                        </tbody>
                </div>
            </div>
        </div>
    </section>
</div>
</main>

    <script src="../javascript/ocultar.js"></script>
    <script src="../javascript/filtrar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>