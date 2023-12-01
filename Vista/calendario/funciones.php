<?php

function obtenerColaborador($conn) {
    $sql = "SELECT id_usuario,nombres_usu,apellidos_usu FROM usuarios WHERE id_rol = 1";
    $result = $conn->query($sql);
    $idcolaborador = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $colaborador= array('id_usuario' => $row['id_usuario'],
            'nombres_usu' => $row['nombres_usu'],
            'apellidos_usu' => $row['apellidos_usu']
        );
        $idcolaborador[$row["id_usuario"]] = $colaborador;
        }
    }

    return $idcolaborador;
}

$idcolaborador = obtenerColaborador($conn);

function obtenerCliente($conn) {
    $sql = "SELECT id_usuario,nombres_usu,apellidos_usu FROM usuarios WHERE id_rol = 2";
    $result = $conn->query($sql);
    $idcliente = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cliente = array('id_usuario' => $row['id_usuario'],
            'nombres_usu' => $row['nombres_usu'],
            'apellidos_usu' => $row['apellidos_usu']
        );

        $idcliente[$row["id_usuario"]] = $cliente;
        }
    }
    return $idcliente;

}

$idcliente = obtenerCliente($conn);


?>