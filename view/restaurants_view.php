<?php

	$start = true; 

	$array = true;

	require_once("../controller/restaurant_controller.php");

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
	<title>Página de Órdenes</title>

	<!-- Icono -->	
	<link rel="shortcut icon" type="image/x-icon" href="../others/img/favicon.ico">

	<!-- Conexión hoja de estilos CSS -->
	<link rel="stylesheet" type="text/css" href="css/restaurants_style.css">
	
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
						<a href="../controller/user_controller.php?destroy=1">
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
			<h2>¡Comienza a ordenar!</h2>

			<!-- Contenido de artículo  -->
			<p>Elige los <span>platillos</span> que más te gustan de tus <span>sitios favoritos</span> y un <span>repartidor</span> llevara lo que ordenaste a tus manos.</p>
		</section>

		<!-- Sección de restaurantes -->
		<section class="restaurants-container">
			<!-- Contenedor de acordeones de restaurantes -->
			<div class="accordions-container">
				<!-- Lista con los restaurantes -->
				<ul class="restaurants-list">

					<?php

						$continue;

						$i = 1;

						foreach ($array as $data):

							if((!isset($continue)) && (!isset($restaurant_name))){

								$continue = true;

							} else if(!($restaurant_name == $data["name_restaurant"])){

								echo "</ul></li>";

								$continue = true;

							}

							$restaurant_name = $data["name_restaurant"];

							if($continue):

					?>					

					<!-- Elemento Restaurante -->
					<li class="restaurant-object">
						<!-- Acordeón -->
						<a class ="restaurant-link" href="#">

							<!-- Contenedor de información de restaurante -->
							<div class="restaurant-content">
								<!-- Nombre de restaurante -->
								<h3><?php echo $data["name_restaurant"]; ?></h3>

								<!-- Descripción de restaurante -->
								<p><?php echo $data["description_restaurant"]; ?></p>
							</div>

							<!-- Icono items -->
							<span class="toggle-icon">Items</span>
						</a>

						<!-- Lista con los items -->
						<ul class="items-list">

						<?php 

							endif;

						?>

							<!-- Elemento Item -->
							<li class="item-object">
								<!-- Contenido del item -->
								<div class="item-content">
									<!-- Nombre de item -->
									<h3><?php echo $data["name_item"]; ?></h3>

									<!-- Detalles de item -->
									<p><?php echo $data["details_item"]; ?></p>

									<!-- Formulario item -->
									<form action="../controller/restaurant_controller.php" method="POST">
										<!-- Codigo item -->
										<input type="hidden" name="code_item" value="<?php echo $data['code_item']; ?>" readonly="readonly">

										<!-- Estado item -->
										<input type="hidden" name="status_order" value="SOLICITADO" readonly="readonly">

										<!-- Precio por unidad de item -->										
										<input type="hidden" id="price_by_unit<?php echo $i ?>" value="<?php echo $data['price_item']; ?>" readonly="readonly">

										<!-- Tabla con el precio por unidad, cantidad y botón de compra del item -->
										<table>
											<!-- Primera fila -->
											<tr>
												<td class="cell-title">
													<label for="details-item">Detalles de envío:</label>
												</td>

												<!-- Detalles de envío del item -->
												<td class="cell-details" colspan="2">
													<input type="text" name="details_order" placeholder="Ingrese aquí los detalles de envió del ítem y la ganancia">
												</td>
											</tr>

											<!-- Segunda fila -->
											<tr>
												<!-- Precio de item -->
												<td class="cell">
													<label>Precio: </label>
													
													<input class="pItem" type="text" name="value_order" id="price-item<?php echo $i ?>" value="<?php echo $data['price_item']; ?>" readonly="readonly">
												</td>

												<!-- Cantidad de items -->
												<td class="cell">
													<label>Cantidad: </label>

													<input class="more" type="button" id="more-btn<?php echo $i ?>" value="+" onclick="modifyNumberItems(<?php echo $i ?>, 'add')">

													<input class="nItems" type="text" id="number-items<?php echo $i ?>" value="1" readonly="readonly">

													<input class="less" type="button" id="less-btn<?php echo $i ?>" value="-" onclick="modifyNumberItems(<?php echo $i ?>, 'subtract')">
												</td>

												<!-- Comprar -->
												<td class="cell-buy">
													<input type="submit" name="buy-btn" value="Comprar">
												</td>
											</tr>
										</table>
									</form>
								</div>
							</li>

					<?php 

						$i++;

						$continue = false;

						endforeach;

					?>

						</ul>
					</li>
				</ul>
			</div>

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
								
								echo "<td><a class='page ". $class . "' name='page' href='restaurants_view.php?page=" . $j . "'>" . $j . "</a></td>";

								$class = "";

							}

						?>

					</tr>
				</table>
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

	<!-- Librería JQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

	<!-- Código JavaScript -->
	<script src="js/restaurant.js"></script>

	<!-- Mensaje si no es posible cargar el documento JavaScript -->
	<noscript>Sorry, your browser does not support JavaScript.</noscript>	
</body>
</html>