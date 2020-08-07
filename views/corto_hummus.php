<?php
ob_start();

include_once './views/default/contents/content_corto_hummus.php';

$contenido = ob_get_clean();

include './views/default/templates/template_blog_merendalia.php';
?>