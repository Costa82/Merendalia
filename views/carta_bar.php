<?php
ob_start();

include_once './views/default/contents/content_carta_bar.php';

$contenido = ob_get_clean();

include './views/default/templates/template_carta_bar.php';
?>