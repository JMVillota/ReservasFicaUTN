<?php

$conexion = mysqli_connect("bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com","uobaba3u7tzwepfv","VnpoDdEI73A3gZL3GaUd","bmfmhv5m3p9lyxmjs6du");

$query = $conexion->query("SELECT * FROM customers");

echo '<option value="0">Seleccione el paciente</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['codpaci']. '">' . $row['nombrep'] . '</option>' . "\n";
}



