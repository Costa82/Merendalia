<?php
ob_start();

$usuarios = new Usuarios();

echo '
<table border="1" cellpadding="2" cellspacing="0"">
    <caption><strong>USUARIOS MERENDALIA</strong></caption>
    <tr>
    
        <th>Nombre</th>
        <th>' . utf8_decode('Teléfono') . '</th>
        <th>Email</th>
        <th>Fecha registro</th>
        <th>' . utf8_decode('Fecha última actualización') . '</th>
        <th>' . utf8_decode('Última acción') . '</th>
        
    </tr>';

// Mostramos todos los usuarios
$usuarios->mostrarUsuariosPorFechaEnTabla();
   
echo '
</table>';

$contenido = ob_get_clean();

include './views/default/templates/template_documento_excel.php';
?>