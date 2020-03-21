<?php
ob_start();

$usuarios = new Usuarios();

include_once './views/default/contents/content_documento_excel_fecha.php';

$contenido = ob_get_clean();

include './views/default/templates/template_documento_excel.php';
?>