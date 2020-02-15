<?php
ob_start();

echo "<h1>PÁGINA DEL ADMINISTRADOR</h1>";

echo '
    <div class="container formulario_productos">
		<div class="form-box">
			<div class="form-top">
				<div class="form-top-left">
					<h3>Subir Producto</h3>
					
					<div id="errores">';

					if ($params['error'] != 0) {
					    $num = $params['error'];
					    $mensaje = validacion($num);
					    echo $mensaje;
					}

echo '
                    </div>
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
						<button type="submit" name="addProducto" class="btn">Subir texto</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>';

$contenido = ob_get_clean();

include './views/default/templates/template_pagina_administrador_merendalios.php';
?>