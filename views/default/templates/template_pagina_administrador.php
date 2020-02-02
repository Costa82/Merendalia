<!--
- Página del administrador.
- @author Miguel Costa.
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="es-Es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="" />
<title>Página del administrador</title>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
	rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="./views/default/css/font-awesome.css" />

<!-- Metemos un aleatorio para el css y el jss -->
<script>
    var rutacss1 = "./views/default/css/font-awesome.css?" + Math.random();
    var rutacss2 = "./views/default/css/main.css?" + Math.random();
    var rutacss3 = "./views/default/css/form-elements.css?" + Math.random();
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