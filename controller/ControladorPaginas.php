<?php
require_once './config/validaciones.php';

/**
 * Controlador de gestión de usuarios
 */
class ControladorPaginas
{

	/**
	 * Método por defecto de entrada en la web
	 */
	public function inicio()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/inicio.php';
	}

	/**
	 * Método para cargar la galeria
	 */
	public function galeria()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/galeria.php';
	}

	/**
	 * Método para cargar la eventos
	 */
	public function eventos()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/eventos.php';
	}
	
	/**
	 * Método para cargar el espacio
	 */
	public function espacio()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/espacio.php';
	}
	
	/**
	 * Método para cargar el catering
	 */
	public function catering()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/catering.php';
	}
	
	/**
	 * Método para cargar el blog_merendalia
	 */
	public function blog_merendalia()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/blog_merendalia.php';
	}
	
	/**
	 * Método para cargar el contacto
	 */
	public function contacto()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/contacto.php';
	}
	
	/**
	 * Método para cargar el aviso_legal
	 */
	public function aviso_legal()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/aviso_legal.php';
	}
	
	/**
	 * Método para cargar la politica_privacidad_y_proteccion_datos
	 */
	public function politica_privacidad_y_proteccion_datos()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/politica_privacidad_y_proteccion_datos.php';
	}
	
	/**
	 * Método para cargar la pagina de cookies
	 */
	public function cookies()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/cookies.php';
	}

	/**
	 * Método que llama al logueo del administrador
	 */
	public function admin_loguin()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/admin_loguin.php';
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

			if (! empty($_REQUEST['nick']) and ! empty($_REQUEST['contrasena'])) {

				$nick = trim($_REQUEST['nick']);
				$pass = trim($_REQUEST['contrasena']);
				$usuario = new Usuarios();

				if ($usuario->esRegistradoNick($nick)) {

					if ($usuario->esRegistrado($nick, $pass)) { // para loguearse, se comprueba que sea ususario registrado

						require_once './config/funciones.php';

						$_SESSION['usuario'] = $nick;

						// Anulamos el error
						$_SESSION['error'] = 0;

						$destino = "pagina_administrador";

					} else {

						$_SESSION['error'] = 202;
						$destino = "admin_loguin";
					}
				} else {

					$_SESSION['error'] = 201;
					$destino = "admin_loguin";
				}
			}
		}

		if (! headers_sent()) {
			header('Location:' . $destino);
			exit();
		}
	}
}
?>