<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluq.App</title>
    <link rel="stylesheet" href="../css/ingresar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
</head>

<body class="fondo">
    <form class="login" method="POST" action="../../Controlador/login/validarsesion.php">
        <img src="../img/logos/Sinfondo3.webp" alt="" class="logologin">    
        <h1 class="tituloformulario">Inicio de Sesion</h1>
        <br>
        <label for="">Nombre de Usuario</label>
        <input type="text" placeholder=" Usuario225" required name="usuario">
        <br>
        <label for="">Contraseña</label>
        <input type="password" placeholder=" **********" required name="contraseña">
        <a href="restablecimientoClave.php" class="Recuperacion">¿Olvido su Contraseña?</a>
        <div class="botones">
            <button type="submit" class="btnprimari">Ingresar</button> 
            <button class="btnprimari"><a class="button" href="../../index.html">Volver</a></button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>