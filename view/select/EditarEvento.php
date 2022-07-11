<?php
$conexion = mysqli_connect("bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com","uobaba3u7tzwepfv","VnpoDdEI73A3gZL3GaUd","bmfmhv5m3p9lyxmjs6du");

$query = $conexion->query("SELECT * FROM eventos");

echo '<option value="0">Seleccione Evento</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['evento_id']. '">' . $row['nombre_evento'] . '</option>' . "\n";
}
