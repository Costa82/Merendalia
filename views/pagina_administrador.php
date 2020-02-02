<?php
ob_start();

echo "<h1>PÁGINA DEL ADMINISTRADOR</h1>";

echo '
    <div class="container">
		<div class="form-box">
			<div class="form-top">
				<div class="form-top-left">
					<h3>Subir texto</h3>
					<p>
						<span>*</span> Campos obligatorios.
					</p>
					<div id="errores">';

if ($params['error'] != 0) {
    $num = $params['error'];
    $mensaje = validacion($num);
    echo $mensaje;
}

echo '
                    </div>
				</div>
			</div>
			<div class="form-bottom">
				<form role="form" action="subir_texto" enctype="multipart/form-data" method="post"
					class="login-form">
					
					<div class="form-group">
						<label><span>* </span>Título</label> <input type="text"
							name="titulo" size="25" required="required" />
					</div>
					
					<div class="form-group">
						<label><span>* </span>Título en inglés</label> <input type="text"
							name="titulo_ingles" size="25" required="required" />
					</div>

					<div class="form-group">
						<p>
							<label>Tipo de texto</label>
						</p>
						<select name="tipo">
							<option value="OTRO" selected></option>
							<option value="BLOG">Blog</option>
							<option value="INFO">Información</option>
							<option value="PRES">Presentación</option>
						</select>
					</div>

					<div class="form-group">
						<label><span>* </span>Texto</label>
						<textarea name="texto" rows="10" cols="40" required="required"></textarea>
					</div>

					<div class="form-group">
						<label><span>* </span>Texto en inglés</label>
						<textarea name="texto_ingles" rows="10" cols="40"
							required="required"></textarea>
					</div>

					<div class="form-group">
						<label>Añade imagen</label> <input type="file" name="img" /><input
							type="hidden" name="lim_tamano" value="1000000" />
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