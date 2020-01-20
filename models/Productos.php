<?php
require_once './core/BBDDController.php';
require_once './config/utils.php';

class Productos extends BBDDController {

	// Propiedades de la tabla de la BBDD
	public $titulo_producto;
	public $descripcion;
	public $precio;
	public $tipo_producto;
	public $titulo_imagen;
	public $estado;

	private $c;
	private $tabla;

	public function __construct()
	{
		$bd = Connection::dameInstancia();
		$this->c = $bd->dameConexion();
		$this->tabla = "productos";
	}

	public function getById($titulo_producto) {
			
		$sql = "SELECT * FROM " . $this->tabla . " WHERE titulo_producto = " . $titulo_producto . "";

		if ($this->c->real_query($sql)) {
			if ($resul = $this->c->store_result()) {
				if ($resul->num_rows > 0) {
					return $resul->fetch_assoc();
				}
			}
		}
	}

	public function getAll()
	{
		$consulta = "SELECT * FROM " . $this->tabla . " WHERE estado = 'ACTV'";
		return Productos::ejecutarQuery($this->c, $consulta);
	}

	/**
	 * Obtenemos todos los productos de un mismo tipo
	 * @param String $tipo_producto
	 */
	public function getPorTipoProducto($tipo_producto)
	{
		$consulta = "SELECT * FROM " . $this->tabla . " WHERE tipo_producto = '" . $tipo_producto . "' AND estado = 'ACTV' ORDER BY titulo_producto ASC";
		return Productos::ejecutarQuery($this->c, $consulta);
	}

	/**
	 * Obtenemos todos los tipos de productos
	 */
	public function getTiposProductos()
	{
		$consulta = "SELECT * FROM tipo_producto WHERE estado = 'ACTV' ORDER BY orden ASC";
		return Productos::ejecutarQuery($this->c, $consulta);
	}

	/**
	 * Obtenemos el listado del producto pasado por id
	 *
	 * @param unknown_type $id_producto
	 */
	public function getListadoProducto($id_producto)
	{
		$consulta = "SELECT * FROM listado_producto WHERE id_producto = " . $id_producto . "
		AND estado = 'ACTV' ORDER BY orden ASC";
		return Productos::ejecutarQuery($this->c, $consulta);
	}

	/**
	 * Muestra el select de los tipos de menú existentes
	 */
	public function mostrarMenuProductos() {
			
		$resultados = Productos::getTiposProductos();
			
		echo "<div class='select_productos'>
				<strong>Selecciona el tipo de producto </strong> 				
				<select id='select' name='select'>";

		if ($resultados == 0 || $resultados['numero'] == 0) {
			// No hay datos para mostrar
		} else {

			echo "<option value='todo' select>Ver todo</option>";

			$producto = null;
			$nuevo_producto = true;

			for ($i = 0; $i < count($resultados['filas_consulta']); $i ++) {

				foreach ($resultados['filas_consulta'][$i] as $key => $value) {

					if ($key == "tipo_producto") {
						$tipo_producto = $value;
						$value_producto = Utils::eliminar_acentos(strtolower(utf8_decode($tipo_producto)));
					} elseif ($key == "tipo_producto_generico") {

						if ($value == $producto) {
							$nuevo_producto = false;
						} else {
							$nuevo_producto = true;
						}
						$tipo_producto_generico = $value;
						$producto = $value;
					}
				}

				// Comprobamos si es un nuevo tipo de producto genérico para la tabulación
				if ($nuevo_producto) {
					echo "<option value='" . $value_producto . "' select>" . $tipo_producto_generico ."</option>";
				} else {
					echo "<option value='" . $value_producto . "' select>&nbsp;&nbsp;&nbsp;" . $tipo_producto ."</option>";
				}
			}
			echo "</select>
				</div>";
		}
	}

