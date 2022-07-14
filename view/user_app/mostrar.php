<?php
session_start();
if (!isset($_SESSION['Cargo_Id']) || $_SESSION['Cargo_Id'] != 2) {

	header('location: ../../login.php');
}
$id = $_SESSION['Id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Citas</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon" />
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">
</head>

<body>

	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<!-- <a href="../user/user.php" class="logo">
					<img src="../../assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a> -->
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">0</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 0 new notification</div>
								</li>
								<li>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../../assets/img/Avatar.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../../assets/img/Avatar.png" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo ucfirst($_SESSION['Nombre']); ?></h4>
												<p class="text-muted">Customers</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>

										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../../cerrarSesion.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../../assets/img/Avatar.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo ucfirst($_SESSION['Nombre']); ?>
									<span class="user-level">Customers</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>

									<li>
										<a href="../../cerrarSesion.php">
											<span class="link-collapse">Logout</span>
										</a>

									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item">

							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Home</p>
								<span class="caret"></span>
							</a>

						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>

						</li>
						<li class="nav-item active">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Citas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="mostrar.php">
											<span class="sub-item">Mostrar</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Citas</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="../view/admin/admin.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>


							<li class="nav-item">
								<a href="#">Mostrar</a>
							</li>
						</ul>
					</div>
					<div class="row">

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Mis citas</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover">
										<thead>
													<tr>
														<th>#</th>
														<th>Fecha Inicio</th>
														<th>Fecha Fin</th>
														<th>Evento</th>
														<th>Descripción</th>
														<th>Facultad</th>
														<th>Apellido Responsable</th>
														<th>Nombre Responsable</th>
														<th>Lugar Evento</th>
														<th style="width: 2%">Opciones</tr>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>#</th>
														<th>Fecha Inicio</th>
														<th>Fecha Fin</th>
														<th>Evento</th>
														<th>Descripción</th>
														<th>Facultad</th>
														<th>Apellido Responsable</th>
														<th>Nombre Responsable</th>
														<th>Lugar Evento</th>
														<th style="width: 2%">Opciones</th>
													</tr>
												</tfoot>


											<tbody>
												<?php

												if (isset($_SESSION['Id'])) {

													include "../config/conex.php";
													$database = new Connection();
													$db = $database->open();
													$sql = 'SELECT dr.*, d.nombre_departamento, le.nombre_lugar, e.nombre_evento FROM detalle_reservaciones dr INNER JOIN departamentos d ON dr.departamento_id = d.departamento_id INNER JOIN eventos e ON dr.tipo_evento_id = e.evento_id INNER JOIN lugar_eventos le ON dr.lugar_evento_id = le.lugar_evento_id';

													$query = mysqli_query($conex, $sql);
												?>

													<?php
													if (mysqli_num_rows($query) > 0) {
														foreach ($db->query($sql) as $row) {
															
													?>
													<tr>
															<td><?php echo $row['reservacion_id']; ?></td>
															<td><?php echo $row['fecha_inicio']; ?></td>
															<td><?php echo $row['fecha_fin']; ?></td>
															<td><?php echo $row['nombre_evento']; ?></td>
															<td><?php echo $row['descripcion_evento']; ?></td>
															<td><?php echo $row['nombre_departamento']; ?></td>
															<td><?php echo $row['apellidos_responsable']; ?></td>
															<td><?php echo $row['nombres_responsable']; ?></td>
															<td><?php echo $row['nombre_lugar']; ?></td>
															<td style="width: 1%">
																	<div class="form-button-action">
																		<button href="#editRowModal=<?php echo $va['reservacion_id']; ?>" class="btn btn-link btn-primary btn-lg" data-toggle="modal" title="" data-original-title="Edit Task" data-target="#editRowModal<?php echo $va['reservacion_id']; ?>">
																			<i class="fa fa-edit"></i>
																		</button>
																		<button href="#deleteRowModal=<?php echo $va['reservacion_id']; ?>" class="btn btn-link btn-danger btn-lg" data-toggle="modal" title="" data-original-title="Delete Task" data-target="#deleteRowModal<?php echo $va['reservacion_id']; ?>">
																			<i class="fa fa-trash"></i>
																		</button>
																	</div>
																</td>
													</tr>
														<?php
														}
													} else {
														?>
														<div class="message">
															<p class="alert alert-warning">No cuenta con ninguna cita</p>
														</div>
													<?php
													}
													?>
												<?php
												} else {
													header('location:mostrar.php');
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--   Core JS Files   -->

		<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
		<script src="../../assets/js/core/popper.min.js"></script>
		<script src="../../assets/js/core/bootstrap.min.js"></script>
		<!-- jQuery UI -->
		<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
		<!-- jQuery Scrollbar -->
		<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
		<!-- Datatables -->
		<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
		<!-- Atlantis JS -->
		<script src="../../assets/js/atlantis.min.js"></script>
		<!-- Atlantis DEMO methods, don't include it in your project! -->
		<script src="../../assets/js/setting-demo2.js"></script>
</body>
</html>