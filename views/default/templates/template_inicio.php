<!--
- Pagina inicio Merendalia.
- @author Miguel Costa.
-->

<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="es" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description"
	content="Alquila el local para celebraciones, cumpleaños, fiestas sorpresa, reuniones con amigos y familia en el centro de Valladolid." />
<meta name="robots" content="NOODP">
<meta property="og:type" content="website" />
<meta property="og:title"
	content="Merendalia - Alquiler local para cumpleaños y celebraciones Valladolid" />
<meta property="og:description"
	content="Alquila el local para celebraciones, cumpleaños, fiestas sorpresa, reuniones con amigos y familia en el centro de Valladolid." />
<meta property="og:image"
	content="https://www.merendalia.es/views/default/img/celebraciones/Terraza_cubierta_Merendalia.jpg" />
<meta property="og:image:width" content="681" />
<meta property="og:image:height" content="494" />
<meta property="og:url" content="https://www.merendalia.es/" />
<title>Merendalia - Alquiler local para cumpleaños y celebraciones
	Valladolid</title>
<link type="text/css" rel="stylesheet"
	href="./views/default/css/font-awesome.css" />

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

<!-- Marcado JSON-LD generado por el Asistente para el marcado de datos estructurados de Google. -->
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "LocalBusiness",
  "name" : "Merendalia",
  "image" : "https://www.merendalia.es/views/default/img/merendalia_logotipo_RGB-01.png",
  "telephone" : "680.21.97.94",
  "email" : "info@merendalia.es",
  "address" : {
    "@type" : "PostalAddress",
    "streetAddress" : "Calle Paraíso 2 (Pasaje Alarcón)  47003 Valladolid"
  },
  "url" : "https://www.merendalia.es/"
}
</script>

</head>
<body>

	<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js"
	data-cbid="02242fa2-d798-4493-bc01-ef4d666afa09"
	data-blockingmode="auto" type="text/javascript"></script>
	
	<header>

		<nav>
		<?php include_once("template_menuNavIndex.php");?>
		</nav>

	</header>

	<!-- script id="CookieDeclaration"
		src="https://consent.cookiebot.com/02242fa2-d798-4493-bc01-ef4d666afa09/cd.js"
		type="text/javascript" async></script -->

	<!-- Contenido -->
	<?php echo $contenido; ?>
	
	<!-- ?php include_once("template_aviso.php");? -->

	<footer>
	<?php include_once("template_footer.php");?>
	</footer>

<!-- Start of HubSpot Embed Code -->
  <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8900094.js"></script>
<!-- End of HubSpot Embed Code -->

</body>
</html>
