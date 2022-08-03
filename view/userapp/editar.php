<div class="modal fade" id="editRowModal<?php echo $va['reservacion_id']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="container-fluid">
					<div class="card-body">
						<form method="POST" autocomplete="off" enctype="multipart/form-data">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default">
									<label>Fecha Inicio</label>
									<input type="date" class="form-control" name="dates" value="<?php echo $va['fecha_inicio']; ?>">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group form-group-default">
									<label>Fecha Fin</label>
									<input type="date" class="form-control" name="dates" value="<?php echo $va['fecha_fin']; ?>">
									</div>
								</div>
								<!-- ----------------------------------------------->
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Tipo de Evento</label>
										<select class="form-control" id="EditarEvento" required name="tipo_evento_id">
										</select>
									</div>
								</div>
								<!-- ----------------------------------------------->
								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>Descripción Evento</label>
										<input name="descripcion_evento" type="text" class="form-control" required placeholder="Ingrese Descripción">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Carrera</label>
										<select class="form-control" id="Carreras" required name="departamento_id">
										</select>
									</div>
								</div>
								<!------------------------------------------------->
								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>Apellido Responsable</label>
										<input name="apellidos_responsable" type="text" class="form-control" required placeholder="Ingrese Apellido">
									</div>
								</div>
								<!-- ----------------------------------------------->
								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>Nombre Respombable</label>
										<input name="nombres_responsable" type="text" class="form-control" required placeholder="Ingrese Nombre">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Lugar Eventos</label>
										<select class="form-control" id="Lugares" required name="lugar_evento_id">
										</select>
									</div>
								</div>
							</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar
					</button>
					<button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


	<!-- Delete -->
	<div class="modal fade" id="deleteRowModal<?php echo $va['codcit']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</center>
				</div>
				<div class="modal-body">
					<p class="text-center">¿Esta seguro de borrar está reservación?</p>
					<h2 class="text-center"><?php echo $va['dates']; ?></h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<a href="../view/appointment/BorrarRegistro.php?codcit=<?php echo $va['codcit']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
				</div>

			</div>
		</div>
	</div>


	<!-- Delete -->
	<div class="modal fade" id="updateRowModal<?php echo $va['codcit']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</center>
				</div>
				<div class="modal-body">
					<p class="text-center">¿Esta seguro activar el estado?</p>
					<h2 class="text-center"><?php echo $va['estado']; ?></h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>

					<a href="../view/appointment/desactivar.php?codcit=<?php echo $va['codcit']; ?>" class="btn btn-success"><span class="fa fa-times"></span> Activar</a>
				</div>

			</div>
		</div>
	</div>