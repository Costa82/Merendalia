<?php
ob_start();

include_once './views/default/contents/content_que_es_merendalia_y_por_que_elegirnos.php';

$contenido = ob_get_clean();

include './views/default/templates/template_blog_merendalia.php';
?>