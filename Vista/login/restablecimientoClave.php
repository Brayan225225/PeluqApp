<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluq.App</title>
    <link rel="stylesheet" href="../css/restablecimientoCla.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
</head>

<body class="fondo">
    <form class="login"  method="POST" action="../../Controlador/login/reasignarClave.php">
        <img src="../img/logos/Sinfondo3.webp" alt="" class="logologin">    
        <h1 class="tituloformulario">Restablecimiento de Contraseña</h1>
        <br>
        <label for="">Numero de Documento</label>
        <input type="number" placeholder=" Documento" required name="id">
        <br>
        <label for="">Correo Registrado</label>
        <input type="email" placeholder=" Correo Electronico" required name="correo">
        <br>
        <div class="botones">
            <button type="submit" class="btnprimari">Enviar</button> 
            <button class="btnprimari"><a class="button" href="../login/ingresar.php">Volver</a></button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>