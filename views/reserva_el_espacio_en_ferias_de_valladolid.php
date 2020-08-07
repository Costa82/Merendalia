<?php
ob_start();

include_once './views/default/contents/content_reserva_el_espacio_en_ferias_de_valladolid.php';

$contenido = ob_get_clean();

include './views/default/templates/template_blog_merendalia.php';
?>