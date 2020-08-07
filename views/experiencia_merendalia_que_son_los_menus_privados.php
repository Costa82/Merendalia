<?php
ob_start();

include_once './views/default/contents/content_experiencia_merendalia_que_son_los_menus_privados.php';

$contenido = ob_get_clean();

include './views/default/templates/template_blog_merendalia.php';
?>