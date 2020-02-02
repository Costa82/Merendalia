<?php
require_once './core/BBDDController.php';
require_once './config/utils.php';

class Usuarios extends BBDDController {

	// Propiedades de la tabla de la BBDD
	public $nick;
	public $nombre;
	public $apellidos;
	public $telefono;
	public $email;
	public $password;
	public $fecha_registro;
	public $fecha_ultima_actualizacion;
	public $tipo_usuario;
	public $newsletter;
	public $estado;

	private $c;
	private $tabla;

	public function __construct()
	{
		$bd = Connection::dameInstancia();
		$this->c = $bd->dameConexion();
		$this->tabla = "usuarios";
	}

	public function getById($id) {
			
		$sql = "SELECT * FROM " . $this->tabla . " WHERE nick = " . $id . "";

		if ($this->c->real_query($sql)) {
			if ($resul = $this->c->store_result()) {
				if ($resul->num_rows > 0) {
					return $resul->fetch_assoc();
				}
			}
		}
	}

	/**
	 * Inserta un usuario con los datos pasador como parámetro
	 * @param $array_datos array asociativo con todos los datos a insertar
	 *
	 */
	public function set($array_datos = array()) {
		//Creamos variables desde los datos del array
		foreach ( $array_datos as $campo => $valor ){
			$$campo = $valor;
		}

		//Indicamos la query INSERT a ejecutar
		$clave = md5($clave);
		$sql= $this->query = " INSERT INTO " . $this->tabla . " VALUES('default',
		'$nombre', '$apellidos', '$email', '$clave','$avatar','$codigoActivacion','default')";

		//Ejecutamos la query
		$this->execute_single_query ();
	}

	/**
	 * esRegistrado
	 * Método que se utiliza para comprobar si un usuario está registrado y poder loguearse.
	 *
	 * @param
	 *            $nick
	 * @param
	 *            $pass
	 * @return boolean
	 */
	public function esRegistrado($nick, $pass)
	{
		$resultado = false;

		$passMD5 = md5($pass);
		$consulta = "SELECT * FROM " . $this->tabla . " WHERE UPPER(nick) = UPPER('$nick') AND password = '$passMD5' AND estado = 'ACTV'";

		$resultados = Usuarios::ejecutarQuery($this->c, $consulta);

		if ($resultados == 0 || $resultados['numero'] == 0) {
			// No hay datos para mostrar
		} else {
			$resultado = true;
		}

		return $resultado;
	}

	/**
	 * esRegistradoNick
	 * Método que se utiliza para comprobar si un usuario está registrado y poder loguearse.
	 *
	 * @param
	 *            $nick
	 * @return boolean
	 */
	public function esRegistradoNick($nick)
	{
		$resultado = false;
		
		$consulta = "SELECT * FROM " . $this->tabla . " WHERE UPPER(nick) = UPPER('$nick') AND estado = 'ACTV'";
		$resultados = Usuarios::ejecutarQuery($this->c, $consulta);

		if ($resultados == 0 || $resultados['numero'] == 0) {
			// No hay datos para mostrar
		} else {
			$resultado = true;
		}

		return $resultado;
	}
}