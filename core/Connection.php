<?php
class Connection {
	
	// Conexión Producción
	//private $host = "qach704.merendalia";
	//private $username = "qach704";
	//private $password = "Sandia82";
	//private $base = "qach704";

	// Conexión Local
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $base="bd_merendalia";

	private $conex;
	private static $instancia;

	/**
	 * Crea una instancia de BBDD
	 */
	public static function dameInstancia() {
		if ( !self::$instancia ) {
			self::$instancia = new self();
		}
		return self::$instancia;
	}

	private function __construct() {
		@$this->conex = new mysqli($this->host, $this->username, $this->password,$this->base);
		@$this->conex->set_charset('utf8');
		if ( mysqli_connect_error() ) {
			trigger_error("Fallo en la conexión, error: " . mysqli_connect_error(), E_USER_ERROR);
		}
	}

	private function __clone() { }

	/**
	 * Abre la conexión a BBDD 
	 */
	public function dameConexion() {
		return $this->conex;
	}

	/**
	 * Cierra la conexión a BBDD 
	 */
	public function cierraConexion() {
		$this->conex->close();
	}

}

?>
