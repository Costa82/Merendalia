<?php
ob_start();

include_once './views/default/contents/content_galeria.php';

$contenido = ob_get_clean();

include './views/default/templates/template_galeria.php';
?>