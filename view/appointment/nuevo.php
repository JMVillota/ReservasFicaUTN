<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		
		$stmt = $db->prepare("INSERT INTO detalle_reservaciones (fecha_inicio, fecha_fin,tipo_evento_id,descripcion_evento,departamento_id,apellido_responsable, nombre_responsable,estado_reservacion,estado_evento,lugar_evento_id) VALUES (:fecha_inicio, :fecha_fin, :tipo_evento_id, :descripcion_evento, :departamento_id,:apellido_responsable, :nombre_responsable, :1, :1, :lugar_evento_id )");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':fecha_inicio' => $_POST['fecha_inicio'] , ':fecha_fin' => $_POST['fecha_fin'] , ':tipo_evento_id' => $_POST['tipo_evento_id'], ':descripcion_evento' => $_POST['descripcion_evento'], ':departamento_id' => $_POST['departamento_id'], ':apellido_responsable' => $_POST['apellido_responsable'],':nombre_responsable' => $_POST['nombre_responsable'],':estado_reservacion' => $_POST[1],':estado_evento' => $_POST[1],':lugar_evento_id' => $_POST['lugar_evento_id'],)) ) ? 'Cita guardada correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
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

header('location: ../../folder/appointment.php');
	
?>