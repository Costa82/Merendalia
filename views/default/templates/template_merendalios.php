<!--
- Formulario de inicio de sesión para el administrador.
- @author Miguel Costa.
-
-->

<?php
require_once './config/Defines.php';
require_once './config/Validations.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type"
	content="application/xhtml+xml; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Inicio de sesión</title>

<!-- CSS -->
<link href='https://fonts.googleapis.com/css?family=Pathway+Gothic+One'
	rel='stylesheet' type='text/css' />
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah"
	rel="stylesheet">

<!-- Metemos un aleatorio para el css y el jss -->
<script>
    var rutacss1 = "views/default/css/font-awesome.css?" + Math.random();
    var rutacss2 = "views/default/css/main.css?" + Math.random();
    var rutacss3 = "views/default/css/form-elements.css?" + Math.random();
    document.write('<link rel="stylesheet" href="' + rutacss1 + '" type="text/css" media="screen" />'); 
    document.write('<link rel="stylesheet" href="' + rutacss2 + '" type="text/css" media="screen" />'); 
    document.write('<link rel="stylesheet" href="' + rutacss3 + '" type="text/css" media="screen" />'); 
</script>

</head>
<body>
	
	<!-- Contenido -->
    <?php echo $contenido; ?>	
	
</body>
</html>
