<?php $tabla = new Tabla_tarifas(); ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Espacio</title>
<link type="text/css" rel="stylesheet"
	href="./views/default/css/font-awesome.css" />

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

<script
	src='https://www.google.com/recaptcha/api.js?render=6LcJW8QUAAAAAOBS6vnwKWyFxynJTvXWaLmuxeA-'> 
</script>
<script>
	grecaptcha.ready(function() {
	grecaptcha.execute('6LcJW8QUAAAAAOBS6vnwKWyFxynJTvXWaLmuxeA-', {action: 'reserva'})
	.then(function(token) {
	var recaptchaResponse = document.getElementById('recaptchaResponse');
	recaptchaResponse.value = token;
	});});
</script>

<!-- Metemos un aleatorio para la recarga automática del css y el js -->
<script>

    var rutacss1 = "./views/default/css/main.css?" + Math.random();
    var rutacss2 = "./views/default/jquery/jquery_menuMoviles_desplegable.js?" + Math.random();
    var rutacss3 = "./views/default/jquery/ocultar_productos.js?" + Math.random();
    var rutacss4 = "./views/default/jquery/jquery_anclas.js?" + Math.random();
    var script = "script";
    
    document.write('<link rel="stylesheet" href="' + rutacss1 + '" type="text/css" media="screen" />');
    document.write('<script src="' + rutacss2 + '"></' + script + '>');
    document.write('<script src="' + rutacss3 + '"></' + script + '>');
    document.write('<script src="' + rutacss4 + '"></' + script + '>');
	
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

	<div class="contenedor_reservas">

		<!-- TARIFAS -->

		<div class="tarifas">

		<?php $tabla->mostrarTablaTarifas(); ?>

			<div class="explicacion_tarifas">

				<p>
					<sup>(1)</sup> Para las reservas comprendidas en los siguientes
					períodos consultar tarifas pues se consideran fechas especiales y
					pueden sufrir algún cambio:
				</p>

				</br>
				<ul>
					<li>Navidades: del 21 de diciembre al 6 de enero.</li>
					<li>Ferias de Valladolid</li>
					<li>Semana Santa</li>
					<li>Puente de la constitución</li>
				</ul>

				</br>
				<p>
					<sup>(2)</sup> La reserva del espacio deberá realizarse por un
					mínimo de 3 horas. Los sábados el mínimo será de 4 horas.
				</p>

				</br>
				<p>
					<sup>(3)</sup> A los festivos en viernes, sábado o víspera de otro
					festivo, se les aplicará la configuración de sábado.
				</p>

				</br>
				<p>
					<sup>(4)</sup> Se considerará víspera de festivo un día laborable
					(de lunes a viernes) que vaya anterior a un festivo.
				</p>

			</div>
		</div>

		<div class="texto_descriptivo">

			<p>En merendalia queremos que todas tus reservas giren en torno a la
				mesa. ¿Qué sería de nuestras reuniones sin la comida y la bebida
				como protagonistas? Podeis traeros las cosas de casa, encargarnoslo
				a nosotros o una combinación de ambas.</p>
			</br>
			<p>
				<strong>Os encargáis VOSOTROS:</strong>
			</p>
			</br>
			<p>
			
			
			<ul>
				<li>- Puedes traerlo todo hecho de casa o usar la cocina equipada
					para preparar lo que os apetezca y hacer en Merendalia, ¡una
					jornada gastronómica completa!</li>
			</ul>
			</p>
			</br>
			<p>
				<strong>Nos encargamos NOSOTROS:</strong>
			</p>
			</br>
			<p>Si no tienes tiempo ni ganas de andar preparando, esta es la mejor
				opción:</p>
			</br>
			<p>
			
			
			<ul>
				<li>- <u>Picoteo:</u> Te preparamos un picoteo, almuerzo,
					merienda... Empanadas, canapés, tortillas, ensaladas, embutidos,
					quesos, postres...</br> Visita la sección <a href='catering'>cátering</a>
					y ve algunos de nuestros productos en la <a href='galeria'>galería</a>
					de imágenes.</li>
				<li>- <u>Menús ¡Calentar y Listo!</u>: Se prepara un menú completo.
					Lo dejamos todo dispuesto para que a lo sumo tengais que servir un
					segundo plato. Entrantes, ensaladas, postres, cafés, chupitos… No
					os preocupeis por nada, ¡todo listo! Llamádnos y os informaremos de
					todo. Es la opción mas completa y original.</li>
			</ul>
			</p>
			</br>
			<p>
				<strong>VOSOTROS de unas cosas y NOSOTROS de otras:</strong>
			</p>
			</br>
			<p>
			
			
			<ul>
				<li>- Traéis unas cosas de casa o las preparais aquí y del resto nos
					encargamos nosotros. Bebidas, los aperitivos, el postre...</li>
			</ul>
			</p>

		</div>

	</div>

	<div id="formularioReserva" class="contenedor_formulario">
	<?php include_once("template_formulario_reserva.php");?>
	</div>

	<footer>
		<?php include_once("template_footer.php");?>
	</footer>

</body>
</html>
