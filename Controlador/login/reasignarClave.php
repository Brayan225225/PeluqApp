<?php
//importamos las dependencias  necesarias//
require_once ("../../Modelo/conexion.php");
require_once ("../../Modelo/claseResetClave.php");

//capturamos en variables los valores enviados desdev el formulario atravez del medio method y post y name de los campos//
//igualamos al nombre del input creado en el formulario
$identificacion = $_POST ['id'];
$email = $_POST['correo'];

//creamos el objeto a partir de la clase validar sesion
$objclave = new resetClave();
//enviamos los datos que se espera dentro de el
$resultado = $objclave->claseResetClave($identificacion,$email);

?>