<?php
require_once 'abstract/AbstractBBDD.php';
require_once './config/Utils.php';

class Usuarios extends AbstractBBDD {

	// Propiedades de la tabla de la BBDD
	public $nick;
	public $nombre;
	public $apellidos;
	public $telefono;
	public $email;
	public $password;
	public $fecha_registro;
	public $fecha_ultima_actualizacion;
	public $ultima_accion;
	public $tipo_usuario;
	public $newsletter;
	public $estado;

	protected $c;
	protected $tabla;

	public function __construct()
	{
		$bd = Connection::dameInstancia();
		$this->c = $bd->dameConexion();
		$this->tabla = "usuarios";
	}

	// Getters y Setters
	public function getNick() {
		return $this->nick;
	}

	public function setNick($nick) {
		$this->nick = $nick;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function getApellidos() {
		return $this->apellidos;
	}

	public function setApellidos($apellidos) {
		$this->apellidos = $apellidos;
	}

	public function getTelefono() {
		return $this->telefono;
	}

	public function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getFecha_registro() {
		return $this->fecha_registro;
	}

	public function setFecha_registro($fecha_registro) {
		$this->fecha_registro = $fecha_registro;
	}

	public function getFecha_ultima_actualizacion() {
		return $this->fecha_ultima_actualizacion;
	}

	public function setFecha_ultima_actualizacion($fecha_ultima_actualizacion) {
		$this->fecha_ultima_actualizacion = $fecha_ultima_actualizacion;
	}

	public function getUltima_accion() {
		return $this->ultima_accion;
	}

	public function setUltima_accion($ultima_accion) {
		$this->ultima_accion = $ultima_accion;
	}

	public function getTipo_usuario() {
		return $this->tipo_usuario;
	}

	public function setTipo_usuario($tipo_usuario) {
		$this->tipo_usuario = $tipo_usuario;
	}

	public function getNewsletter() {
		return $this->newsletter;
	}

	public function setNewsletter($newsletter) {
		$this->newsletter = $newsletter;
	}

	public function getEstado() {
		return $this->estado;
	}

	public function setEstado($estado) {
		$this->estado = $estado;
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
	 * Recupera todos los usuarios de la tabla por nombre
	 */
	public function mostrarUsuariosPorNombreEnTabla()
	{
		$consulta = "SELECT * FROM " . $this->tabla . " WHERE estado = 'ACTV' AND tipo_usuario = 'USU' ORDER BY nombre ASC";
		$resultados = Usuarios::ejecutarQuery($consulta);
		
		// Pintamos los resultados
		Usuarios::mostrarResultadosUsuarios($resultados);
	}
		
	/**
	 * Recupera todos los usuarios de la tabla por fecha actualización
	 */
	public function mostrarUsuariosPorFechaEnTabla()
	{
		$consulta = "SELECT * FROM " . $this->tabla . " WHERE estado = 'ACTV' AND tipo_usuario = 'USU' ORDER BY fecha_ultima_actualizacion DESC";
		$resultados = Usuarios::ejecutarQuery($consulta);

		// Pintamos los resultados
		Usuarios::mostrarResultadosUsuarios($resultados);
	}
	
	private function mostrarResultadosUsuarios($resultados) {
		
	// Mostramos todos los productos por cada tipo de producto
		for ($j = 0; $j < count($resultados['filas_consulta']); $j ++) {

			foreach ($resultados['filas_consulta'][$j] as $key => $value) {

				switch ($key) {

					case "nombre":
						$nombre = $value;
						break;
					case "telefono":
						$telefono = $value;
						break;
					case "email":
						$email = $value;
						break;
					case "fecha_registro":
						$fecha_registro = $value;
						break;
					case "fecha_ultima_actualizacion":
						$fecha_ultima_actualizacion = $value;
						break;
					case "ultima_accion":
						$ultima_accion = $value;
						break;
					case "newsletter":
						if ($value == 1)
							$newsletter = 'SI';
						else
							$newsletter = 'NO';
						break;
					default:
						break;
				}
			}
			
			echo '
			<tbody>

				<tr>

					<td>' . $nombre  . '</td>

					<td>' . $telefono  . '</td>
					
					<td>' . $email  . '</td>
					
					<td>' . $fecha_registro  . '</td>

					<td>' . $fecha_ultima_actualizacion  . '</td>
					
					<td>' . $ultima_accion  . '</td>
					
					<td>' . $newsletter  . '</td>
					
				</tr>

			</tbody>';
		}
	}

	/**
	 * Insertamos un usuario en BBDD
	 */
	public function saveUsuario() {

		$save = false;
		$fecha_actual = date('d-m-Y');

		$registrado = Usuarios::esRegistradoMail($this->email);

		// Si ya está registrado actualizamos su fecha_ultima_actualizacion
		if ($registrado) {

			$query = "UPDATE " . $this->tabla . "
						SET fecha_ultima_actualizacion = '" . $fecha_actual . "', ultima_accion = '" . $this->ultima_accion . "'
						WHERE email = '" . $this->email . "';";

		} else {

			$query = "INSERT INTO " . $this->tabla . " (nick, nombre, apellidos, telefono,
						email, password, fecha_registro, fecha_ultima_actualizacion, ultima_accion, tipo_usuario, newsletter, estado)
	                	VALUES('" . $this->nick . "',
	                       '" . $this->nombre . "',
	                       '" . $this->apellidos . "',
	                       '" . $this->telefono . "',
	                       '" . $this->email . "',
	                       '" . $this->password . "',
	                       '" . $fecha_actual . "',
	                       '" . $fecha_actual . "',
	                       '" . $this->ultima_accion . "',
	                       '" . $this->tipo_usuario . "',
	                       '" . $this->newsletter . "',
	                       '" . $this->estado . "');";
		}

		$save = $this->c->query($query);

		return $save;
	}

	/**
	 * Método que se utiliza para comprobar si un usuario está registrado y poder loguearse.
	 *
	 * @param String $nick
	 * @param String $pass
	 * @return boolean
	 */
	public function esRegistrado($nick, $pass)
	{
		$resultado = false;

		$passMD5 = md5($pass);
		$consulta = "SELECT * FROM " . $this->tabla . " WHERE UPPER(nick) = UPPER('$nick') AND password = '$passMD5' AND estado = 'ACTV'";

		$resultados = Usuarios::ejecutarQuery($consulta);

		if ($resultados == 0 || $resultados['numero'] == 0) {
			// No hay datos para mostrar
		} else {
			$resultado = true;
		}

		return $resultado;
	}

	/**
	 * Método que se utiliza para comprobar si un usuario está registrado y poder loguearse.
	 *
	 * @param String $nick
	 * @return boolean
	 */
	public function esRegistradoNick($nick)
	{
		$resultado = false;

		$consulta = "SELECT * FROM " . $this->tabla . " WHERE UPPER(nick) = UPPER('$nick') AND estado = 'ACTV'";
		$resultados = Usuarios::ejecutarQuery($consulta);

		if ($resultados == 0 || $resultados['numero'] == 0) {
			// No hay datos para mostrar
		} else {
			$resultado = true;
		}

		return $resultado;
	}

	/**
	 * Método que se utiliza para comprobar si un usuario está registrado por su mail.
	 *
	 * @param String $mail
	 * @return boolean
	 */
	public function esRegistradoMail($mail)
	{
		$resultado = false;

		$consulta = "SELECT * FROM " . $this->tabla . " WHERE email = '" . $mail . "' AND estado = 'ACTV'";
		$resultados = Usuarios::ejecutarQuery($consulta);

		if ($resultados == 0 || $resultados['numero'] == 0) {
			// No hay datos para mostrar
		} else {
			$resultado = true;
		}

		return $resultado;
	}
}