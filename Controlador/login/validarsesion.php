<?php
//importamos dependencias 
require_once("../../modelo/conexion.php");
require_once("../../modelo/claselogin.php");

//capturamos en variables los valores enviados por el usuario a traves del metodo post
//igualamos la variable con el nombre del input dado en el formulario
$usuario_usu = $_POST['usuario'];
$contraseña_usu = md5($_POST['contraseña']);

//en la clase login debe haver una funcion la cual cumpla con validar la sesion en este
//caso la clase se llama claselogin y tiene la fguncion ValidarSesion
$objlogin = new claselogin();
//enviamos los datos o parametros esperados para la validacion 
$resultado = $objlogin ->ValidarSesion($usuario_usu,$contraseña_usu);

?>