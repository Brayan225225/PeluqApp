<?php
require_once ("../../modelo/conexion.php");
require_once ("../../modelo/claseusuario.php");

$tipo_documento = $_POST['tipo_doc'];
$id_usuario = $_POST['id_usu'];
$Nombres_Usu = $_POST ['nombres'];
$apellidos_usu = $_POST ['apellidos'];
$correo_usu = $_POST ['correo'];
$direccion_usu = $_POST['direccion'];
$genero_usu = $_POST ['genero'];
$fecha_naUsu = $_POST ['fecha'];
$telefono_usu = $_POST ['telefono'];
$usuario_usu = $_POST['correo'];
$contraseña_usu = $_POST ['id_usu'];
$id_estado ="1";
$id_rol = "2";

$claveMd = md5($contraseña_usu);

$objusuarios = new usuarios();
$resultado = $objusuarios->RegistrarUsuarioExt($tipo_documento,$id_usuario,$Nombres_Usu,$apellidos_usu,$correo_usu,$direccion_usu,$genero_usu,$fecha_naUsu,$telefono_usu,$usuario_usu,$claveMd,$id_estado,$id_rol);

?>