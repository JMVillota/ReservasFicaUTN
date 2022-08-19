<?php require_once('assets/db/db-connect.php') ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario FICA</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="wp-content/themes/utndigital/assets/css/bootstrap.min0a4b.css">
    <link rel="stylesheet" href="/assets/fullcalendar/lib/main.css">
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/fullcalendar/lib/main.min.js"></script>
    <script src="/assets/fullcalendar/lib/locales-all.js"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }

        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar"></div>
            </div>
 
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Detalles de la Reservación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>

                            <dt class="text-muted">Inicio</dt>
                            <dd id="fecha_inicio" class=""></dd>

                            <dt class="text-muted">Fin</dt>
                            <dd id="fecha_fin" class=""></dd>

                            <dt class="text-muted">Tipo de Evento</dt>
                            <dd id="nombre_evento" class=""></dd>

                            <dt class="text-muted">Descripción</dt>
                            <dd id="descripcion_evento" class=""></dd>

                            <dt class="text-muted">Carrera</dt>
                            <dd id="nombre_departamento" class=""></dd>

                            <dt class="text-muted">Apellidos Responsable</dt>
                            <dd id="apellidos_responsable" class=""></dd>

                            <dt class="text-muted">Nombres Responsable</dt>
                            <dd id="nombres_responsable" class=""></dd>

                            <dt class="text-muted">Estado Reservación</dt>
                            <dd id="estado_reservacion"></dd>

                            <dt class="text-muted">Estado Evento</dt>
                            <dd id="estado_evento"></dd>

                            <dt class="text-muted">Lugar Evento</dt>
                            <dd id="nombre_lugar" class=""></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    <?php
    $schedules = $conn->query("SELECT dr.*, d.nombre_departamento, le.nombre_lugar, e.nombre_evento FROM detalle_reservaciones dr INNER JOIN departamentos d ON dr.departamento_id = d.departamento_id INNER JOIN eventos e ON dr.tipo_evento_id = e.evento_id INNER JOIN lugar_eventos le ON dr.lugar_evento_id = le.lugar_evento_id");
    $sched_res = [];
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        locale: 'es';
        $row['sdate'] = date("M d, Y h:i A", strtotime($row['fecha_inicio']));
        $row['edate'] = date("M d, Y h:i A", strtotime($row['fecha_fin']));
        if ($row['estado_reservacion'] == 1) {
            $row['estado_reservacion'] = 'Aceptado';
        } else {
            $row['estado_reservacion'] = 'Pendiente';
        }
        if ($row['estado_evento'] == 1) {
            $row['estado_evento'] = 'Realizado';
        } else {
            $row['estado_evento'] = 'No Realizado';
        }
        $sched_res[$row['reservacion_id']] = $row;
    }
    ?>
    <?php
    if (isset($conn)) $conn->close();
    ?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="/assets/js/script.js"></script>

</html>