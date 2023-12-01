<?php

    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claserol.php");
    require_once("../roles/mostrarroles.php");

    $id_rol = $_POST['id_rol'];
    $nombre_rol = $_POST['nombre_rol'];
    $estado = $_POST['estado'];

    $objrol = new rol();
    $resultado = $objrol->ModificarRol($id_rol,$nombre_rol,$estado);

?>