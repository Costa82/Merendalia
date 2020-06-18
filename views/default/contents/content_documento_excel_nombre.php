<!-- Contenido del documento Excel por fecha -->

<table border="1" cellpadding="2" cellspacing="0"">
	<caption>
		<strong>USUARIOS MERENDALIA</strong>
	</caption>
	<tr>

		<th>Nombre</th>
		<th><?php echo utf8_decode('Teléfono'); ?></th>
		<th>Email</th>
		<th>Fecha registro</th>
		<th><?php echo utf8_decode('Fecha última actualización'); ?></th>
		<th><?php echo utf8_decode('Última acción'); ?></th>
		<th><?php echo utf8_decode('Difusión Whatsapp'); ?></th>

	</tr>

	<?php
	// Mostramos todos los usuarios
	$usuarios->mostrarUsuariosPorNombreEnTabla();
	?>

</table>