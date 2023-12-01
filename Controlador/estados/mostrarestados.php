<?php
    function mostrarestado()
    {
        $objestado = new estados();
        $result = $objestado->mostrarestados();

        if(!isset($result))
        {
            echo'<h4>No hay usuarios registrados en el sistema.</h4>';
        }
        else
        {
            foreach($result as $f)
            {    
                echo '
                <tbody>
                <tr>
                    <td>'.$f['id_estado'].'</td>
                    <td>'.$f['nombre_estado'].'</td>
                    <td><a href="../../Vista/administrador/modificarEstado.php?id_estado='.$f['id_estado'].'" class="btn btn-success">Ver/Editar</a></td>
                    <td><a href="../../Controlador/estados/eliminarestado.php?id_estado='.$f['id_estado'].'" class="btn btn-danger">Eliminar</a></td>
                </tr>
                </tbody>
                ';
            }
        }
    }

    function InformacionEstado()
    {
        $id_estado = $_GET['id_estado'];
        $objestado = new estados();
        $resultado = $objestado->buscarEstado($id_estado);

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
                    <link rel="stylesheet" href="../../Vista/css/estados.css">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                    <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
                </head>
                <body>
                    <div class="infoestados">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Modificar Estado
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form class="registroInfoEstado" method="POST" action="../../Controlador/estados/modificarestado.php">
                                            <h1>Estados</h1>
                                            <p class="subtexto">Recuerde que para poder realizar una actualizacion exitosa debera de completar todos los campos.</p>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-lg-12">
                                                    <label>Numero de Estado</label>      
                                                    <input type="number" class="form-control" readonly value="'.$f['id_estado'].'" name="id_estado">         
                                                </div>   
                                                <div class="form-group col-md-12 col-lg-12">
                                                    <label>Nombre de Estado</label>      
                                                    <input type="text" class="form-control" required value="'.$f['nombre_estado'].'" name="nombre_est">         
                                                </div>
                                                <button type="submit" class="btn btnregistrar">Modificar</button>    
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <script src="../javascript/tablas.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
                </body>
                </html>
            ';
        }
    }
    

?>