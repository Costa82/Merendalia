<?php
require_once 'abstract/AbstractBBDD.php';
require_once './config/Utils.php';

class Productos extends AbstractBBDD {

	// Propiedades de la tabla de la BBDD

	// id incremental
	private $id_producto;

	private $titulo_producto = null;
	private $titulo_producto_nuevo = null;
	private $descripcion = null;
	private $precio = null;
	private $tipo_producto = null;
	private $imagen = null;
	private $title = null;
	private $alt = null;
	private $listado = null;
	private $estado = null;

	protected $c;
	protected $tabla;

	public function __construct()
	{
		$bd = Connection::dameInstancia();
		$this->c = $bd->dameConexion();
		$this->tabla = "productos";
	}

	// Getters y Setters
	public function getId_producto() {
		return $this->id_producto;
	}

	public function setId_producto($id_producto) {
		$this->id_producto = $id_producto;
	}

	public function getTitulo_producto() {
		return $this->titulo_producto;
	}

	public function setTitulo_producto($titulo_producto) {
		$this->titulo_producto = $titulo_producto;
	}

	public function getTitulo_producto_nuevo() {
		return $this->titulo_producto_nuevo;
	}

	public function setTitulo_producto_nuevo($titulo_producto_nuevo) {
		$this->titulo_producto_nuevo = $titulo_producto_nuevo;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}

	public function getPrecio() {
		return $this->precio;
	}

	public function setPrecio($precio) {
		$this->precio = $precio;
	}

	public function getTipo_producto() {
		return $this->tipo_producto;
	}

	public function setTipo_producto($tipo_producto) {
		$this->tipo_producto = $tipo_producto;
	}

	public function getImagen() {
		return $this->imagen;
	}

	public function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getAlt() {
		return $this->alt;
	}

	public function setAlt($alt) {
		$this->alt = $alt;
	}

	public function getListado() {
		return $this->listado;
	}

	public function setListado($listado) {
		$this->listado = $listado;
	}

	public function getEstado() {
		return $this->estado;
	}

	public function setEstado($estado) {
		$this->estado = $estado;
	}

	public function getById($id_producto) {
			
		$sql = "SELECT * FROM " . $this->tabla . " WHERE id_producto = " . $id_producto . "";

		if ($this->c->real_query($sql)) {
			if ($resul = $this->c->store_result()) {
				if ($resul->num_rows > 0) {
					return $resul->fetch_assoc();
				}
			}
		}
	}

	/**
	 * Actualizamos un producto en BBDD
	 */
	public function updateProducto() {

		$query = "UPDATE " . $this->tabla . " SET 
			titulo_producto = '".$this->titulo_producto_nuevo."', 
			descripcion = '".$this->descripcion."', 
			precio = '".$this->precio."', 
			tipo_producto = '".$this->tipo_producto."',
			imagen = '".$this->imagen."', 
			title = '".$this->title."', 
			alt = '".$this->alt."',
			listado = '".$this->listado."', 
			estado = '".$this->estado."' WHERE 
			titulo_producto = '".$this->titulo_producto."'";

		$update = $this->c->query($query);

		return $update;
	}

	/**
	 * Insertamos un producto en BBDD
	 */
	public function saveProducto() {

		$query = "INSERT INTO " . $this->tabla . " (titulo_producto, descripcion, precio, tipo_producto,
		imagen, title, alt, listado, estado)
                VALUES('".$this->titulo_producto."',
                       '".$this->descripcion."',
                       '".$this->precio."',
                       '".$this->tipo_producto."',
                       '".$this->imagen."',
                       '".$this->title."',
                       '".$this->alt."',
                       '".$this->listado."',
                       '".$this->estado."');";

		$save = $this->c->query($query);

