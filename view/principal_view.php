<?php

	require("../controller/user_controller.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Metadatos del sitio web COMIVIA -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
	<meta name ="description" content="El nuevo sitio web donde podrás ser cliente y pedir tus platillos favoritos con solo un clic; o si prefieres, puedes ser repartidor y obtener ganancias">
	<meta  name="keywords" content="come, envia, cliente, repartidor">

	<!-- Título de pestaña -->
	<title>Página Principal</title>

	<!--  Icono -->	
	<link rel="shortcut icon" type="image/x-icon" href="../others/img/favicon.ico">

	<!-- Conexión hoja de estilos CSS -->
	<link rel="stylesheet" type="text/css" href="css/principal_style.css">	
</head>
<body>
	<!-- Encabezado -->
	<header>
		<!-- Contenedor de encabezado -->
		<div class="wrapper">
			<!--Título principal -->
			<div class="banner">
				<h1>Comivia</h1>
			</div>

			<!-- Información de usuario -->
			<div class="prof-wrapper">
				<div class="prof-content">
					<!-- Contenedor de imagen de usuario -->
					<div class="prof-img">
						<img src="../others/img/user.png" alt="Foto de perfil de usuario">
					</div>

					<!-- Contenedor de nombre de usuario y cierre de sesión -->
					<div class="prof-user">
						<!-- Nombre de usuario -->
						<div class="prof-top">
							<h2><?php echo $_SESSION["session"]; ?></h2>
						</div>
						
						<!-- Cerrar sesión -->
						<div class ="prof-bottom">
							<a href="../controller/user_controller.php?log-out=true">Cerrar Sesión</a>
						</div>	
					</div>
				</div>						
			</div>
		</div>
	</header>

	<!-- Sección principal -->
	<section class="main wrapper">
		<!-- Artículo  -->
		<section class="intro">
			<!-- Título de artículo -->
			<h2>Bienvenido(a), Elige un Rol</h2>

			<!-- Contenido de artículo  -->
			<p>Selecciona el rol que prefieras y comienza a disfrutar de todo lo que tenemos para ti. <span>¡Recuerda que puedes cambiar de rol en cualquier momento!</span></p>
		</section>

		<!-- Roles -->
		<section class="roles-wrapper">
			<!-- Rol de cliente -->
			<div class="client-role">
				<!-- Botón de rol -->
				<div class="role-btn"><a href="../controller/user_controller.php?rol=1">Cliente</a></div>
				
				<!-- Información adicional de rol -->
				<div class="role-info">
					<p><span>¿Todos tus platillos favoritos a tan solo un clic de distancia?</span>, no esperes más y elige el rol de <span>cliente</span> y haz lo que más te gusta.</p>
				</div>
			</div>

			<!-- Rol de repartidor -->
			<div class="delivery-role">
				<!-- Botón de rol -->
				<div class="role-btn"><a href="../controller/user_controller.php?rol=0">Repartidor</a></div>
				
				<!-- Información adicional de rol -->				
				<div class="role-info">
					<p><span>¿Pensando en cómo hacer ganancias?</span>, elige el rol de <span>repartidor</span>, selecciona una orden y empieza a realizar pedidos.</p>
				</div>
			</div>
		</section>
	</section>

	<!-- Pie de página -->
	<footer>
		<!-- Contenedor principal -->
		<div class="wrapper">
			<!-- Información de autor del sitio web -->
			<p><span>Desarrollado por:</span><br>Jaime Andrés Azcarate Carmona<br>Juan Camilo Sarria Duran<br>José Alejandro Ardila Behar</p>

			<!-- Logotipo -->
			<img src="../others/img/Logo_USC.png" alt="Logotipo Universidad Santiago de Cali">			
		</div>
	</footer>
</body>
</html>