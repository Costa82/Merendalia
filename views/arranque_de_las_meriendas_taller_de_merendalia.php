<?php
ob_start();

include_once './views/default/contents/content_arranque_de_las_meriendas_taller_de_merendalia.php';

$contenido = ob_get_clean();

include './views/default/templates/template_blog_merendalia.php';
?>