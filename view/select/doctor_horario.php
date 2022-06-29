<?php

$conexion = mysqli_connect("bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com","uobaba3u7tzwepfv","VnpoDdEI73A3gZL3GaUd","bmfmhv5m3p9lyxmjs6du");

$el_horario = $_POST['horario'];

$query = $conexion->query("SELECT * FROM horario WHERE coddoc = $el_horario");



while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['codhor']. '">' . $row['nomhor'] . '</option>' . "\n";
}
