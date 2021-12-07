<?php

	$index = true;

	require_once("controller/user_controller.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Metadatos del sitio web COMIVIA -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="description" content="El nuevo sitio web donde podrás ser cliente y pedir tus platillos favoritos con solo un clic; o si prefieres, puedes ser repartidor y obtener ganancias">
	<meta name="keywords" content="come, envia, cliente, repartidor">

	<!-- Título de pestaña -->
	<title>COMIVIA - Come y Envía</title>

	<!--  Icono -->	
	<link rel="shortcut icon" type="image/x-icon" href="others/img/favicon.ico">
	<!-- Conexión con hoja de estilos CSS -->
	<link rel="stylesheet" type="text/css" href="view/css/log_reg_style.css">
</head>

<body>
	<!-- Encabezado -->
	<header>
		<!-- Contenedor de encabezado -->
		<div class="wrapper">

			<!-- Banner -->
			<div class="banner">
				<h1>Comivia</h1>
			</div>

			<!-- Formulario de inicio de sesión -->
			<div class="log-wrapper">
				<form action="controller/user_controller.php" id="login" method="POST">
					<!-- Sección izquierda -->
					<div class="log-left">
						<input type="email" name="log-email">
						<label for="mail">Correo Electrónico</label>												
					</div>

					<!-- Sección central -->
					<div class="log-center">	
						<input type="password" name="log-password">
						<label for="passwrd">Contraseña</label>						
					</div>

					<!-- Sección derecha -->
					<div class="log-right">
						<input type="submit" name="log-btn" value="Iniciar Sesión">
					</div>
				</form>
			</div>
		</div>
	</header>

	<!-- Sección principal -->
	<section class="main wrapper">

		<!-- Sección de información -->
		<section class="article">
			<article>
				<!-- Título de artículo -->
				<h2>COME-Y-ENVÍA</h2>

				<!-- Contenido de artículo -->
				<p>El nuevo sitio web donde podrás ser <span>cliente</span> y pedir tus platillos favoritos con solo un clic; o si prefieres, puedes ser <span>repartidor</span> y obtener ganancias. Sin intermediarios y de manera rápida donde sea que te encuentres, <span>¿Que esperas para unirte?</span></p>				
			</article>
		</section>

		<!-- Formulario de registro -->
		<aside>
			<!-- Título de formulario de registro -->
			<h3>¡Regístrate ya!</h3>
			<form action="controller/user_controller.php" method="POST" onsubmit="return validation()">

				<!-- Línea de nombre y apellido -->
				<div class="reg-wrapper reg-lane">
					<div class="same-lane"><input type="text" id="reg-name" name="reg-name" placeholder="Nombre"></div>
					<div class="same-lane"><input type="text" id="reg-lastname" name="reg-lastname" placeholder="Apellidos"></div>
				</div>

				<!-- Línea de correo electrónico -->
				<div class="reg-wrapper">
					<div class= "reg-form"><input type="email" id="reg-email" name="reg-email" placeholder="Correo electrónico"></div>
				</div>

				<!-- Línea de contraseña -->
				<div class="reg-wrapper reglane">
					<div class="reg-form"><input type="password" id="reg-password" name="reg-password" placeholder="Contraseña"></div>
				</div>

				<!-- Línea de teléfono -->
				<div class="reg-wrapper">
					<div class="reg-form"><input type="tel" id="reg-telnumber" name="reg-telnumber" placeholder="Teléfono"></div>
				</div>

				<!-- Línea aceptar terminos y condiciones -->
				<div class="reg-wrapper">
					<div class="reg-title">
						<input type="checkbox" id="reg-check" name="reg-check">
						<label for="terms-conditions">Aceptar Terminos y Condiciones.</label>
					</div>
				</div>

				<!-- Línea botón de registro -->
				<div class="reg-wrapper">
					<div class="reg-button"><input type="submit" name="reg-btn" value="Registrarte"></div>
				</div>	

				<!-- Línea de información de confidencialidad -->
				<div class="reg-wrapper">
					<div class="reg-confidentiality">
						<p>Toda la <span>información</span> proporcionada por nuestros usuarios es <span>confidencial</span> y no es empleada para fines comerciales ni manipulada por terceros.</p>
					</div>
				</div>
			</form>
		</aside>
	</section>

	<!-- Pie de página -->
	<footer>
		<!-- Contenedor principal -->
		<div class="wrapper">
			<!-- Información de autor del sitio web -->
			<p><span>Desarrollado por:</span><br>Jaime Andrés Azcarate Carmona<br>Juan Camilo Sarria Duran<br>José Alejandro Ardila Behar</p>

			<!-- Logotipo -->
			<img src="others/img/Logo_USC.png" alt="Logotipo Universidad Santiago de Cali">			
		</div>
	</footer>

	<!-- Conexión script -->
	<script type="text/javascript" src="view/js/log_reg.js"></script>

	<!-- Mensaje si no es posible cargar el documento JavaScript -->
	<noscript>Sorry, your browser does not support JavaScript.</noscript>
</body>
</html>