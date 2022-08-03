<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id  = $_GET['reservaciones_id'];
			$fechaInicio = $_POST['fecha_inicio'];
			$fechaFin = $_POST['fecha_fin'];
			$tipoEvento = $_POST['tipo_evento_id'];
			$descripcionEvento = $_POST['descripcion_evento'];
			$departamento = $_POST['departamento_id'];
			$responsable = $_POST['apellido_responbsable'];
			$usuario = $_POST['nombre_responsable'];
			$password = $_POST['password'];
			$estado = $_POST['estado'];
			

			$sql = "UPDATE customers SET dnipa = '$dnipa',nombrep = '$nombrep',apellidop = '$apellidop',seguro = '$seguro',tele = '$tele',sexo = '$sexo' ,usuario = '$usuario',password = '$password',estado = '$estado' WHERE codpaci = '$codpaci'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Área actualizado correctamente' : 'No se puso actualizar el área';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: ../../folder/customers.php');

?>