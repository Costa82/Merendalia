<?php
ob_start();

include_once './views/default/contents/content_inicio.php';

include_once './views/default/templates/template_aviso.php';

$contenido = ob_get_clean();

include './views/default/templates/template_inicio.php';
?>