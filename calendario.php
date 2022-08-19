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
    <link rel="stylesheet" href="assets/fullcalendar/lib/main.css">
    <link rel='stylesheet' id='style-css-css' href='wp-content/themes/utndigital/assets/css/style.min0a4b.css' media='all' />
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/fullcalendar/lib/main.min.js"></script>
    <script src="assets/fullcalendar/lib/locales-all.js"></script>

    <link rel='stylesheet' href='wp-includes/css/dist/block-library/style.minf049.css' />
    <link rel='stylesheet' href='wp-content/themes/utndigital/style8a54.css' />

    <link rel='stylesheet' id='owl-css-css' href='wp-content/themes/utndigital/assets/css/owl.carousel.min0a4b.css' />
    <link rel='stylesheet' id='owl-default-css' href='wp-content/themes/utndigital/assets/css/owl.theme.default.min0a4b.css' />
    <link rel='stylesheet' id='locomotive-css-css' href='wp-content/themes/utndigital/assets/css/locomotive-scroll0a4b.css' />
    <link rel='stylesheet' id='style-css-css' href='wp-content/themes/utndigital/assets/css/style.min0a4b.css' />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.html" />

    <link rel='shortlink' href='calendario.php' />
    <style>
        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 3px !important;
        }
    </style>
</head>
<div class="preloader">
    <div class="text-wrapper">
        <div class="text-animation">
            <div class="loader-font text page-name page-Contact"><span class="dot"></span> <span class="title-wrap"> <span class="title-span">Calendario</span> </span>
            </div>
        </div>
    </div>
</div>

<body id="js-scroll " class="page-template-default page page-id-59 o-scroll" data-scroll-container>

    <div class="main-logo">
        <a href="index.html">
            <img src="wp-content/themes/utndigital/assets/img/UTN.png" alt="Inicio" />
        </a>
    </div>
    <div class="main-menu">
        <div class="main-menu-icon">
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="main-menu-wrapper">
        <div class="main-menu-content">
            <div class="menu-menu-1-container">
                <ul id="primary-menu" class="menu">
                    <li id="menu-item-146" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7 current_page_item menu-item-146">
                        <a href="index.html" aria-current="page">Inicio<img class="image" src=wp-content/uploads/2022/04/inicio.png>
                        </a>
                    </li>
                    <li id="menu-item-193" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-193"><a href="calendario.php">Calendario<img class="image" src=wp-content/uploads/2022/04/calendario.png></a></li>
                    <li id="menu-item-671" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-671"><a href="index.html">Información<img class="image" src=wp-content/uploads/2022/03/contacto.png></a></li>
                    <li id="menu-item-147" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-147"><a href="login.php">Login<img class="image" src=wp-content/uploads/2022/03/consultas.png></a></li>
                </ul>
            </div>
            <div class="social-menu-wrapper">
                <div class="menu-social-menu-container">
                    <ul id="social-menu" class="menu">
                        <li id="menu-item-152" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-152"><a href="https://www.linkedin.com/school/universidad-t%C3%A9cnica-del-norte/">Linkedin</a>
                        </li>
                        <li id="menu-item-151" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-151"><a href="https://www.instagram.com/utn_ec/">Instagram</a></li>
                        <li id="menu-item-149" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-149"><a href="https://www.facebook.com/utnibarra.ec">Facebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="section about-parallax" data-scroll-section>
        <div class="container-wrapper container-width-4 vartical-padding-1 two-side-padding-mobile vartical-padding-top-mobile-3">
            <div class="container-fluid gx-0">
                <div class="row gx-0">
                    <div class="col-18 col-lg-18 gx-0">
                        <div class="column-holder svg-parent-left">
                            <div id="calendar"></div>
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
    <footer id="footer" class="site-footer b-white" data-scroll-section>
        <div class="container-wrapper footer-wrapper" data-scroll data-scroll-id="project-related-stick">
            <div class="container-fluid gx-0">
                <div class="row gx-0">
                    <div class="col-lg-6 col-md-5 col-sm-12 my-auto">
                        <div class="font-curtain footer-padding footer-delay">
                            <div class="focus heading12" data-before-content="FICA">
                                <div class="focus--mask" data-scroll style="color:#000000cc">
                                    <div class="focus--mask-inner">FICA</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 offset-xl-3 offset-md-2">
                        <div class="primary-menu" data-scroll>
                            <div class="primary-menu-container">
                                <ul id="primary-menu" class="menu">
                                    <li id="menu-item-625" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-625">
                                        <a href="index.html">Inicio</a>
                                    </li>
                                    <li id="menu-item-684" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-684">
                                        <a href="index.html">Información</a>
                                    </li>
                                    <li id="menu-item-672" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-672">
                                        <a href="login.php">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-email" data-scroll>
                            <div class="footer-email-container">
                                <ul id="footer-email" class="menu">
                                    <li id="menu-item-306" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-306">
                                        <a href="mailto:jmvillotat@utn.edu.ec">jmvillotat@utn.edu.ec</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="social-menu" data-scroll>
                            <div class="social-menu-container">
                                <ul id="social-menu-footer" class="menu">
                                        }
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-152">
                                        <a href="#">Linkedin</a>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-151">
                                        <a href="#">Instagram</a>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-149">
                                        <a href="#">Facebook</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <?php
    $schedules = $conn->query("SELECT dr.*, d.nombre_departamento, le.nombre_lugar, e.nombre_evento FROM detalle_reservaciones dr INNER JOIN departamentos d ON dr.departamento_id = d.departamento_id INNER JOIN eventos e ON dr.tipo_evento_id = e.evento_id INNER JOIN lugar_eventos le ON dr.lugar_evento_id = le.lugar_evento_id");
    $sched_res = [];
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        locale:
        'es';
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

    <!-- Js personalizado -->
    <script src='wp-content/themes/utndigital/assets/js/owl.carousel.min8a54.js' id='pulladigital-owl-carousel-js'></script>

    <script src='wp-content/themes/utndigital/assets/js/locomotive-scroll.min8a54.js?ver=1.0.0' id='locomotive-scroll-js'></script>
    <script src='wp-content/themes/utndigital/assets/js/swiper-bundle.min8a54.js?ver=1.0.0' id='swiper-js-js'></script>

    <script src='wp-content/themes/utndigital/assets/js/main8a54.js?ver=1.0.0' id='pulladigital-main-js'></script>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="assets/js/script.js"></script>

</html>