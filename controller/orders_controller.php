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

		$orders_number = 10;

		$start_from = ($page - 1) * $orders_number;

		$rows_number = Comivia::readNumberOrders();

		$total_pages = ceil($rows_number/$orders_number);

		$GLOBALS["array"] = Comivia::readOrders($start_from, $orders_number);

		Comivia::closeConnection();

		unset($GLOBALS["start"]);

	} else if(isset($_POST["make-order"])){

		require_once("../model/connection.php");		

		$db = Connect::getConnect();

		Comivia::setConnection($db);		

		$order_code = htmlentities(addslashes($_POST["code_order"]));

		Comivia::updateOrder($order_code);

		Comivia::closeConnection();

		header("Location:../view/orders_view.php");

	} else if(isset($_GET["log-out"])){
			
		Comivia::logout();

		header("Location:../index.php");

	}	

?>