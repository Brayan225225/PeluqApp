<?php

    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claseestado.php");
    require_once("../estados/mostrarestados.php");

    $id_estado = $_POST['id_estado'];
    $nombre = $_POST['nombre_est'];

    $objestado = new estados();
    $resultado = $objestado->ModificarEstado($id_estado,$nombre);

?>