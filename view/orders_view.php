<?php

	$start = true; 

	$array = true;

	require_once("../controller/orders_controller.php");

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
	<title>Página de Pedidos</title>

	<!-- Icono -->	
	<link rel="shortcut icon" type="image/x-icon" href="../others/img/favicon.ico">

	<!-- Conexión hoja de estilos CSS -->
	<link rel="stylesheet" type="text/css" href="css/orders_style.css">
	
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
						<a href="../controller/user_controller.php?destroy=0">
							<img title="Cambiar de Rol" src="../others/img/user.png" alt="Foto de perfil de usuario">
						</a>	
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
			<h2>¿Listo(a) para realizar pedidos?</h2>

			<!-- Contenido de artículo  -->
			<p>Selecciona el <span>pedido</span> que quieras realizar, <span>verifica los detalles de envió y ganancia</span> ofrecida por el <span>item</span>; y comienza a disfrutar de los beneficios.</p>
		</section>

		<!-- Sección de ordenes o pedidos -->
		<section class="orders-container">
			<!-- Contenedor de la tabla -->
			<div class="table-container">
				<!-- Tabla con las ordenes -->
				<table class="orders-table">
					<!-- Primera fila -->
					<tr class="titles-row">
						<!-- Título del nombre de usuario  -->
						<td class="first-column">
							<h3>Usuario</h3>
						</td>

						<!-- Título del nombre de item -->
						<td class="second-column">
							<h3>Item</h3>
						</td>

						<!-- Título la cantidad de items -->
						<td class="third-column">
							<h3>Cant.</h3>
						</td>

						<!-- Título de valor del pedido -->
						<td class="fourth-column">
							<h3>Valor</h3>
						</td>

						<!-- Título de los detalles del pedido -->
						<td class="fifth-column">
							<h3>Detalles</h3>
						</td>

						<!-- Título del botón de aceptar/denegar  -->
						<td class="sixth-column">
							<h3>Botón</h3>
						</td>												
					</tr>

					<!-- Segunda fila -->
					<tr class="no-break-space">
						<td class="first-column">&nbsp;</td>

						<td class="second-column">&nbsp;</td>

						<td class="third-column">&nbsp;</td>

						<td class="fourth-column">&nbsp;</td>

						<td class="fifth-column">&nbsp;</td>
			
						<td class="sixth-column">&nbsp;</td>							
					</tr>

					<?php 

						$i = 1;

						$number_records = count($array);

						foreach ($array as $data):

					?>

					<form class ="order-form" action="../controller/orders_controller.php" method="POST">
						<!-- Tercera fila -->
						<tr class="<?php if($i == 1){echo 'top-row';} else if($i == $number_records){echo 'bottom-row';} else {echo 'middle-row';} ?>">
							<!-- Código de la orden -->
							<input type="hidden" name="code_order" value="<?php echo $data['code_order']; ?>" readonly="readonly">

							<!-- Nombre de usuario  -->
							<td class="first-column left-column">
								<label><?php echo $data["fullname_user"]; ?></label>
							</td>

							<!-- Nombre de item -->
							<td class="second-column middle-column">
								<label><?php echo $data["name_item"]; ?></label>
							</td>

							<!-- Cantidad de items -->
							<td class="third-column middle-column">
								<label><?php echo $data["quantity_items"]; ?></label>
							</td>

							<!-- Valor del pedido -->
							<td class="fourth-column middle-column">
								<label><?php echo $data["value_order"]; ?></label>
							</td>

							<!-- Detalles del pedido -->
							<td class="fifth-column middle-column">
								<label><?php echo $data["details_order"]; ?></label>
							</td>

							<!-- Botón de aceptar/denegar -->
							<td class="sixth-column right-column">
								<input class="pick-btn" type="submit" name="make-order" value="Seleccionar">
							</td>							
						</tr>
					</form>

					<?php 

						$i++;

						endforeach;

					?>

				</table>
			</div>
		</section>

		<!-- Paginación -->
		<div class="pagination-container">
			<!-- Tabla con paginación-->
			<table class="pagination-table">
				<tr>

					<?php 

						$class = "";

						for ($j=1; $j <= $total_pages; $j++) { 

							if($j == $page){

								$class = "actual-page";

							}
							
							echo "<td><a class='page ". $class . "' name='page' href='orders_view.php?page=" . $j . "'>" . $j . "</a></td>";

							$class = "";

						}

					?>

				</tr>
			</table>
		</div>		
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