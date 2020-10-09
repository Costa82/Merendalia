<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contacto</title>
<link type="text/css" rel="stylesheet" href="./views/default/css/font-awesome.css" />

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

<script src='https://www.google.com/recaptcha/api.js?render=6LcJW8QUAAAAAOBS6vnwKWyFxynJTvXWaLmuxeA-'> 
	//6Lf7WsQUAAAAAKRTJAyXE2kWlzKGx9qzpohnlDki local
	//6LcJW8QUAAAAAOBS6vnwKWyFxynJTvXWaLmuxeA- producción
</script>
<script>
	grecaptcha.ready(function() {
	grecaptcha.execute('6LcJW8QUAAAAAOBS6vnwKWyFxynJTvXWaLmuxeA-', {action: 'contacto'})
	.then(function(token) {
	var recaptchaResponse = document.getElementById('recaptchaResponse');
	recaptchaResponse.value = token;
	});});
</script>

<!-- Metemos un aleatorio para la recarga automática del css y el js -->
<script>

    var rutacss1 = "./views/default/css/main.css?" + Math.random();
    var rutajs2 = "./views/default/jquery/merendalia.js?" + Math.random();
    var script = "script";
    
    document.write('<link rel="stylesheet" href="' + rutacss1 + '" type="text/css" media="screen" />');
    document.write('<script src="' + rutajs2 + '"></' + script + '>');
	
</script>

<script>
        function validar(){
            if (document.getElementById('condiciones').checked){
            	return true;
            }
            else
            {
                alert("El formulario no puede ser enviado si no acepta el Aviso Legal y la Política de Privacidad");
                return false;
            }
        }
</script>

</head>
<body>
	<header>

		<nav>
          <?php include_once("template_menuNav.php");?>		
      	</nav>
      	
	</header>

	<!-- Contenido -->
    <?php echo $contenido; ?>

	<div class="contenedor_formulario">
    	<?php include_once("template_formulario_contacto.php");?>	
	</div>

	<footer>
        <?php include_once("template_footer.php");?>        
    </footer>

</body>
</html>