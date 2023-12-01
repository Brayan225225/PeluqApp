<?php require_once('db-connect.php') ?> 
<?php require_once('funciones.php') ?> 
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUENTE WEB</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>    
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>

<body class="bg-light">

<?php
    include("../administrador/menu.php");
    ?>   
    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar"></div>
            </div>
            <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Crear Evento</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id_cita" value="">
                                <div class="form-group mb-2">
                                    <label for="" class="control-label">Colaboradores</label>
                                    <!-- <input type="especialidades_id" class="form-control form-control-sm rounded-0" name="especialidades_id" id="especialidades_id" required> -->
                                    <select class="form-control form-control-sm rounded-0" name="especialidades_id" id="especialidades_id">
                                            <option value=''>Seleccione colaborador</option>
                                            <?php
                                                foreach ($idcolaborador as $id_usuario => $nombres_usu) {
                                                    echo "<option value=\"$id_usuario\">$nombres_usu</option>";
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="control-label">Clientes</label>
                                    <!-- <input type="especialidades_id" class="form-control form-control-sm rounded-0" name="especialidades_id" id="especialidades_id" required> -->
                                    <select class="form-control form-control-sm rounded-0" name="id_usuario" id="id_usuario">
                                            <option value=''>Seleccione cliente</option>
                                            <?php
                                                foreach ($idcliente as $id_usuario => $nombres_usu) {
                                                    echo "<option value=\"$id_usuario\">$nombres_usu</option>";
                                                }
                                            ?>
                                    </select>
                                </div>
                                
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Fecha</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Observaciones</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="observaciones" id="observaciones" required></textarea>
                                </div>                  
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Detalles de evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Nombre</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Tipo de documento</dt>
                            <dd id="tipoDoc" class=""></dd>
                            <dt class="text-muted">Numero de documento</dt>
                            <dd id="identificacion" class=""></dd>
                            <dt class="text-muted">Nombres</dt>
                            <dd id="nombres" class=""></dd>
                            <dt class="text-muted">Apellidos</dt>
                            <dd id="apellidos" class=""></dd>
                            <dt class="text-muted">especialidad</dt>
                            <dd id="especialidades" class=""></dd>
                            <dt class="text-muted">sede</dt>
                            <dd id="sedes" class=""></dd>
                            <dt class="text-muted">jornada</dt>
                            <dd id="jornada" class=""></dd>
                            <dt class="text-muted">medico</dt>
                            <dd id="medicos" class=""></dd>
                            <dt class="text-muted">Descripción</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Inicio</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">Fin</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Editar</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Eliminar</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

<?php 
$schedules = $conn->query("SELECT * FROM `citas`");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $sched_res[$row['id_cita']] = $row;
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
</body>

<script src="./js/es.js"></script> <!--Idioma español Fullcalendar-->
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>

</html>