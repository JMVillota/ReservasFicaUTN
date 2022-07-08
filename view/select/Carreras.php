<?php
$conexion = mysqli_connect("bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com","uobaba3u7tzwepfv","VnpoDdEI73A3gZL3GaUd","bmfmhv5m3p9lyxmjs6du");

$query = $conexion->query("SELECT * FROM departamentos");

echo '<option value="0">Seleccione Facultad</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['departamento_id']. '">' . $row['nombre_departamento'] . '</option>' . "\n";
}
