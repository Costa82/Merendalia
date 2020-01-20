<?php
ob_start();

$contenido = ob_get_clean();

include './views/default/templates/template_aviso_legal.php';
?>