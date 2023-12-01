<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluq.App</title>
    <link rel="stylesheet" href="../css/registrarse.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../img/LogoCabecera/SoloFlor.jpg">
</head>

<body>    
    <!-- Creamos un formulario el cual va a tener dentro de el el atributo 
    action donde endra la ubicacion de nuestro documneto php el cual realizara 
    la ejecucion esperada ya sea una insercion, cosunlta, 
    actualizacion y/o eliminar informacion -->
    <form class="registrarinfo" action="../../Controlador/usuarios/insertarUsuarioExt.php" method="POST">
            
        <img src="../img/logos/Sinfondo3.webp" alt="" class="logoformularioregistro">    
        <h1 class="tituloformulario">Formulario de registro</h1>    
        <p class="subtexto">Por favor completar todos los campos para que el regstro sea exitoso.</p>
        <div class="row">   
            <div class="form-group col-md-6 col-lg-4">        
                <label>Tipo de Documento</label>
                <select name="tipo_doc" id="" class="form-control">
                    <option>Seleccione una Opcion</option>
                    <option value="CC">CC</option>
                    <option value="TI">TI</option>
                    <option value="CE">CE</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-6 col-lg-4">
                <label>Numero de Documento</label>      
                <input type="number" class="form-control" required placeholder="123456789" name="id_usu">         
            </div>           
            <div class="form-group col-md-6 col-lg-4">           
                <label>Nombres</label>         
                <input type="text" class="form-control" required placeholder="Guillermo Andres" name="nombres">   
            </div>      
            <div class="form-group col-md-6 col-lg-4">          
                <label>Apellidos</label>
                <input type="text" class="form-control" required placeholder="Nova Forero" name="apellidos">
            </div>      
            <div class="form-group col-md-6 col-lg-4">          
                <label>Correo Electronico</label>
                <input type="email" class="form-control" required placeholder="gilenova@example.com" name="correo">
            </div>                    
            <div class="form-group col-md-6 col-lg-4">
                <label>Direccion</label>
                <input type="text" class="form-control" placeholder="Cra 87c # 5 A 90 Sur" name="direccion">
            </div>
            <div class="form-group col-md-6 col-lg-4">
                <label>Genero</label>
                <select name="genero" id="" required class="form-control">
                    <option>Seleccione una Opcion</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="form-group col-md-6 col-lg-4">
                <label>Fecha de Nacimiento</label>
                <input type="date" required class="form-control" name="fecha">
            </div>
            <div class="form-group col-md-6 col-lg-4">
                <label>Telefono</label>
                <input type="number" class="form-control" required placeholder="30055566666" name="telefono">
            </div>
            <div class="form-check col-md-6 col-lg-4 checkbox" style="margin-top: 35px;">
                <input class="form-check-input" type="checkbox" required id="flexCheckDefault">Acepta Terminos y Condiciones
            </div>
        </div>    
    </div>
    <div class="botones">
            <button type="submit" class="btnregistrar">Registrarse</button> 
        <button class="btnregistrar"><a class="button" href="../../index.html">Volver</a></button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="../js/funtions.js"></script>
</body>