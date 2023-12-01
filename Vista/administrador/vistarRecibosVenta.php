<?php
    require_once("../../Modelo/conexion.php");
    require_once("../../Modelo/claseFacturas.php");
    require_once("../../Controlador/facturas/mostrarFacturas.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluq.App</title>
    <link rel="stylesheet" href="../css/estados.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logocabecera/SoloFlor.webp">
</head>
<body>
        <?php
            include("menu.php")
        ?>

    <div class="infoestados">
        <div class="accordion" id="accordionFlushExample">
            <section class="TablaInformacion">
                <div class="col-md-12">
                    <div class="card-head">
                        <h4>Recibos de Venta</h4>
                        <p class="subtexto">Por favor seleccione la accion que desea realizar</p>
                    </div>
                    <div class="card-body">
                        <div class="table-resposive">
                            <input type="text" id="searchInput" class="form-control" placeholder="Buscar">
                            <br>
                            <table id="dataTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id_Factura</th>
                                        <th>Fecha_Factura</th>
                                        <th>Usuario</th>
                                        <th>Cliente</th>
                                        <th>Forma de Pago</th>
                                        <th>Subotal</th>
                                        <th>Iva</th>
                                        <th>Total</th>
                                        <th>Ver</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        mostrarComrpvantesVenta();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

    <script src="../javascript/filtrar.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>