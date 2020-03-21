<?php
require_once './config/Validaciones.php';
require_once './config/UtilsProductos.php';

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
		$guardado = true;

		// Creamos un producto
		$producto = new Productos();

		if (isset($_REQUEST['addProducto']) && !$producto->existeTitulo($_REQUEST["titulo_producto"])) {


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
			$archivo = $_FILES['imagen'];

			if (isset($archivo['name']) && !empty($archivo['name'])) {

				if (empty($_REQUEST["title"]) || empty($_REQUEST["alt"])) {

					$_SESSION['error'] = 603;
					$destino = "pagina_administrador_merendalios";

				} else {

					if (isset($archivo)) {
						$producto->setImagen($archivo['name']);
					}

					// title
					if (!empty($_REQUEST["title"])) {
						$producto->setTitle($_REQUEST["title"]);
					}

					// alt
					if (!empty($_REQUEST["alt"])) {
						$producto->setAlt($_REQUEST["alt"]);
					}

					$carpetaDestino = './views/default/img/';
					$guardado = UtilsProductos::guardarImagen($carpetaDestino, $archivo);
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

			if ($_SESSION['error'] == 0 && $guardado) {

				// Guardamos el producto
				$saveProducto = $producto->saveProducto();

				if ($saveProducto) {

					// Miramos si hay listado a añadir
					if ($producto->getListado() == "SI") {

						// Líneas
						if (!empty( $_REQUEST["linea1"])) {
							$linea = $_REQUEST["linea1"];

							if (!empty( $_REQUEST["titulo1"])) {
								$es_titulo = 'SI';
							} else {
								$es_titulo = 'NO';
							}
							$orden = '1';

							$saveListado = $producto->saveListado($producto->getTitulo_producto(), $linea, $es_titulo, $orden);
						}
						if (!empty( $_REQUEST["linea2"])) {
							$linea = $_REQUEST["linea2"];

							if (!empty( $_REQUEST["titulo2"])) {
								$es_titulo = 'SI';
							} else {
								$es_titulo = 'NO';
							}
							$orden = '2';

							$saveListado = $producto->saveListado($producto->getTitulo_producto(), $linea, $es_titulo, $orden);
						}
						if (!empty( $_REQUEST["linea3"])) {
							$linea = $_REQUEST["linea3"];

							if (!empty( $_REQUEST["titulo3"])) {
								$es_titulo = 'SI';
							} else {
								$es_titulo = 'NO';
							}
							$orden = '3';

							$saveListado = $producto->saveListado($producto->getTitulo_producto(), $linea, $es_titulo, $orden);
						}
						if (!empty( $_REQUEST["linea4"])) {
							$linea = $_REQUEST["linea4"];

							if (!empty( $_REQUEST["titulo4"])) {
								$es_titulo = 'SI';
							} else {
								$es_titulo = 'NO';
							}
							$orden = '4';

							$saveListado = $producto->saveListado($producto->getTitulo_producto(), $linea, $es_titulo, $orden);
						}
						if (!empty( $_REQUEST["linea5"])) {
							$linea = $_REQUEST["linea5"];

							if (!empty( $_REQUEST["titulo5"])) {
								$es_titulo = 'SI';
							} else {
								$es_titulo = 'NO';
							}
							$orden = '5';

							$saveListado = $producto->saveListado($producto->getTitulo_producto(), $linea, $es_titulo, $orden);
						}
						if (!empty( $_REQUEST["linea6"])) {
							$linea = $_REQUEST["linea6"];

							if (!empty( $_REQUEST["titulo6"])) {
								$es_titulo = 'SI';
							} else {
								$es_titulo = 'NO';
							}
							$orden = '6';

							$saveListado = $producto->saveListado($producto->getTitulo_producto(), $linea, $es_titulo, $orden);
						}
						if (!empty( $_REQUEST["linea7"])) {
							$linea = $_REQUEST["linea7"];

							if (!empty( $_REQUEST["titulo7"])) {
								$es_titulo = 'SI';
							} else {
								$es_titulo = 'NO';
							}
							$orden = '7';

							$saveListado = $producto->saveListado($producto->getTitulo_producto(), $linea, $es_titulo, $orden);
						}
						if (!empty( $_REQUEST["linea8"])) {
							$linea = $_REQUEST["linea8"];

							if (!empty( $_REQUEST["titulo8"])) {
								$es_titulo = 'SI';
							} else {
								$es_titulo = 'NO';
							}
							$orden = '8';

							$saveListado = $producto->saveListado($producto->getTitulo_producto(), $linea, $es_titulo, $orden);
						}
						if (!empty( $_REQUEST["linea9"])) {
							$linea = $_REQUEST["linea9"];

							if (!empty( $_REQUEST["titulo9"])) {
								$es_titulo = 'SI';
							} else {
								$es_titulo = 'NO';
							}
							$orden = '9';

							$saveListado = $producto->saveListado($producto->getTitulo_producto(), $linea, $es_titulo, $orden);
						}
						if (!empty( $_REQUEST["linea10"])) {
							$linea = $_REQUEST["linea10"];

							if (!empty( $_REQUEST["titulo10"])) {
								$es_titulo = 'SI';
							} else {
								$es_titulo = 'NO';
							}
							$orden = '10';

							$saveListado = $producto->saveListado($producto->getTitulo_producto(), $linea, $es_titulo, $orden);
						}

						if ($saveListado) {
							$_SESSION['error'] = 601;
							$destino = "pagina_administrador_merendalios";
						} else {
							$_SESSION['error'] = 607;
							$destino = "pagina_administrador_merendalios";
						}
					} else {
						$_SESSION['error'] = 601;
						$destino = "pagina_administrador_merendalios";
					}

				} else {
					$_SESSION['error'] = 602;
					$destino = "pagina_administrador_merendalios";
				}
			} else {
				$destino = "pagina_administrador_merendalios";
			}
		} else {
			$_SESSION['error'] = 611;
			$destino = "pagina_administrador_merendalios";
		}

		if (! headers_sent()) {
			header('Location:' . $destino);
			exit();
		}
	}

	/**
	 * Método que edita un producto
	 */
	public function editar_producto()
	{
		// Reiniciamos los errores
		$_SESSION['error'] = 0;
		$guardado = true;

		// Creamos un producto
		$producto = new Productos();

		// Actualización del producto
		if (isset($_REQUEST['updateProducto'])) {

			// Creamos un producto
			$producto = new Productos();

			// titulo_producto
			$producto->setTitulo_producto($_REQUEST["titulo_producto_buscar"]);

			// titulo_producto_nuevo
			if (!empty($_REQUEST["titulo_producto_nuevo"]))
			$producto->setTitulo_producto_nuevo($_REQUEST["titulo_producto_nuevo"]);

			// precio
			if (!empty($_REQUEST["precio"]))
			$producto->setPrecio($_REQUEST["precio"]);

			// tipo_producto
			if (!empty($_REQUEST["tipo_producto"]))
			$producto->setTipo_producto($_REQUEST["tipo_producto"]);

			// descripcion
			if (!empty($_REQUEST["descripcion"]))
			$producto->setDescripcion($_REQUEST["descripcion"]);
				
			// listado
			if (!empty( $_REQUEST["linea1"]))
			$producto->setListado("SI");
			else
			$producto->setListado("NO");

			// imagen
			$archivo = $_FILES['imagen'];

			if (isset($archivo['name']) && !empty($archivo['name'])) {

				if (empty($_REQUEST["title"]) || empty($_REQUEST["alt"])) {

					$_SESSION['error'] = 603;
					$destino = "pagina_administrador_merendalios";

				} else {

					if (isset($archivo)) {
						$producto->setImagen($archivo['name']);
					}

					// title
					if (!empty($_REQUEST["title"])) {
						$producto->setTitle($_REQUEST["title"]);
					}

					// alt
					if (!empty($_REQUEST["alt"])) {
						$producto->setAlt($_REQUEST["alt"]);
					}

					$carpetaDestino = './views/default/img/';
					$guardado = UtilsProductos::guardarImagen($carpetaDestino, $archivo);
				}
			}

			// listado
			if (!empty($_REQUEST["listado"])) {
				$producto->setListado('SI');
			} else {
				$producto->setListado('NO');
			}

			// estado
			if (!empty($_REQUEST["estado"])) {
				$producto->setEstado('BAJA');
			} else {
				$producto->setEstado('ACTV');
			}

			if ($_SESSION['error'] == 0 && $guardado) {

				// Actualizamos el producto
				$updateProducto = $producto->updateProducto();

				if ($updateProducto) {

					// Miramos si hay listado a editar

					// Líneas
					if (!empty( $_REQUEST["linea1"])) {
						$linea = $_REQUEST["linea1"];

						if (!empty( $_REQUEST["titulo1"])) {
							$es_titulo = 'SI';
						} else {
							$es_titulo = 'NO';
						}
						$orden = '0';

						$updateListado = $producto->updateListado($producto->getTitulo_producto_nuevo(), $linea, $es_titulo, $orden);
					}
					if (!empty( $_REQUEST["linea2"])) {
						$linea = $_REQUEST["linea2"];

						if (!empty( $_REQUEST["titulo2"])) {
							$es_titulo = 'SI';
						} else {
							$es_titulo = 'NO';
						}
						$orden = '1';

						$updateListado = $producto->updateListado($producto->getTitulo_producto_nuevo(), $linea, $es_titulo, $orden);
					}
					if (!empty( $_REQUEST["linea3"])) {
						$linea = $_REQUEST["linea3"];

						if (!empty( $_REQUEST["titulo3"])) {
							$es_titulo = 'SI';
						} else {
							$es_titulo = 'NO';
						}
						$orden = '2';

						$updateListado = $producto->updateListado($producto->getTitulo_producto_nuevo(), $linea, $es_titulo, $orden);
					}
					if (!empty( $_REQUEST["linea4"])) {
						$linea = $_REQUEST["linea4"];

						if (!empty( $_REQUEST["titulo4"])) {
							$es_titulo = 'SI';
						} else {
							$es_titulo = 'NO';
						}
						$orden = '3';

						$updateListado = $producto->updateListado($producto->getTitulo_producto_nuevo(), $linea, $es_titulo, $orden);
					}
					if (!empty( $_REQUEST["linea5"])) {
						$linea = $_REQUEST["linea5"];

						if (!empty( $_REQUEST["titulo5"])) {
							$es_titulo = 'SI';
						} else {
							$es_titulo = 'NO';
						}
						$orden = '4';

						$updateListado = $producto->updateListado($producto->getTitulo_producto_nuevo(), $linea, $es_titulo, $orden);
					}
					if (!empty( $_REQUEST["linea6"])) {
						$linea = $_REQUEST["linea6"];

						if (!empty( $_REQUEST["titulo6"])) {
							$es_titulo = 'SI';
						} else {
							$es_titulo = 'NO';
						}
						$orden = '5';

						$updateListado = $producto->updateListado($producto->getTitulo_producto_nuevo(), $linea, $es_titulo, $orden);
					}
					if (!empty( $_REQUEST["linea7"])) {
						$linea = $_REQUEST["linea7"];

						if (!empty( $_REQUEST["titulo7"])) {
							$es_titulo = 'SI';
						} else {
							$es_titulo = 'NO';
						}
						$orden = '6';

						$updateListado = $producto->updateListado($producto->getTitulo_producto_nuevo(), $linea, $es_titulo, $orden);
					}
					if (!empty( $_REQUEST["linea8"])) {
						$linea = $_REQUEST["linea8"];

						if (!empty( $_REQUEST["titulo8"])) {
							$es_titulo = 'SI';
						} else {
							$es_titulo = 'NO';
						}
						$orden = '7';

						$updateListado = $producto->updateListado($producto->getTitulo_producto_nuevo(), $linea, $es_titulo, $orden);
					}
					if (!empty( $_REQUEST["linea9"])) {
						$linea = $_REQUEST["linea9"];

						if (!empty( $_REQUEST["titulo9"])) {
							$es_titulo = 'SI';
						} else {
							$es_titulo = 'NO';
						}
						$orden = '8';

						$updateListado = $producto->updateListado($producto->getTitulo_producto_nuevo(), $linea, $es_titulo, $orden);
					}
					if (!empty( $_REQUEST["linea10"])) {
						$linea = $_REQUEST["linea10"];

						if (!empty( $_REQUEST["titulo10"])) {
							$es_titulo = 'SI';
						} else {
							$es_titulo = 'NO';
						}
						$orden = '9';

						$updateListado = $producto->updateListado($producto->getTitulo_producto_nuevo(), $linea, $es_titulo, $orden);
					}

					if ($updateListado) {
						$_SESSION['error'] = 601;
						$destino = "pagina_administrador_merendalios";
					} else {
						$_SESSION['error'] = 607;
						$destino = "pagina_administrador_merendalios";
					}

				} else {
					$_SESSION['error'] = 610;
					$destino = "pagina_administrador_merendalios";
				}
			} else {
				$destino = "pagina_administrador_merendalios";
			}
		} else {
			// Búsqueda del producto

			// titulo_producto
			$producto->setTitulo_producto($_REQUEST["titulo_producto_buscar"]);

			$resultados = $producto->getPorTituloProducto();

			if ($resultados == 0 || $resultados['numero'] == 0) {

				// Ponemos la variable de sesión a SI para mostrar el formulario de edición
				$_SESSION['mostrar_formulario'] = "NO";
				$_SESSION['error'] = 608;

			} else {

				// Ponemos la variable de sesión a SI para mostrar el formulario de edición
				$_SESSION['mostrar_formulario'] = "SI";
			}

			$destino = "pagina_administrador_merendalios";

			if (! headers_sent()) {
				header('Location:' . $destino);
				exit();
			}
		}

		if (! headers_sent()) {
			header('Location:' . $destino);
			exit();
		}
	}
}
