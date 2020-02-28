<?php
ob_start();

$productos = new Productos();

echo "<h1>PRODUCTOS</h1>
		<div id='errores'>
			<center>";

if ($params['error'] != 0) {
	$num = $params['error'];
	$mensaje = validacion($num);
	echo $mensaje;
}

echo '
		</div>
			</center>';

// Subir Productos

echo '
<div class="container_formulario_productos">
    <div class="formulario_subida_productos">
		<div class="form-box">
			<div class="form-top">
				<div class="form-top-left">
					<h3>Subir Producto</h3>
					<p>
						<span>(*)</span> <i>Campos obligatorios.</i>
					</p>
					
				</div>
			</div>
			<div class="form-bottom">
				<form role="form" action="./subir_producto" enctype="multipart/form-data" method="post"
					class="login-form">
					
					<div class="form-group">
						<label><span>* </span>Título producto</label> <input type="text"
							name="titulo_producto" class="titulo_producto" required="required" />
					</div>
					
					<div class="form-group">
						<label><span>* </span>Precio</label> <input type="number" step="any"
							name="precio" class="precio" required="required" />
					</div>
					
					<div class="form-group">
						<span>* </span><label>Tipo de producto</label>
						<select name="tipo_producto" class="tipo_producto">
							<option value="Raciones">Raciones</option>
							<option value="Canapes">Canapés</option>
							<option value="Ensaladas">Ensaladas</option>
							<option value="Postres">Postres</option>
							<option value="Merienda">Merienda infantil</option>
							<option value="Bebidas">Bebidas</option>
							<option value="Refrescos">Refrescos</option>
							<option value="Aguas">Aguas</option>
							<option value="Cervezas">Cervezas</option>
							<option value="Vinos">Vinos</option>
							<option value="Licores">Licores</option>
							<option value="Hielos">Hielos</option>
						</select>
					</div>
					
					<div class="form-group">
						<p>
						<label>Descripción</label>
						</p>
						<textarea name="descripcion" rows="5" cols="43" ></textarea>
					</div>
					
					<div class="form-group">
						<label>Añade imagen</label> <input type="file" name="imagen" /><input
							type="hidden" name="lim_tamano" value="1000000" />
					</div>
					
					<div class="form-group">
						<label>Title de la imagen</label> <input type="text"
							name="title" class="title" />
					</div>
					
					<div class="form-group">
						<label>Alt de la imagen</label> <input type="text"
							name="alt" class="alt" />
					</div>
					
					<div class="form-group">
						<label>Listado</label> <input type="checkbox" name="listado" id="check" value="listado"
						onchange="javascript:showContent()">
					</div>
					
					<div id="listado">
					
						<div class="linea">
					
							<div class="form-group">
								<label>Línea 1</label> <input type="text"
									name="linea1"/>
							</div>
							
							<div class="form-group">
								<label>Título</label> <input type="checkbox" name="titulo1" value="titulo1">
							</div>
						
						</div>
						
						<div class="linea">
						
							<div class="form-group">
								<label>Línea 2</label> <input type="text"
									name="linea2"/>
							</div>
							
							<div class="form-group">
								<label>Título</label> <input type="checkbox" name="titulo2" value="titulo2">
							</div>
						
						</div>
						
						<div class="linea">
						
							<div class="form-group">
								<label>Línea 3</label> <input type="text"
									name="linea3"/>
							</div>
							
							<div class="form-group">
								<label>Título</label> <input type="checkbox" name="titulo3" value="titulo3">
							</div>
							
						</div>
						
						<div class="linea">
						
							<div class="form-group">
								<label>Línea 4</label> <input type="text"
									name="linea4"/>
							</div>
							
							<div class="form-group">
								<label>Título</label> <input type="checkbox" name="titulo4" value="titulo4">
							</div>
							
						</div>
						
						<div class="linea">
						
							<div class="form-group">
								<label>Línea 5</label> <input type="text"
									name="linea5"/>
							</div>
							
							<div class="form-group">
								<label>Título</label> <input type="checkbox" name="titulo5" value="titulo5">
							</div>
							
						</div>
						
						<div class="linea">
						
							<div class="form-group">
								<label>Línea 6</label> <input type="text"
									name="linea6"/>
							</div>
							
							<div class="form-group">
								<label>Título</label> <input type="checkbox" name="titulo6" value="titulo6">
							</div>
							
						</div>
						
						<div class="linea">
						
							<div class="form-group">
								<label>Línea 7</label> <input type="text"
									name="linea7"/>
							</div>
							
							<div class="form-group">
								<label>Título</label> <input type="checkbox" name="titulo7" value="titulo7">
							</div>
							
						</div>
						
						<div class="linea">
						
							<div class="form-group">
								<label>Línea 8</label> <input type="text"
									name="linea8"/>
							</div>
							
							<div class="form-group">
								<label>Título</label> <input type="checkbox" name="titulo8" value="titulo8">
							</div>
							
						</div>
						
						<div class="linea">
						
							<div class="form-group">
								<label>Línea 9</label> <input type="text"
									name="linea9"/>
							</div>
							
							<div class="form-group">
								<label>Título</label> <input type="checkbox" name="titulo9" value="titulo9">
							</div>
							
						</div>
						
						<div class="linea">
						
							<div class="form-group">
								<label>Línea 10</label> <input type="text"
									name="linea10"/>
							</div>
							
							<div class="form-group">
								<label>Título</label> <input type="checkbox" name="titulo10" value="titulo10">
							</div>
							
						</div>
					
					</div>

					<div class="botones">
						<button type="submit" name="addProducto" class="btn">Subir Producto</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>';


