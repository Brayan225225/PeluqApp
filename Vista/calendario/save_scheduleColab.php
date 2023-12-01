<?php 
require_once('db-connect.php');
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script> alert('Error: No hay datos para guardar.'); location.replace('./') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

session_start();
$id_usuario = $_SESSION['id_usuario'];
if (empty($id_cita)) {
    $sql = "INSERT INTO `citas` (`start_datetime`, `id_colaborador`, `id_cliente`, `observaciones`, `id_estado`) 
    VALUES ('$id_usuario','$id_colaborador','$id_cliente',':observaciones','$apellidos','$especialidades','$sedes','$jornada','$medicos','$description','$start_datetime','$end_datetime')";
} else {
    $sql = "UPDATE `schedule_list` SET `title` = '{$title}', `tipoDoc` = '{$tipoDoc}', `identificacion` = '{$identificacion}', `nombres` = '{$nombres}', `apellidos` = '{$apellidos}', 
    `especialidades` = '{$especialidades}', `sedes` = '{$sedes}', `jornada` = '{$jornada}', `medicos` = '{$medicos}', `description` = '{$description}', 
    `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' WHERE `id` = '{$id}'";
}
$save = $conn->query($sql);
if ($save) {
    echo "<script> alert('Evento Guardado Correctamente.'); location.replace('./') </script>";
} else {
    echo "<pre>";
    echo "An Error occurred.<br>";
    echo "Error: " . $conn->error . "<br>";
    echo "SQL: " . $sql . "<br>";
    echo "</pre>";
}
$conn->close();
?>
