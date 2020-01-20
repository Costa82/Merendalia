<?php
ob_start();

$contenido = ob_get_clean();

include './views/default/templates/template_respuesta_envio.php';
?>