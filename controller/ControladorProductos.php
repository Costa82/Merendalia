<?php
require_once './config/validaciones.php';

/**
 * Controlador de gestión de modificaciones e inserciones en BBDD
 */
class ControladorProductos
{

	/**
	 * Método que sube un producto a BBDD
	 */
	public function subir_producto()
	{
		// Reiniciamos los errores
		$_SESSION['error'] = 0;
		
		if (isset($_REQUEST['addProducto'])) {

			// Creamos un producto
			$producto = new Productos();

			// titulo_producto
			$producto->setTitulo_producto($_REQUEST["titulo_producto"]);
			
			// precio
			$producto->setPrecio($_REQUEST["precio"] . ' €');
			
			// tipo_producto
			$producto->setTipo_producto($_REQUEST["tipo_producto"]);

			// descripcion
			if (!empty($_REQUEST["descripcion"])) {
				$producto->setDescripcion($_REQUEST["descripcion"]);
			}
			
			// imagen
			$imagen = $_FILES['imagen']['name'];
			
			if (isset($imagen) && 
			(empty($_REQUEST["title"]) || empty($_REQUEST["alt"]))) {
				
				$_SESSION['error'] = 603;
				$destino = "pagina_administrador";
				
			} else {
				
				if (isset($imagen)) {
					$producto->setImagen($imagen);
				}
	
				// title
				if (!empty($_REQUEST["title"])) {
					$producto->setTitle($_REQUEST["title"]);
				}
	
				// alt
				if (!empty($_REQUEST["alt"])) {
					$producto->setAlt($_REQUEST["alt"]);
				}
			}

			// listado
			if (!empty($_REQUEST["listado"])) {
				$producto->setListado('SI');
			} else {
				$producto->setListado('NO');
			}

			// estado
			$producto->setEstado('ACTV');

			if ($_SESSION['error'] == 0) {
				
				// Guardamos el producto
				$save = $producto->saveProducto();

				if ($save) {
					$_SESSION['error'] = 601;
					$destino = "pagina_administrador";
				} else {
					$_SESSION['error'] = 602;
					$destino = "pagina_administrador";
				}
			} else {
				$destino = "pagina_administrador";
			}
		}

		if (! headers_sent()) {
			header('Location:' . $destino);
			exit();
		}
	}

}