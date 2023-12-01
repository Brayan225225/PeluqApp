<?php
function mostrarUsuarios()
{
    $objusuarios = new usuarios();
    $resultado = $objusuarios->mostrarUsuarios();

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
                    <td>'.$f['tipo_documento'].'</td>
                    <td>'.$f['id_usuario'].'</td>
                    <td>'.$f['nombres_usu'].'</td>
                    <td>'.$f['apellidos_usu'].'</td>
                    <td>'.$f['correo_usu'].'</td>
                    <td>'.$f['direccion_usu'].'</td>
                    <td>'.$f['genero_usu'].'</td>
                    <td>'.$f['fecha_naUsu'].'</td>
                    <td>'.$f['telefono_usu'].'</td>
                    <td>'.$f['nombre_rol'].'</td>
                    <td><a href="../../Vista/administrador/modificarUsuario.php?id_usuario='.$f['id_usuario'].'" class="btn btn-success">Ver/Editar</a></td>
                    <td><a href="../../Controlador/usuarios/eliminarUsuario.php?id_usuario='.$f['id_usuario'].'" class="btn btn-danger">Eliminar</a></td>
                </tr>
            ';
        }
    }
}

function mostrarRoles()
{
    $objusuarios = new usuarios();
    $resultado = $objusuarios->mostrarRoles();

    if(!isset($resultado))
    {
        echo'<h4>No hay usuarios registrados en el sistema.</h4>';
    }
    else
    {
        foreach($resultado as $f)
        {    
            echo '
            <option value="'.$f['id_rol'].'">'.$f['nombre_rol'].'</option>                         
            ';
        }
    }
}

