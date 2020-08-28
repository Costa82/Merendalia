<?php
ob_start();

include_once './views/default/contents/content_consejos_pandemia.php';

$contenido = ob_get_clean();

include './views/default/templates/template_blog_merendalia.php';
?>