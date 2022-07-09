	<!-- Modal-edit -->
	<div class="modal fade" id="editRowModal<?php echo $row['Id']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Editar Usuario</span>

					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">


					<form method="POST" action="../view/usuarios/obtener.php?Id=<?php echo $row['Id']; ?>">

						<div class="row">

							<div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>Nombres</label>
									<input name="Nombre" value="<?php echo $row['Nombre']; ?>" type="text" class="form-control" required placeholder="Ingrese Nombres">
								</div>
							</div>

							<div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>Apellidos</label>
									<input name="Apellido" value="<?php echo $row['Apellido']; ?>" type="text" class="form-control" required placeholder="Ingrese Apellidos">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Usuario</label>
									<input name="Usuario" value="<?php echo $row['Usuario']; ?>" type="text" class="form-control" required placeholder="Ingrese usuario">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Correo</label>
									<input name="Correo" value="<?php echo $row['Correo']; ?>" type="text" class="form-control" required placeholder="Ingrese correo">
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="editar" class="btn btn-primary">Editar

					</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
				</form>
			</div>
		</div>
	</div>


	<!-- Delete -->
	<div class="modal fade" id="deleteRowModal<?php echo $row['Id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</center>
				</div>
				<div class="modal-body">
					<p class="text-center">¿Esta seguro de borrar al Usuario?</p>
					<h2 class="text-center"><?php echo $row['Nombre']; ?></h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<a href="../view/usuarios/BorrarRegistro.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
				</div>

			</div>
		</div>
	</div>

	<!-- Password-->
	<div class="modal fade" id="PassRowModal<?php echo $row['Id']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Clave</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="../view/usuarios/password.php?Id=<?php echo $row['Id']; ?>">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Nueva Clave</label>
									<input type="Clave" class="form-control" name="Clave">
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="editar" class="btn btn-primary">Cambiar Clave
					</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
				</form>
			</div>
		</div>
	</div>