		return $save;
	}

	/**
	 *
	 * Insertamos un listado en BBDD
	 *
	 * @param String $titulo_producto
	 * @param String $linea
	 * @param String $es_titulo
	 * @param String $orden
	 */
	public function saveListado($titulo_producto, $linea, $es_titulo, $orden) {

		$id_producto = Productos::getCampoBy("id_producto", "titulo_producto", $this->titulo_producto);

		$query = "INSERT INTO listado_producto (id_producto, linea, es_titulo, orden, estado)
                VALUES('".$id_producto."',
                       '".$linea."',
                       '".$es_titulo."',
                       '".$orden."',
                       'ACTV');";

		$save = $this->c->query($query);

		return $save;
	}

	/**
	 * Obtenemos todos los productos de un mismo tipo
	 *
	 * @param String $tipo_producto
	 */
	public function getPorTipoProducto($tipo_producto)
	{
		$consulta = "SELECT * FROM " . $this->tabla . " WHERE tipo_producto = '" . $tipo_producto . "' AND estado = 'ACTV' ORDER BY titulo_producto ASC";
		return Productos::ejecutarQuery($consulta);
	}

	/**
	 * Obtenemos todos los datos de un producto por el título y los
	 * guardamos en una variable de sesión
	 */
	public function getPorTituloProducto()
	{
		$consulta = "SELECT * FROM " . $this->tabla . " WHERE titulo_producto = '" . $this->titulo_producto . "' AND estado = 'ACTV' ORDER BY titulo_producto ASC";

		$resultados = Productos::ejecutarQuery($consulta);
		
		// Mostramos todos los productos por cada tipo de producto
		for ($j = 0; $j < count($resultados['filas_consulta']); $j ++) {

			foreach ($resultados['filas_consulta'][$j] as $key => $value) {

				switch ($key) {

					case "titulo_producto":
						$titulo_producto = $value;
						$_SESSION['producto']['titulo_producto'] = $titulo_producto;
						break;
					case "precio":
						$precio = $value;
						$_SESSION['producto']['precio'] = $precio;
						break;
					case "descripcion":
						$descripcion = $value;
						$_SESSION['producto']['descripcion'] = $descripcion;
						break;
					case "tipo_producto":
						$tipo_producto = $value;
						$_SESSION['producto']['tipo_producto'] = $tipo_producto;
						break;
					case "imagen":
						$imagen = trim($value, "€");
						$_SESSION['producto']['imagen'] = $imagen;
						break;
					case "title":
						$title = $value;
						$_SESSION['producto']['title'] = $title;
						break;
					case "alt":
						$alt = $value;
						$_SESSION['producto']['alt'] = $alt;
						break;
					case "listado":
						$listado = $value;
						break;
					default:
						break;
				}
			}
		}

			return $resultados;
		}

		/**
		 * Obtenemos todos los tipos de productos
		 */
		public function getTiposProductos()
		{
			$consulta = "SELECT * FROM tipo_producto WHERE estado = 'ACTV' ORDER BY orden ASC";
			return Productos::ejecutarQuery($consulta);
		}

		/**
		 * Obtenemos el listado del producto pasado por id
		 *
		 * @param String $id_producto
		 */
		public function getListadoProducto($id_producto)
		{
			$consulta = "SELECT * FROM listado_producto WHERE id_producto = " . $id_producto . "
		AND estado = 'ACTV' ORDER BY orden ASC";
			return Productos::ejecutarQuery($consulta);
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

							switch ($key) {

								case "id_producto":
									$id_producto = $value;
									break;
								case "titulo_producto":
									$titulo_producto = $value;
									break;
								case "precio":
									$precio = $value;
									break;
								case "imagen":
									$imagen = $value;
									break;
								case "title":
									$title = $value;
									break;
								case "alt":
									$alt = $value;
									break;
								case "listado":
									$listado = $value;
									break;
								default:
									break;
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

							//if ($imagen != null && $title != null && $alt != null) {

								//echo "<div class='icono_imagen'>
										//<a class='fancybox' rel='group'
												//href='./views/default/img/" . $imagen . "'
												//title='" . $title . "'> <i
												//class='fa fa-eye' title='imagen del producto'></i> </a> <img
												//src='./views/default/img/" . $imagen . "' class='foto img_catering'
												//title='" . $title . "'
												//alt='" . $alt . "' />
								//</div>";
							//} else {

								//echo "<div class='icono_imagen'>
										//<i class='fa fa-eye-slash' title='sin imagen del producto'></i>
								//</div>";
							//}

						}
						// Productos con listados
						else {

							echo "<div class='menus_opciones'>
									<p><strong>" . $titulo_producto . "</strong></p></br>";

							echo "<p><strong>" . $precio . "</strong></p>";

							//if ($imagen != null && $title != null && $alt != null) {

								//echo "<div class='icono_imagen bandeja'>
										//<a class='fancybox' rel='group'
												//href='./views/default/img/" . $imagen . "'
												//title='" . $title . "'> <i
												//class='fa fa-eye' title='imagen del producto'></i> </a> <img
												//src='./views/default/img/" . $imagen . "' class='foto img_catering'
												//title='" . $title . "'
												//alt='" . $alt . "' />
								//</div>";
							//} else {

								//echo "<div class='icono_imagen bandeja'>
									//<i class='fa fa-eye-slash' title='sin imagen del producto'></i>
								//</div>";
							//}

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