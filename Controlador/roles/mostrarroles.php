<?php

    function mostrarEstado()
    {
        $objrol = new rol();
        $resultado = $objrol->mostrarEstados();

        foreach($resultado as $f)
        {
            echo'
                <option value="'.$f['id_estado'].'">'.$f['nombre_estado'].'</option>
            ';
        }
    }
    
    function mostrarroles()
    {
        $objrol = new rol();
        $resultado = $objrol->mostrarroles();

        if(!isset($resultado))
        {
            echo'<h4>No hay usuarios registrados en el sistema.</h4>';
        }
        else
        {
            foreach($resultado as $f)
            {    
                echo '
                <tr>
                    <td>'.$f['id_rol'].'</td>
                    <td>'.$f['nombre_rol'].'</td>
                    <td><a href="../../Vista/administrador/modificarRol.php?id_rol='.$f['id_rol'].'" class="btn btn-success">Ver/Editar</a></td>
                    <td><a href="../../Controlador/roles/eliminarrol.php?id_rol='.$f['id_rol'].'" class="btn btn-danger">Eliminar</a></td>
                </tr>

                ';
            }
        }
    }

    function InformacionRol()
    {
        $id_rol = $_GET['id_rol'];
        $objrol = new rol();
        $resultado = $objrol->buscarRol($id_rol);

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
                <link rel="stylesheet" href="../css/roles.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
            </head>
                <body>
                <div class="inforoles">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Registrar Rol
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form class="registroInfoRoles" method="POST" action="../../Controlador/roles/modificarrol.php">
                                    <h1>Roles</h1>
                                    <p class="subtexto">Recuerde que para poder realizar un registro exitoso debera de completar todos los campos.</p>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-lg-12">
                                            <label>Numero de Rol</label>      
                                            <input type="number" readonly class="form-control" value="'.$f["id_rol"].'" name="id_rol">         
                                        </div>   
                                        <div class="form-group col-md-12 col-lg-12">
                                            <label>Nombre de Rol</label>      
                                            <input type="text" class="form-control" value="'.$f['nombre_rol'].'" name="nombre_rol">         
                                        </div>
                                        <div class="form-group col-md-12 col-lg-12">
                                            <label>Estado Rol</label>
                                            <select class="form-select" name="estado">
                                                <option value="1">Activo</option>
                                                <option value="2">Inactivo</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btnregistrar">Modificar</button>  
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
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