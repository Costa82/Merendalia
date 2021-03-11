<?php
require_once './config/Validations.php';

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
		
		// Ponemos a false la variable de sesion del administrador
		require './views/inicio.php';
	}
	
	/**
	 * Método para cargar la página de error 404
	 */
	public function page404()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		
		require './views/page404.php';
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
	 * Método para cargar la entrada corto_hummus
	 */
	public function corto_hummus()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/corto_hummus.php';
	}
	
	/**
	 * Método para cargar la entrada consejos_pandemia
	 */
	public function consejos_pandemia()
	{
	    if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
	        $params['error'] = $_SESSION['error'];
	        $_SESSION['error'] = 0;
	    } else {
	        $params['error'] = 0;
	    }
	    require './views/consejos_pandemia.php';
	}
	
	/**
	 * Método para cargar la entrada reserva_el_espacio_en_ferias_de_valladolid
	 */
	public function reserva_el_espacio_en_ferias_de_valladolid()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/reserva_el_espacio_en_ferias_de_valladolid.php';
	}
	
	/**
	 * Método para cargar la entrada experiencia_merendalia_que_son_los_menus_privados
	 */
	public function experiencia_merendalia_que_son_los_menus_privados()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/experiencia_merendalia_que_son_los_menus_privados.php';
	}
	
	/**
	 * Método para cargar la entrada que_es_merendalia_y_por_que_elegirnos
	 */
	public function que_es_merendalia_y_por_que_elegirnos()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/que_es_merendalia_y_por_que_elegirnos.php';
	}
	
	/**
	 * Método para cargar la entrada arranque_de_las_meriendas_taller_de_merendalia
	 */
	public function arranque_de_las_meriendas_taller_de_merendalia()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/arranque_de_las_meriendas_taller_de_merendalia.php';
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
	 * Método para cargar la pagina de cookies
	 */
	public function declaracion_cookies()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/declaracion_cookies.php';
	}
	
	/**
	 * Método para cargar la pagina de carta del bar
	 */
	public function carta_bar()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/carta_bar.php';
	}

}
?>