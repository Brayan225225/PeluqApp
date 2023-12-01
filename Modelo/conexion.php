<?php
class conexion
{
    public function get_conexion()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db_name = "peluqapp";

        // utilizamos para captar errores dentro de la base de datos
        try
        {
            // utlizamos PDO para realizar la conexion a la base de datos
            $conexion = new PDO("mysql:host=" .$host. ";dbname=".$db_name, $user, $pass);
            // definimos codificacion de conexion
            $conexion->exec("SET CHARACTER set utf8mb4");
            $conexion->exec("SET NAMES utf8mb4");
            // se permite capturar errores de PDO
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // RETORNAMOS LA CONEXION 
            return $conexion;
        }
        catch(PDOException $e)
        {
            // capturamos el error por si se produce
            die("Error al conectar con base de datos: " .$e->getMessage());
        }
    }
}
?>