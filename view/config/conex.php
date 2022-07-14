<?php
$hostname_conex = "bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com";
$database_conex = "bmfmhv5m3p9lyxmjs6du";
$username_conex = "uobaba3u7tzwepfv";
$password_conex = "VnpoDdEI73A3gZL3GaUd";
// creación de la conexión a la base de datos con mysql_connect()
$conex = mysqli_connect($hostname_conex, $username_conex, $password_conex, $database_conex) or 
die ("No se ha podido conectar al servidor de Base de datos"); 

Class Connection{
 
	private $server = "mysql:host=bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com;dbname=bmfmhv5m3p9lyxmjs6du";
	private $username = "uobaba3u7tzwepfv";
	private $password = "VnpoDdEI73A3gZL3GaUd";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "Hubo un problema con la conexión: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
}

?>
