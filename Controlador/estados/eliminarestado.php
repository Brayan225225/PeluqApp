<?php 
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claseestado.php");

    $id_estado = $_GET['id_estado'];
    
    $objestados = new estados();
    $resultado = $objestados->eliminarEstado($id_estado);
?>