	/**
	 * Muestra en la página 'Catering' todos los productos agrupados por tipo de producto
	 */
	public function mostrarProductos()
	{
		// Obtenemos una lista con todos los tipos de producto, ordenado por tipo de producto
		$listaProductos = Productos::getTiposProductos();

		$tipo_producto_generico = null;

		// Recorremos la lista y mostramos los productos por tipo de producto
		for ($i = 0; $i < count($listaProductos['filas_consulta']); $i ++) {

			foreach ($listaProductos['filas_consulta'][$i] as $key => $value) {

				// Título del producto genérico
				if ($key == "tipo_producto_generico") {

					if ($value == $tipo_producto_generico) {
						$esTipoNuevo = false;
					} else {
						$tipo_producto_generico = $value;
						$esTipoNuevo = true;
					}
				}

				if ($key == "tipo_producto") {
					$tipo_producto = $value;
				}

				if ($key == "titulo_secundario") {
					$titulo_secundario = $value;
				}

			}

			// Quitamos acentos al leer de bbdd para las clases
			$tipo_producto_normalizado = Utils::eliminar_acentos(strtolower(utf8_decode($tipo_producto)));

			echo "<div class='" . $tipo_producto_normalizado . "'>";

			if ($tipo_producto_generico != null && $esTipoNuevo) {
				echo "<h3>" . strtoupper($tipo_producto_generico) . " " . $titulo_secundario . "</h3>";
			}

			// Listado de los productos
			echo "<ul class='lista_productos_comida'>";

			if ($tipo_producto != $tipo_producto_generico) {

				echo "<li class='" . $tipo_producto_normalizado . "'>
							<div class='texto_producto_comida'>
								<p><u><strong>" . $tipo_producto . "</strong> </u></p>
							</div>
					</li>";
			}

			$resultados = Productos::getPorTipoProducto($tipo_producto);

			if ($resultados == 0 || $resultados['numero'] == 0) {
				// No hay datos para mostrar
			} else {

				// Mostramos todos los productos por cada tipo de producto
				for ($j = 0; $j < count($resultados['filas_consulta']); $j ++) {

					foreach ($resultados['filas_consulta'][$j] as $key => $value) {

						// Id_producto
						if ($key == "id_producto") {
							$id_producto = $value;
						}

						// Título
						if ($key == "titulo_producto") {
							$titulo_producto = $value;
						}

						// Precio
						if ($key == "precio") {
							$precio = $value;
						}

						// Imagen
						if ($key == "titulo_imagen") {
							$imagen = $value;
						}

						// Listado
						if ($key == "listado") {
							$listado = $value;
						}

					}

					echo "<li class='" . $tipo_producto_normalizado . "'>";

					// Pintamos los productos
					if ($listado == "NO") {

						echo "<div class='texto_producto_comida'>
									<p>" . $titulo_producto . "</p>
							</div>";

						echo "<div class='precio_producto_comida'>
									<p><strong>" . $precio . "</strong></p>
							</div>";

						if ($imagen != null) {

							$titulo_imagen = substr($imagen, 0, strlen($imagen)-4);

							echo "<div class='icono_imagen'>
										<a class='fancybox' rel='group'
												href='./views/default/img/" . $imagen . "'
												title='" . $titulo_imagen . "'> <i
												class='fa fa-eye' title='imagen del producto'></i> </a> <img
												src='./views/default/img/" . $imagen . "' class='foto img_catering'
												title='" . $titulo_imagen . "'
												alt='" . $titulo_imagen . "' />
								</div>";
						} else {

							echo "<div class='icono_imagen'>
										<i class='fa fa-eye-slash' title='sin imagen del producto'></i>
								</div>";
						}

					}
					// Productos con listados
					else {

						echo "<div class='menus_opciones'>
									<p><strong>" . $titulo_producto . "</strong></p></br>";

						echo "<p><strong>" . $precio . "</strong></p>";

						if ($imagen != null) {

							// Sacamos el title y el alt del nombre de la imagen, quitando la extensión
							$titulo_imagen = substr($imagen, 0, strlen($imagen)-4);

							echo "<div class='icono_imagen bandeja'>
										<a class='fancybox' rel='group'
												href='./views/default/img/" . $imagen . "'
												title='" . $titulo_imagen . "'> <i
												class='fa fa-eye' title='imagen del producto'></i> </a> <img
												src='./views/default/img/" . $imagen . "' class='foto img_catering'
												title='" . $titulo_imagen . "'
												alt='" . $titulo_imagen . "' />
								</div>";
						} else {

							echo "<div class='icono_imagen bandeja'>
									<i class='fa fa-eye-slash' title='sin imagen del producto'></i>
								</div>";
						}

						// Obtenemos el listado del producto
						$listadoProducto = Productos::getListadoProducto($id_producto);

						// Recorremos la lista y mostramos los productos por tipo de producto
						for ($k = 0; $k < count($listadoProducto['filas_consulta']); $k ++) {

							foreach ($listadoProducto['filas_consulta'][$k] as $key => $value) {

								// Id_producto
								if ($key == "linea") {
									$linea = $value;
								}

								// Título
								if ($key == "es_titulo") {
									$es_titulo = $value;
								}
							}

							if ($es_titulo == "NO") {
								echo "<p>" . $linea . "</p></br>";
							} else {
								echo "<p><i>" . $linea . "</i></p></br>";
							}
						}
					}
					echo "</li>";
				}
			}
			echo "</ul></div>";
		}
	}

}