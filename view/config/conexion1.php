<?php
	$contrasena = 'VnpoDdEI73A3gZL3GaUd';
	$usuario = 'uobaba3u7tzwepfv';
	$nombrebd= 'bmfmhv5m3p9lyxmjs6du';

	try {
		$bd = new PDO(
			'mysql:host=bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com;
			dbname='.$nombrebd,
			$usuario,
			$contrasena,
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);
	} catch (Exception $e) {
		echo "Error de conexión ".$e->getMessage();
	}

?>
