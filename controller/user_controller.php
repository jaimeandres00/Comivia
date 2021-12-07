<?php

	if(isset($GLOBALS["index"])){
		
		$index = $GLOBALS["index"];

		require_once("model/admin.php");

		$location = Comivia::checkSession($index);

	} else {

		require_once("../model/admin.php");

		$location = Comivia::checkSession();

	}

	switch ($location) {
		case 0:
			header("Location:view/principal_view.php");
			break;

		case 1:
			header("Location:../index.php");
			break;
		
		default:
			$index = false;
			break;

	}

	if(isset($_COOKIE["rol"])){

		if($_COOKIE["rol"]){

			header("Location:restaurants_view.php");

		} else if(!($_COOKIE["rol"])){

			header("Location:orders_view.php");

		}

	}

	if((isset($_POST["log-btn"])) || (isset($_POST["reg-btn"]))){

		require_once("../model/admin.php");

		require_once("../model/connection.php");

		require_once("../model/user_model.php");

		if(isset($_POST["log-btn"])){

			$db = Connect::getConnect();

			Comivia::setConnection($db);

			$email = htmlentities(addslashes($_POST["log-email"]));

			$password = htmlentities(addslashes($_POST["log-password"]));

			$login = Comivia::login($email, $password);

			Comivia::closeConnection();

			if($login){

				header("Location:../view/principal_view.php");

			} else {

				header("Location:../index.php");

			}

		} else if(isset($_POST["reg-btn"])){

			$db = Connect::getConnect();

			Comivia::setConnection($db);

			$uCode = NULL;

			$uName = htmlentities(addslashes($_POST["reg-name"]));

			$uLastName = htmlentities(addslashes($_POST["reg-lastname"]));

			$uEmail = htmlentities(addslashes($_POST["reg-email"]));

			$uPassword = htmlentities(addslashes($_POST["reg-password"]));

			$uCellphoneNumber = htmlentities(addslashes($_POST["reg-telnumber"]));

			$user = new User($uCode,$uName,$uLastName,$uEmail,$uPassword,$uCellphoneNumber);

			Comivia::createUser($user);

			Comivia::closeConnection();

			header("Location:../index.php");				

		}

	} else if(isset($_GET["log-out"])){

		require_once("../model/admin.php");
		
		Comivia::logout();

		header("Location:../index.php");

	} else if(isset($_GET["rol"])){

		require_once("../model/admin.php");

		if($_GET["rol"]){

			Comivia::setRolCookie($_GET["rol"]);

			unset($_GET["rol"]);

			header("Location:../view/restaurants_view.php");

		} else if(!($_GET["rol"])){

			Comivia::setRolCookie($_GET["rol"]);

			unset($_GET["rol"]);

			header("Location:../view/orders_view.php");

		}

	} else if(isset($_GET["destroy"])){

		require_once("../model/admin.php");		

		if($_GET["destroy"]){

			Comivia::destroyRolCookie($_GET["destroy"]);

			unset($_GET["destroy"]);

			header("Location:../view/principal_view.php");

		} else if(!($_GET["destroy"])){

			Comivia::destroyRolCookie($_GET["destroy"]);

			unset($_GET["destroy"]);

			header("Location:../view/principal_view.php");

		}

	}

?>