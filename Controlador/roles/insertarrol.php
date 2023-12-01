<?php
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claserol.php");

    $nombre_rol = $_POST["nombre_rol"];
    $estado_rol = $_POST["estado"];

    $objrol = new rol();
    $resultado = $objrol->InsertarRol($nombre_rol,$estado_rol);
?>