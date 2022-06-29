<?php

$conexion = mysqli_connect("bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com","uobaba3u7tzwepfv","VnpoDdEI73A3gZL3GaUd","bmfmhv5m3p9lyxmjs6du");

$query = $conexion->query("SELECT * FROM specialty");

echo '<option value="0">Seleccione la especialidad</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['codespe']. '">' . $row['nombrees'] . '</option>' . "\n";
}



