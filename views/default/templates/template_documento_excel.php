<?php
$filename = "Usuarios_Merendalia.xls";

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header('Content-Transfer-Encoding: binary');
header("Content-Disposition: attachment; filename=".$filename);

echo $contenido;
?>
