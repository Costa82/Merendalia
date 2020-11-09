<?php
require_once './config/Validaciones.php';
require_once './config/Correo.php';

$correo = new Correo();

/**
 * Controlador de gestión de formularios
 */
class ControladorFormularios
{

	/**
	 * Método pora el formulario de reserva
	 */
	public function formulario_reserva()
	{
		//6Lf7WsQUAAAAALVQFOHGLzIecVOnOc7vSASkeFwQ local
		//6LcJW8QUAAAAAHZwrH69SW0bmGN2LotC37S2ZHaU producción
		$recaptcha_secret = '6LcJW8QUAAAAAHZwrH69SW0bmGN2LotC37S2ZHaU';
		$recaptcha_response = $_POST['recaptcha_response'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify?");
		curl_setopt($ch, CURLOPT_POST, 1);
		$campos=array('secret'=>$recaptcha_secret,'response'=>$recaptcha_response);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$campos);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$ch_exec = curl_exec($ch);
		curl_close ($ch);

		$respuesta_google = json_decode($ch_exec);
		
		if($respuesta_google->success === true){

			if(isset($_REQUEST['nombre']) AND isset($_REQUEST['mail']) AND isset($_REQUEST['dia']) AND isset($_REQUEST['hora_entrada']) AND isset($_REQUEST['hora_salida'])) {
					
				// Creamos un usuario
				$usuario = new Usuarios();

				$usuario->setTipo_usuario("USU");
				$usuario->setEstado("ACTV");
				$usuario->setUltima_accion("Reserva");

				// Campos obligatorios
				$nombre = $_REQUEST['nombre'];
				$usuario->setNombre($nombre);
				$usuario->setNick($nombre);

				$mail = $_REQUEST['mail'];
				$usuario->setEmail($mail);

				$dia = $_REQUEST['dia'];
				$hora_entrada = $_REQUEST['hora_entrada'];
				$hora_salida = $_REQUEST['hora_salida'];
				$telefonoValido = true;

				// Campos opcionales
				if ( isset($_REQUEST['telefono']) ) {

					$telefono = $_REQUEST['telefono'];
					$usuario->setTelefono($telefono);

					if ($telefono != "" && $telefono != null) {

						if (!validarTelefono($telefono)) {
							$telefonoValido = false;
						}
					} else {
						$telefono = null;
					}

				} else {
					$telefono = null;
				}

				if ( isset($_REQUEST['comentario']) ) {
					$comentario = $_REQUEST['comentario'];
				} else {
					$comentario = null;
				}

				if (isset($_POST['whatsapp']) && $_POST['whatsapp'] == '1')
				{
					$whatsapp = "OK";
					$usuario->setNewsletter(1);
				}
				else
				{
					$whatsapp = "KO";
				}

				// Enviamos el correo de reserva
				// Comprobamos que no sea ninguno de estos correos (info@basededatos-info.com, yourmail@gmail.com)
				if ( $mail === "info@basededatos-info.com" || $mail === "yourmail@gmail.com" || $mail === "artyea@msn.com" || !$telefonoValido ) {
					$envio = "KO";
				} else {
					$correo = new Correo();
					$envio = $correo->enviarMailsReserva($mail, $nombre, $dia, $hora_entrada, $hora_salida, $telefono, $comentario, $whatsapp);
				}

				// Comprobamos cómo ha ido el envío
				if ( $envio != "OK" ) {
					$_SESSION['error'] = 501;
				} else {
					$usuario->saveUsuario();
				}

				// El nombre y el mail tienen que ser obligatorios
			} else {
				$_SESSION['error'] = 502;
			}

			// El recaptcha ha ido mal
		} else {
			$_SESSION['error'] = 503;
		}

		if (!headers_sent()) {
			header('Location:respuesta_envio');
			exit;
		}
	}

	/**
	 * Método para el formulario de contacto
	 */
	public function formulario_contacto()
	{
		//6Lf7WsQUAAAAALVQFOHGLzIecVOnOc7vSASkeFwQ local
		//6LcJW8QUAAAAAHZwrH69SW0bmGN2LotC37S2ZHaU producción
		$recaptcha_secret = '6LcJW8QUAAAAAHZwrH69SW0bmGN2LotC37S2ZHaU';
		$recaptcha_response = $_POST['recaptcha_response'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify?");
		curl_setopt($ch, CURLOPT_POST, 1);
		$campos=array('secret'=>$recaptcha_secret,'response'=>$recaptcha_response);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$campos);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$ch_exec = curl_exec($ch);
		curl_close ($ch);

		$respuesta_google = json_decode($ch_exec);
		
		if($respuesta_google->success === true){

			if(isset($_REQUEST['nombre']) AND isset($_REQUEST['mail'])){

				// Creamos un usuario
				$usuario = new Usuarios();

				$usuario->setTipo_usuario("USU");
				$usuario->setEstado("ACTV");
				$usuario->setUltima_accion("Contacto");
					
				// Campos obligatorios
				$nombre = $_REQUEST['nombre'];
				$usuario->setNombre($nombre);
				$usuario->setNick($nombre);

				$mail = $_REQUEST['mail'];
				$usuario->setEmail($mail);
				$telefonoValido = true;
					
				// Campos opcionales
				if ( isset($_REQUEST['telefono']) ) {

					$telefono = $_REQUEST['telefono'];
					$usuario->setTelefono($telefono);

					if ($telefono != "" && $telefono != null) {
							
						if (!validarTelefono($telefono)) {
							$telefonoValido = false;
						}
					} else {
						$telefono = null;
					}

				} else {
					$telefono = null;
				}
					
				if ( isset($_REQUEST['consulta']) ) {
					$consulta = $_REQUEST['consulta'];
				} else {
					$consulta = null;
				}
					
				if (isset($_POST['whatsapp']) && $_POST['whatsapp'] == '1') {
					$whatsapp = "OK";
					$usuario->setNewsletter(1);
				} else {
					$whatsapp = "KO";
				}
					
				// Enviamos el correo de reserva
				// Comprobamos que no sea ninguno de estos correos (info@basededatos-info.com, yourmail@gmail.com)
				if ( $mail === "info@basededatos-info.com" || $mail === "yourmail@gmail.com" || $mail === "artyea@msn.com" || !$telefonoValido ) {
					$envio = "KO";
				} else {
					$correo = new Correo();
					$envio = $correo->enviarMailsConsulta($mail, $nombre, $telefono, $consulta, $whatsapp);
				}
					
				// Comprobamos cómo ha ido el envío
				if ( $envio != "OK" ) {
					$_SESSION['error'] = 501;
				} else {
					$usuario->saveUsuario();
				}

				// El nombre y el mail tienen que ser obligatorios
			} else {
				$_SESSION['error'] = 502;
			}

			// El recaptcha ha ido mal
		} else {
			$_SESSION['error'] = 503;
		}

		if (!headers_sent()) {
			header('Location:respuesta_envio');
			exit;
		}
	}

	/**
	 * Método para cargar la respuesta_envio
	 */
	public function respuesta_envio()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != 0) {
			$params['error'] = $_SESSION['error'];
			$_SESSION['error'] = 0;
		} else {
			$params['error'] = 0;
		}
		require './views/respuesta_envio.php';
	}

}
?>