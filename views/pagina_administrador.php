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
						<label><span>* </span>Precio</label> <input type="number"
							name="precio" class="precio" required="required" />
					</div>
					
					<div class="form-group">
						<span>* </span><label>Tipo de producto</label>
						<select name="tipo_producto" class="tipo_producto">
							<option value="Entrantes" selected>Entrantes</option>
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
						<textarea name="descripcion" rows="5" cols="48" ></textarea>
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
						<label>Listado</label> <input type="checkbox" name="listado" value="listado">
					</div>

					<div class="botones">
						<button type="submit" name="addTexto" class="btn">Subir texto</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>';

$contenido = ob_get_clean();

include './views/default/templates/template_pagina_administrador.php';
?>