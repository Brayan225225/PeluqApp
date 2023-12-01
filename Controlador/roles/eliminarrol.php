<?php 
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claserol.php");

    $id_rol = $_GET['id_rol'];
    
    $objrol = new rol();
    $resultado = $objrol->eliminarRol($id_rol);
?>