<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$Id  = $_GET['Id'];
			$Nombre = $_POST['Nombre'];
			$Apellido = $_POST['Apellido'];
			$Usuario = $_POST['Usuario'];
			$Correo = $_POST['Correo'];
			
			$sql = "UPDATE usuarios SET Nombre = '$Nombre',Apellido = '$Apellido',Usuario = '$Usuario',Correo = '$Correo' WHERE Id = '$Id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Paciente actualizado correctamente' : 'No se puso actualizar el paciente';

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