<?php
ob_start();

$contenido = ob_get_clean();

include './views/default/templates/template_politica_privacidad_y_proteccion_datos.php';
?>