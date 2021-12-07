<?php 	

	require_once("../model/admin.php");

	$location = Comivia::checkSession();

	if($location == 1){

		header("Location:../index.php");

	}

	if(isset($_GET["page"])){

		if($_GET["page"] == 1){

			unset($page);

			header("Location:../view/restaurants_view.php");

		} else {

			$page = $_GET["page"];

		}

	} else {

		$page = 1;

	}

	if((isset($GLOBALS["start"])) && (isset($GLOBALS["array"]))){

		require_once("../model/connection.php");

		$db = Connect::getConnect();

		Comivia::setConnection($db);

		$rows_number = Comivia::restaurantsPagination($page);

		if($page == 1){

			$start_from = ($page - 1) * $rows_number;

		} else {

			$start_from = Comivia::restaurantsPagination($page-1);

		}

		$total_pages = ceil(Comivia::readNumberRestaurants()/5);

		$GLOBALS["array"] = Comivia::readItems($start_from, $rows_number);

		Comivia::closeConnection();

		unset($GLOBALS["start"]);

	} else if(isset($_POST["buy-btn"])){

		require_once("../model/connection.php");

		require_once("../model/order_model.php");

		$db = Connect::getConnect();

		Comivia::setConnection($db);

		$oCode = NULL;

		$oValue = htmlentities(addslashes($_POST["value_order"]));

		$oDetails = htmlentities(addslashes($_POST["details_order"]));

		$oStatus = htmlentities(addslashes($_POST["status_order"]));	

		$oUserCode = Comivia::getCode();

		$oItemCode = htmlentities(addslashes($_POST["code_item"]));

		$order = new Order($oCode,$oValue,$oDetails,$oStatus,$oUserCode,$oItemCode);

		Comivia::createOrder($order);

		Comivia::closeConnection();

		header("Location:../view/restaurants_view.php");

	} else if(isset($_GET["log-out"])){
			
		Comivia::logout();

		header("Location:../index.php");

	}

 ?>