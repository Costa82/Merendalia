<?php
ob_start();

$productos = new Productos();

$contenido = ob_get_clean();

include './views/default/templates/template_catering.php';
?>