// Editar Productos

$titulo_producto = null;
$precio = null;
$descripcion = null;
$tipo_producto = null;
$imagen = null;
$title = null;
$alt = null;

// Cargamos el producto en las variables de sesion
if (isset($_SESSION['producto'])) {

	if (isset($_SESSION['producto']['titulo_producto']))
	$titulo_producto = $_SESSION['producto']['titulo_producto'];

	if (isset($_SESSION['producto']['precio']))
	$precio = $_SESSION['producto']['precio'];

	if (isset($_SESSION['producto']['descripcion']))
	$descripcion = $_SESSION['producto']['descripcion'];

	if (isset($_SESSION['producto']['tipo_producto']))
	$tipo_producto = $_SESSION['producto']['tipo_producto'];

	if (isset($_SESSION['producto']['imagen']))
	$imagen = $_SESSION['producto']['imagen'];

	if (isset($_SESSION['producto']['title']))
	$title = $_SESSION['producto']['title'];

	if (isset($_SESSION['producto']['alt']))
	$alt = $_SESSION['producto']['alt'];
	
	if (isset($_SESSION['producto']['listado']))
	$listado = $_SESSION['producto']['listado'];
	
	if (isset($_SESSION['producto']['linea']))
	$lineas = $_SESSION['producto']['linea'];
	
}

echo '
    <div class="formulario_edicion_productos">
		<div class="form-box">
			<div class="form-top">
				<div class="form-top-left">
					<h3>Editar Producto</h3>
					
				</div>
			</div>
			
			<div class="form-bottom">
					
				<form role="form" action="./editar_producto" enctype="multipart/form-data" method="post" 
					class="login-form">
					<div class="form-group">
				<label>Nombre producto</label>
					<select name="titulo_producto_buscar" onchange="this.form.submit()" class="titulo_producto">';

if ($titulo_producto != null) {
	echo '<option value="' . $titulo_producto . '" selected>' . $titulo_producto . '</option>';
} else {
	echo '<option value="seleccionar_producto" selected>Seleccionar producto</option>';
}

$productos->mostrarProductosEnSelect();
	
echo '
					</select>
				</div>
				
					<!-- div class="botones">
						<button type="submit" name="busquedaProducto" id="busqueda" class="btn">Buscar producto</button>
					</div -->';

