<?php 
require_once('db-connect.php');
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script> alert('Error: No hay datos para guardar.'); location.replace('./') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if (empty($id)) {
    $sql = "INSERT INTO `citas` (`start_datetime`, `id_colaborador`, `id_cliente`, `observaciones`, `id_estado`) 
    VALUES ('$start_datetime','$id_colaborador','$id_cliente','$observaciones', 1)";
} else {
    $sql = "UPDATE `citas` SET `start_datetime` = '{$start_datetime}', `id_colaborador` = '{$id_colaborador}', `id_cliente` = '{$id_cliente}', `observaciones` = '{$observaciones}'
     WHERE `id` = '{$id}'";
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
