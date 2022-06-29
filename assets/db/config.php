<?php
session_start();

// Define database
define('dbhost', 'bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com');
define('dbuser', 'uobaba3u7tzwepfv');
define('dbpass', 'VnpoDdEI73A3gZL3GaUd');
define('dbname', 'bmfmhv5m3p9lyxmjs6du');

// Connecting database
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

?>
