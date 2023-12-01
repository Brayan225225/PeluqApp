<?php
//abrimo un documento php el cual nos va ayudar a transportar la informacion mediante variables

// para eso necesitamos traer o importamos las dependencias  necesarias
//en este caso traemos la conexion que es necesaria para todo
//y en su defecto la clase en la cual almacernmos la funcion a realizar
require_once ("../../modelo/conexion.php");
require_once ("../../modelo/claseusuario.php");

//capturamos los datos del formulario en variables atraves del metodo $_POST
//junto al nombre del campo asignado 
//igualamos el nombre de la variable al nombre del input del formulario
$tipo_documento = $_POST['tipo_doc'];
$id_usuario = $_POST['identificacion'];
$Nombres_Usu = $_POST ['nombre'];
$apellidos_usu = $_POST ['apellidos'];
$correo_usu = $_POST ['correo'];
$direccion_usu = $_POST['direccion'];
$genero_usu = $_POST ['genero'];
$fecha_naUsu = $_POST ['fecha'];
$telefono_usu = $_POST ['Telefono'];
$usuario_usu = $_POST['correo'];
$contraseña_usu = $_POST ['identificacion'];
$id_estado ="1";
$id_rol = $_POST['rol'];

//encriptamos la clave para darlse seguridad a dicha contraseña//
$claveMd = md5 ($contraseña_usu);

if($id_rol == "1")
{
    $id_colaborador = $_POST['identificacion'];
    $fecha_igrCol = $_POST['fechaIng'];
    $eps_col = $_POST['eps'];
    $arl_col = $_POST['arl'];
    $nombre_contacto = $_POST['nombrecon'];
    $tel_contacto = $_POST['telcon'];
    $id_estado_col = "1";
    $id_usuario_col =$_POST['identificacion'];
    
    $objusuarios = new usuarios();
    $resultado1 = $objusuarios->Insertarcolaborador($tipo_documento,$id_usuario,$Nombres_Usu,$apellidos_usu,$correo_usu,$direccion_usu,$genero_usu,$fecha_naUsu,$telefono_usu,$usuario_usu,$claveMd,$id_estado,$id_rol,$id_colaborador,$fecha_igrCol,$eps_col,$arl_col,$nombre_contacto,$tel_contacto,$id_estado_col,$id_usuario_col);
}

else if($id_rol == "2")
{
    $objusuarios = new usuarios();
    $resultado = $objusuarios->RegistrarUsuario($tipo_documento,$id_usuario,$Nombres_Usu,$apellidos_usu,$correo_usu,$direccion_usu,$genero_usu,$fecha_naUsu,$telefono_usu,$usuario_usu,$claveMd,$id_estado,$id_rol);
}
else if($id_rol == "3")
{   
    $id_proveedor = $_POST['identificacion'];
    $empresa = $_POST['empresa'];
    $nit = $_POST['nit'];
    $id_estado_pro = "1";
    $id_usuario_pro = $_POST['identificacion'];

    $objusuarios = new usuarios();
    $resultado = $objusuarios->insertarProveedor($tipo_documento,$id_usuario,$Nombres_Usu,$apellidos_usu,$correo_usu,$direccion_usu,$genero_usu,$fecha_naUsu,$telefono_usu,$usuario_usu,$claveMd,$id_estado,$id_rol,$id_proveedor,$empresa,$nit,$id_estado_pro,$id_usuario_pro);
}
?>