	<!-- Modal-edit -->
<div class="modal fade" id="editRowModal<?php echo $row['Id']; ?>"  aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
					Editar</span> 
					
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
		
				 
				<form  method="POST" action="../view/customers/obtener.php?Id=<?php echo $row['Id']; ?>">
							
				<input class="form-control" name="Id" type="hidden" value="<?php echo $row->Id; ?>">
					<div class="row">
						
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Apellidos</label>
						
						<input type="text" class="form-control" name="Apellido" value="<?php echo $row['Nombre']; ?>">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Nombres</label>
						
						<input type="text" class="form-control" name="Nombre" value="<?php echo $row['Apellido']; ?>">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Usuario</label>
						
						<input type="text" class="form-control" name="Usuario" value="<?php echo $row['Usuario']; ?>">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Correo</label>
						
						<input type="text" class="form-control" name="Correo" value="<?php echo $row['Correo']; ?>">
							</div>
						</div>
						
					</div>
					
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="editar" class="btn btn-primary">Edit
				
				</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                <center><h4 class="modal-title" id="myModalLabel"></h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de borrar el registro?</p>
				<h2 class="text-center"><?php echo $row['Nombre']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="../view/customers/BorrarRegistro.php?Id=<?php echo $row['Id']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
            </div>

        </div>
    </div>
</div>	
									
			<!-- Password-->	
<div class="modal fade" id="PassRowModal<?php echo $row['Id']; ?>"  aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
					Password</span> 
					
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
		
				 
				<form  method="POST" action="../view/customers/password.php?Id=<?php echo $row['Id']; ?>">
							
				<input class="form-control" name="Id" type="hidden" value="<?php echo $row->Id; ?>">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label>New Password</label>
						
						<input type="password" class="form-control" name="clave">
							</div>
						</div>
						
					</div>
					
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="editar" class="btn btn-primary">Edit
				
				</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>