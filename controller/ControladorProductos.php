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
		if (isset($_REQUEST['addProducto'])) {

			// Creamos un producto
            $producto = new Productos();
            
            $producto->setTitulo_producto($_POST["titulo_producto"]);
            $producto->setApellido($_POST["apellido"]);
            $producto->setEmail($_POST["email"]);
            $producto->setPassword(sha1($_POST["password"]));
            
            $save = $producto->saveProducto();
		}

		if (! headers_sent()) {
			header('Location:' . $destino);
			exit();
		}
	}
	
}