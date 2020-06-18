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
	public function merendalios()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/merendalios.php';
	}

	/**
	 * Método que lleva a la página del administrador
	 */
	public function pagina_administrador_merendalios()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/pagina_administrador_merendalios.php';
	}

	/**
	 * Método que descargar el documento excel
	 */
	public function documento_excel()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		
		if (isset($_REQUEST['crearDocumentoNombre'])) {
			require './views/documento_excel_nombre.php';
		} else if (isset($_REQUEST['crearDocumentoFecha'])) {
			require './views/documento_excel_fecha.php';
		}
	}

	/**
	 * Método que comprueba si está registrado el usuario y si lo está muestra el error
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

						$destino = "pagina_administrador_merendalios";

					} else {

						$_SESSION['error'] = 202;
						$destino = "merendalios";
					}
				} else {

					$_SESSION['error'] = 201;
					$destino = "merendalios";
				}
			}
		}

		if (! headers_sent()) {
			header('Location:' . $destino);
			exit();
		}
	}

}