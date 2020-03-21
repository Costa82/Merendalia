<?php
ob_start();

$tabla = new Tabla_tarifas();

include_once './views/default/contents/content_espacio.php';

$contenido = ob_get_clean();

include './views/default/templates/template_espacio.php';
?>