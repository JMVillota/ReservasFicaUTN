<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO usuarios (Nombre, Apellido , Usuario, Cargo, Correo, Clave) 
		VALUES (:Nombre, :Apellido, :Usuario, :Cargo, :Correo,:Clave,:email)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':Nombre' => $_POST['Nombre'] , ':Apellido' => $_POST['Apellido'] , ':Usuario' => $_POST['Usuario'], ':Cargo' => $_POST['Cargo'], ':Correo' => $_POST['Correo'], ':Clave' => $_POST['Clave'] ))) ? 'Administrador guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: ../../folder/customers.php');
	
?>