function informacionUsuario()
{
    $id_usuario = $_GET['id_usuario'];
    $objusuario = new usuarios();
    $resultado = $objusuario->buscarUsuario($id_usuario);

    foreach($resultado as $f)
    {
        if($f['id_rol'] == "1")
        {
                        echo'
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Peluq.App</title>
                <link rel="stylesheet" href="../css/usuarios.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
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
                                Actualizar Usuario
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form class="registroInfoUsuarios" method="POST" action="../../Controlador/usuarios/modificarColaborador.php">
                                        <h1>Actualizar Usuario</h1>
                                        <p class="subtexto">Recuerde que para poder realizar un registro exitoso debera de completar todos los campos.</p>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-4">        
                                                <label>Tipo de Documento</label>
                                                <select name="tipo_doc" id="" class="form-control">
                                                    <option>'.$f['tipo_documento'].'</option>
                                                    <option value="CC">CC</option>
                                                    <option value="TI">TI</option>
                                                    <option value="CE">CE</option>
                                                    <option value="Pasaporte">PASAPORTE</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Identificacion Usuario</label>      
                                                <input type="number" class="form-control" value="'.$f['id_usuario'].'" readonly required placeholder="123456789" name="identificacion">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Nombres</label>      
                                                <input type="text" class="form-control" required value="'.$f['nombres_usu'].'" name="nombres">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Apellidos</label>      
                                                <input type="text" class="form-control" required value="'.$f['apellidos_usu'].'" name="apellidos">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Correo</label>      
                                                <input type="email" class="form-control" required value="'.$f['correo_usu'].'" name="correo">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Direccion</label>      
                                                <input type="text" class="form-control" required value="'.$f['direccion_usu'].'" name="direccion">         
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label>Genero</label>
                                                <select name="genero" class="form-control">
                                                    <option>'.$f['genero_usu'].'</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Fecha de Nacimiento</label>      
                                                <input type="date" class="form-control" value="'.$f['fecha_naUsu'].'" required name="fecha">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>N° Telefono</label>      
                                                <input type="number" class="form-control" value="'.$f['telefono_usu'].'" required name="telefono">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Fecha de Ingreso</label>      
                                                <input type="date" class="form-control" value="'.$f['fecha_igrCol'].'" required name="fechaIng">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>EPS</label>      
                                                <input type="text" class="form-control" name="eps" value="'.$f['eps_col'].'" required>         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>ARL</label>      
                                                <input type="text" class="form-control" name="arl" value="'.$f['arl_col'].'" required>         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Nombre de Contacto</label>      
                                                <input type="text" class="form-control" name="nombrecon" value="'.$f['nobre_contacto'].'" required>         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>N° Telefono Contacto</label>      
                                                <input type="number" class="form-control" required name="telcon" value="'.$f['tel_contacto'].'" required>         
                                            </div>
            
                                            <button type="submit" class="btn btnregistrar">Actualizar</button>  
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
        
        else if($f['id_rol'] == "2")
        {
            echo'
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Peluq.App</title>
                <link rel="stylesheet" href="../css/usuarios.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
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
                                Actualizar Usuario
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form class="registroInfoUsuarios" method="POST" action="../../Controlador/usuarios/modificarCliente.php">
                                        <h1>Actualizar Usuario</h1>
                                        <p class="subtexto">Recuerde que para poder realizar un registro exitoso debera de completar todos los campos.</p>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-4">        
                                                <label>Tipo de Documento</label>
                                                <select name="tipo_doc" id="" class="form-control">
                                                    <option>'.$f['tipo_documento'].'</option>
                                                    <option value="CC">CC</option>
                                                    <option value="TI">TI</option>
                                                    <option value="CE">CE</option>
                                                    <option value="Pasaporte">PASAPORTE</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Identificacion Usuario</label>      
                                                <input type="number" class="form-control" value="'.$f['id_usuario'].'" readonly required placeholder="123456789" name="identificacion">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Nombres</label>      
                                                <input type="text" class="form-control" required value="'.$f['nombres_usu'].'" name="nombres">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Apellidos</label>      
                                                <input type="text" class="form-control" required value="'.$f['apellidos_usu'].'" name="apellidos">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Correo</label>      
                                                <input type="email" class="form-control" required value="'.$f['correo_usu'].'" name="correo">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Direccion</label>      
                                                <input type="text" class="form-control" required value="'.$f['direccion_usu'].'" name="direccion">         
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label>Genero</label>
                                                <select name="genero" class="form-control">
                                                    <option>'.$f['genero_usu'].'</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Fecha de Nacimiento</label>      
                                                <input type="date" class="form-control" value="'.$f['fecha_naUsu'].'" required name="fecha">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>N° Telefono</label>      
                                                <input type="number" class="form-control" value="'.$f['telefono_usu'].'" required name="telefono">         
                                            </div>
                                                        
                                            <button type="submit" class="btn btnregistrar">Actualizar</button>  
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
        else if($f['id_rol'] == "3")
        {
            echo'
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Peluq.App</title>
                <link rel="stylesheet" href="../css/usuarios.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
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
                                Actualizar Usuario
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form class="registroInfoUsuarios" method="POST" action="../../Controlador/usuarios/modificarProveedor.php">
                                        <h1>Actualizar Usuario</h1>
                                        <p class="subtexto">Recuerde que para poder realizar un registro exitoso debera de completar todos los campos.</p>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-4">        
                                                <label>Tipo de Documento</label>
                                                <select name="tipo_doc" id="" class="form-control">
                                                    <option>'.$f['tipo_documento'].'</option>
                                                    <option value="CC">CC</option>
                                                    <option value="TI">TI</option>
                                                    <option value="CE">CE</option>
                                                    <option value="Pasaporte">PASAPORTE</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Identificacion Usuario</label>      
                                                <input type="number" class="form-control" value="'.$f['id_usuario'].'" readonly required placeholder="123456789" name="identificacion">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Nombres</label>      
                                                <input type="text" class="form-control" required value="'.$f['nombres_usu'].'" name="nombres">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Apellidos</label>      
                                                <input type="text" class="form-control" required value="'.$f['apellidos_usu'].'" name="apellidos">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Correo</label>      
                                                <input type="email" class="form-control" required value="'.$f['correo_usu'].'" name="correo">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Direccion</label>      
                                                <input type="text" class="form-control" required value="'.$f['direccion_usu'].'" name="direccion">         
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label>Genero</label>
                                                <select name="genero" class="form-control">
                                                    <option>'.$f['genero_usu'].'</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Fecha de Nacimiento</label>      
                                                <input type="date" class="form-control" value="'.$f['fecha_naUsu'].'" required name="fecha">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>N° Telefono</label>      
                                                <input type="number" class="form-control" value="'.$f['telefono_usu'].'" required name="telefono">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>NIT Empresa</label>      
                                                <input type="number" class="form-control" value="'.$f['nit_proveedor'].'" required name="nit">         
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4">
                                                <label>Nombre Empresa</label>      
                                                <input type="text" class="form-control" value="'.$f['nombre_emp'].'" required name="empresa">         
                                            </div>
                                                        
                                            <button type="submit" class="btn btnregistrar">Actualizar</button>  
                                        </div>
                                    </form>
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
}

function informacionAdministrador($identificacion)
{
    $id = $identificacion;
    $objadministrador = new usuarios();
    $resultado = $objadministrador->informacionAdministrador($id);

    foreach ($resultado as $f) 
    {
        echo'
            <link href="../../Vista/css/perfil.css" rel="stylesheet">
            <div class="perfil">        
            <main id="main" class="main">
            <section class="section profile">
            <div class="row">
                <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
            
                        <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Datos Generales</button>
                        </li>
            
                        <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                        </li>            
                    </ul>
                    <div class="tab-content pt-2">
            
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
            
                        <h5 class="card-title">Perfil Administrador</h5>
            
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Documento</div>
                            <div class="col-lg-9 col-md-8">'.$f['tipo_documento'].'</div>
                        </div>
            
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Nombres</div>
                            <div class="col-lg-9 col-md-8">'.$f['nombres_usu'].'</div>
                        </div>
            
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Apellidos</div>
                            <div class="col-lg-9 col-md-8">'.$f['apellidos_usu'].'</div>
                        </div>
            
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Correo</div>
                            <div class="col-lg-9 col-md-8">'.$f['correo_usu'].'</div>
                        </div>
            
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Direccion</div>
                            <div class="col-lg-9 col-md-8">'.$f['direccion_usu'].'</div>
                        </div>
            
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Genero</div>
                            <div class="col-lg-9 col-md-8">'.$f['genero_usu'].'</div>
                        </div>
            
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Fecha de nacimiento</div>
                            <div class="col-lg-9 col-md-8">'.$f['fecha_naUsu'].'</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Telefono</div>
                            <div class="col-lg-9 col-md-8">'.$f['telefono_usu'].'</div>
                        </div>

                        </div>
            
                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
            
                        <!-- Profile Edit Form -->
                        <form method="POST" action="../../Controlador/usuarios/modificarAdministrador.php">
                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Documento</label>
                          <div class="col-md-8 col-lg-9">
                            <input readonly name="tipo_documento" type="text" class="form-control" id="" value="'.$f['tipo_documento'].'">
                          </div>
                        </div>
        
                        <div class="row mb-3">
                          <label for="company" class="col-md-4 col-lg-3 col-form-label">Nombres</label>
                          <div class="col-md-8 col-lg-9">
                            <input readonly name="id_usuario" type="text" class="form-control" id="" value="'.$f['id_usuario'].'">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="company" class="col-md-4 col-lg-3 col-form-label">Nombres</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="nombre_usu" type="text" class="form-control" id="" value="'.$f['nombres_usu'].'">
                          </div>
                        </div>
        
                        <div class="row mb-3">
                          <label for="Job" class="col-md-4 col-lg-3 col-form-label">Apellidos</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="apellido_usu" type="text" class="form-control" id="" value="'.$f['apellidos_usu'].'">
                          </div>
                        </div>
        
                        <div hidden class="row mb-3">
                          <label for="Country" class="col-md-4 col-lg-3 col-form-label">Correo</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="correo_usu" type="text" class="form-control" id="" value="'.$f['correo_usu'].'">
                          </div>
                        </div>
        
                        <div class="row mb-3">
                          <label for="Address" class="col-md-4 col-lg-3 col-form-label">Dirección</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="direccion_usu" type="text" class="form-control" id="" value="'.$f['direccion_usu'].'">
                          </div>
                        </div>
        
                        <div class="row mb-3">
                          <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Genero</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="genero_usu" type="text" class="form-control" id="" value="'.$f['genero_usu'].'">
                          </div>
                        </div>
        
                        <div class="row mb-3">
                          <label for="Email" class="col-md-4 col-lg-3 col-form-label">Fecha de nacimiento</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="fecha_naUsu" type="date" class="form-control" id="" value="'.$f['fecha_naUsu'].'">
                          </div>
                        </div>
        
                        <div class="row mb-3">
                          <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Telefono</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="telefono_usu" type="number" class="form-control" id="" value="'.$f['telefono_usu'].'">
                          </div>
                        </div>
                          <button type="submit" class="btn btn-primary">Modificar</button>
                      </form>
                      <!-- End Change Password Form -->
            
                        </div>
            
                    </div><!-- End Bordered Tabs -->
            
                    </div>
                </div>
            
                </div>
            </div>
            </section>
            
            </main>
        </div>';
    }
}
?>