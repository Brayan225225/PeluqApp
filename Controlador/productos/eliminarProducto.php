<?php
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claseProductos.php");
    require_once("../../Controlador/productos/mostrarProductos.php");

    $identificacion = $_GET['id_productos'];

    $objproductos = new productos();
    $resultado = $objproductos->eliminarProducto($identificacion);

?>