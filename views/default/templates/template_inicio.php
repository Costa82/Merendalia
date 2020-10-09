<!--
- Pagina inicio Merendalia.
- @author Miguel Costa.
-->

<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="es"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description"
	content="Alquila el local para celebraciones, cumpleaños, fiestas sorpresa, reuniones con amigos y familia en el centro de Valladolid." />
<meta name="robots" content="NOODP">
<title>Merendalia - Alquiler local para cumpleaños y celebraciones Valladolid</title>
<link type="text/css" rel="stylesheet" href="./views/default/css/font-awesome.css" />

<!-- Add jQuery library -->
<script type="text/javascript"
	src="https://code.jquery.com/jquery-latest.min.js"></script>

<script>
     var rutacss1 = "./views/default/css/main.css?" + Math.random();
     var rutajs2 = "./views/default/jquery/merendalia.js?" + Math.random();
     var script = "script";
     
     document.write('<link rel="stylesheet" href="' + rutacss1 + '" type="text/css" media="screen" />'); 
     document.write('<script src="' + rutajs2 + '"></' + script + '>');
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async
	src="https://www.googletagmanager.com/gtag/js?id=UA-122491095-1"></script>
<script>
  	window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-122491095-1', { 'anonymize_ip': true });
</script>

<link href='https://fonts.googleapis.com/css?family=Pathway+Gothic+One'
	rel='stylesheet' type='text/css' />
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah"
	rel="stylesheet">
<link href="apple-touch-icon.png" rel="apple-touch-icon" />
<link href="apple-touch-icon-152x152.png" rel="apple-touch-icon"
	sizes="152x152" />
<link href="apple-touch-icon-167x167.png" rel="apple-touch-icon"
	sizes="167x167" />
<link href="apple-touch-icon-180x180.png" rel="apple-touch-icon"
	sizes="180x180" />
<link href="icon-hires.png" rel="icon" sizes="192x192" />
<link href="icon-normal.png" rel="icon" sizes="128x128" />
<script src="./views/default/jquery/jquery-3.1.1.min.js"></script>
<script src="https://code.jquery.com/jquery-latest.min.js"
	type="text/javascript"></script>
<script src="./views/default/jquery/merendalia.js" type="text/javascript"></script>

</head>
<body>
	<header>

		<nav>
          <?php include_once("template_menuNavIndex.php");?>		
      	</nav>

	</header>

	<!-- Contenido -->
    <?php echo $contenido; ?>

	<footer>
        <?php include_once("template_footer.php");?>        
    </footer>

</body>
</html>