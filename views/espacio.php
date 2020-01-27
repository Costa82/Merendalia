<?php
ob_start();

$tabla = new Tabla_tarifas();

$contenido = ob_get_clean();

include './views/default/templates/template_espacio.php';
?>