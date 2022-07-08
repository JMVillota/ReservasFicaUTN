<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$Id  = $_GET['Id'];
			$nombre=$_POST['Nombre'];
			$apellido=$_POST['Apellido'];
			$usuario=$_POST['Usuario'];
			$correo=$_POST['Correo'];
			
			$sql = "UPDATE usuarios SET Nombre = '$nombre', Apellido = '$apellido',Usuario = '$usuario',Correo = '$correo' WHERE Id = '$Id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Usuarios actualizado correctamente' : 'No se puso actualizar el usuario';

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

	header('location: ../../folder/usuarios.php');

?>