<?php
require_once ("../../modelo/conexion.php");
require_once("../../Modelo/claseusuario.php");
require_once("../../Controlador/usuarios/mostrarUsuarios.php");

$tipo_documento = $_POST['tipo_documento'];
$id_usuario = $_POST['id_usuario'];
$nombre_usu = $_POST['nombre_usu'];
$apellido_usu = $_POST['apellido_usu'];
$correo_usu = $_POST['correo_usu'];
$direccion_usu = $_POST['direccion_usu'];
$genero_usu = $_POST['genero_usu'];
$fecha_naUsu = $_POST['fecha_naUsu'];
$telefono_usu = $_POST['telefono_usu'];

$objusuarios = new usuarios();
$resultado = $objusuarios->actualizarAdministrador($tipo_documento,$nombre_usu,$apellido_usu,$correo_usu,$direccion_usu,$genero_usu,$fecha_naUsu,$telefono_usu,$id_usuario);

?>