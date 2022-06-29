<?php
function conectar(){
$conexion=null;
$host='bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com';
$db='bmfmhv5m3p9lyxmjs6du';
$user = "uobaba3u7tzwepfv";
$pass= "VnpoDdEI73A3gZL3GaUd";
try {
  $conexion= new PDO('mysql:host='.$host.';dbname='.$db, $user,$pass);


} catch (PDOException $e) {
  echo '<p> No se puede conectar a la base de datos </p>';
  exit;
}
return $conexion;


}

 ?>
