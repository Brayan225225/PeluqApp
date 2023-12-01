<?php
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claseestado.php");

    $nombre_estado = $_POST["nombre_est"];

    $objestado = new estados();
    $resultado = $objestado->InsertarEstado($nombre_estado);
?>