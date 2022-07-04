<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">Nuevo Administrador</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="card-body">
						<form method="POST" autocomplete="off" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>Nombre</label>
										<input name="Nombre" type="text" class="form-control" required placeholder="Ingrese Nombre">
									</div>
								</div>
								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>Apeliido</label>
										<input name="Apellido" type="text" class="form-control" required placeholder="Ingrese Apellido">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Usuario</label>
										<input name="Usuario" type="text" class="form-control" required placeholder="Ingrese usuario">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Cargo</label>
										<select class="form-control" name="Cargo_Id">
											<option value="1">Administrador</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Correo</label>
										<input name="Correo" type="text" class="form-control" required placeholder="Ingrese correo">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Clave</label>
										<input name="Clave" type="password" class="form-control" required placeholder="Ingrese contraseña">
									</div>
								</div>
							</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- -->