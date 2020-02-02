<?php
ob_start();

$productos = new Productos();

echo "<div class='explicacion productos'>

		<p>Si no tienes tiempo para preparar las cosas, puedes solicitar
			productos de nuestro cátering y ¡ser el anfitrión que quieres ser sin
			necesidad de mover un dedo!</p>

	</div>

	<div class='contenedor_productos'>";

		// SELECT PRODUCTOS
		$productos->mostrarMenuProductos();

		// PRODUCTOS		
		$productos->mostrarProductos();

	echo "</div>";

$contenido = ob_get_clean();

include './views/default/templates/template_catering.php';
?>