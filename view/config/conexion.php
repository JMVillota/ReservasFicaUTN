<?php
	
	$mysqli = new mysqli('bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com', 'uobaba3u7tzwepfv', 'VnpoDdEI73A3gZL3GaUd', 'bmfmhv5m3p9lyxmjs6du');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>