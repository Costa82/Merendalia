<?php
ob_start();

$productos = new Productos();

include_once './views/default/contents/content_catering.php';

$contenido = ob_get_clean();

include './views/default/templates/template_catering.php';
?>