if (isset($_SESSION['mostrar_formulario']) && $_SESSION['mostrar_formulario'] == "SI") {

	// Reiniciamos la variable a NO para no mostrar el formulario.
	$_SESSION['mostrar_formulario'] = "NO";

	echo '
					<div id="formulario_oculto" >
					
						<div class="form-group">
							<label>Título nuevo</label> <input type="text"
								name="titulo_producto_nuevo" class="titulo_producto_nuevo" ';

	if ($titulo_producto != null) {
		echo 'value="' . $titulo_producto . '" />';
	} else {
		echo '"/>';
	}

	echo '
						</div>
						
						<div class="form-group">
							<label>Precio nuevo</label> <input type="text"
								name="precio" class="precio" ';

	if ($precio != null) {
		echo 'value="' . $precio . '" />';
	} else {
		echo '"/>';
	}

	echo '
						</div>
						
						<div class="form-group">
							<label>Tipo nuevo</label>
							<select name="tipo_producto" class="tipo_producto">';

	if ($tipo_producto != null) {
		echo '<option value="' . $tipo_producto . '" selected>' . $tipo_producto . '</option>';
	}

	echo '
								<option value="Raciones">Raciones</option>
								<option value="Canapes">Canapés</option>
								<option value="Ensaladas">Ensaladas</option>
								<option value="Postres">Postres</option>
								<option value="Merienda">Merienda infantil</option>
								<option value="Bebidas">Bebidas</option>
								<option value="Refrescos">Refrescos</option>
								<option value="Aguas">Aguas</option>
								<option value="Cervezas">Cervezas</option>
								<option value="Vinos">Vinos</option>
								<option value="Licores">Licores</option>
								<option value="Hielos">Hielos</option>
							</select>
						</div>
						
						<div class="form-group">
							<p>
							<label>Descripción nueva</label>
							</p>
							<textarea name="descripcion" rows="5" cols="43" >';

	if ($descripcion != null) {
		echo $descripcion;
	}

	echo '</textarea>
						</div>
						
						<div class="form-group">
							<label>Imagen nueva</label> <input type="file" name="imagen" /><input
								type="hidden" name="lim_tamano" value="1000000" />
						</div>
						
						<div class="form-group">
							<label>Title nuevo</label> <input type="text"
								name="title" class="title" ';

	if ($title != null) {
		echo 'value="' . $title . '" />';
	} else {
		echo '"/>';
	}

	echo '
						</div>
						
						<div class="form-group">
							<label>Alt nuevo</label> <input type="text"
								name="alt" class="alt" ';

	if ($alt != null) {
		echo 'value="' . $alt . '" />';
	} else {
		echo '"/>';
	}

	echo '
						</div>
						
						<div class="form-group">
							<label>Poner de baja</label> <input type="checkbox" name="estado" value="estado">
						</div>
						
						<div class="form-group">
							<label>Listado nuevo</label> <input type="checkbox" name="listado" id="check_edicion" value="listado"
							onchange="javascript:showContent()">
						</div>
						
						<div id="listado_edicion">';
	
	// Pintamos las líneas que existan
	if (isset($lineas)) {
		
		for ($i = 1; $i < 11; $i ++) {
			
			echo '
							<div class="linea">
								
									<div class="form-group">
										<label>Línea ' . $i . '</label> <input type="text"
											name="linea' . $i . '" value="';		
			
			if (isset($lineas) && isset($lineas[$i]))
				echo $lineas[$i];
			echo '"/>
									</div>
									
									<div class="form-group">
										<label>Título</label> <input type="checkbox" name="titulo2" value="titulo2">
									</div>
								
								</div>';
		}									
	}														
									
	echo '						
						</div>
	
						<div class="botones">
							<button type="submit" name="updateProducto" class="btn">Editar producto</button>
						</div>
					</div>';
}

$_SESSION['producto'] = null;

echo '
				</form>
			</div>
		</div>
	</div>
</div>';

// Usuarios
echo '
<div class="container_documento_excel">

<div class="documento_excel">

	<h1>USUARIOS</h1>
	
		<h3>Consulta Usuarios</h3>
	
		<form role="form" action="./documento_excel" method="post" class="login-form">
	
			<div class="botones">
				<button type="submit" name="crearDocumentoNombre" class="btn">Exportar Datos ordenados por nombre</button>
				<button type="submit" name="crearDocumentoFecha" class="btn">Exportar Datos ordenados por fecha</button>
			</div>
			
		</form>	
		
	</div>

</div>';

$contenido = ob_get_clean();

include './views/default/templates/template_pagina_administrador_merendalios.php';
?>