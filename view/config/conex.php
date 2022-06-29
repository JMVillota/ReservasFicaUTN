<?php
$hostname_conex = "bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com";
$database_conex = "bmfmhv5m3p9lyxmjs6du";
$username_conex = "uobaba3u7tzwepfv";
$password_conex = "VnpoDdEI73A3gZL3GaUd";
// creación de la conexión a la base de datos con mysql_connect()
$conex = mysqli_connect($hostname_conex, $username_conex, $password_conex, $database_conex) or 
die ("No se ha podido conectar al servidor de Base de datos"); 

?>
