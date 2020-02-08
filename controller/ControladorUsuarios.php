<?php
require_once './config/Validaciones.php';

/**
 * Controlador de gestión de usuarios
 */
class ControladorUsuarios
{

	/**
	 * Método que llama al logueo del administrador
	 */
	public function administrador()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/administrador.php';
	}

	/**
	 * Método que lleva a la página del administrador
	 */
	public function pagina_administrador()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/pagina_administrador.php';
	}

	/**
	 * Método que comprueba si está registrado el usuario y si lo está lo envía a la página de administrador
	 */
	public function logueo()
	{
		if (isset($_REQUEST['loguear'])) {

			if (!empty($_REQUEST['nick']) and !empty($_REQUEST['contrasena'])) {

				$nick = trim($_REQUEST['nick']);
				$pass = trim($_REQUEST['contrasena']);
				$usuario = new Usuarios();

				if ($usuario->esRegistradoNick($nick)) {

					if ($usuario->esRegistrado($nick, $pass)) { // para loguearse, se comprueba que sea ususario registrado

						$_SESSION['usuario'] = $nick;
						$_SESSION['administrador'] = true;

						// Anulamos el error
						$_SESSION['error'] = 0;

						$destino = "pagina_administrador";

					} else {

						$_SESSION['error'] = 202;
						$destino = "administrador";
					}
				} else {

					$_SESSION['error'] = 201;
					$destino = "administrador";
				}
			}
		}

		if (! headers_sent()) {
			header('Location:' . $destino);
			exit();
		}
	}

}