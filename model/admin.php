<?php

	/**
	 * Nombre de archivo: admin.php
	 *
	 * Esta clase se encarga de la gestión de los datos de Comivia
	 */
	class Comivia{

		// Atributos de clase "Comivia"
		private static $connection;

		// Metodos getters y setters
		public static function setConnection($aConnection){

			self::$connection = $aConnection;

		}

		// Metodo de cierre de conexión
		public static function closeConnection(){

			self::$connection = NULL;

		}

		// Metodos de sesiones
		public static function login($aEmail, $aPassword){

			$success = false;

			$sql = "SELECT code_user, name_user, password_user FROM USERS WHERE email_user = :email";

			try {

				$result = self::$connection->prepare($sql);

				$result->execute(array(":email"=>$aEmail));

				$found = $result->rowCount();

				if($found != 0 && $record = $result->fetch(PDO::FETCH_ASSOC)){
						
					if(password_verify($aPassword, $record["password_user"])){

						$success = true;

						$user_name =  $record["name_user"];

						$user_code = $record["code_user"];

						self::createSession($user_name, $user_code);

					} 

				} 
				
			} catch (PDOException $e) {
				
				echo $e->getMessage();

			} finally {

				$result->closeCursor();

				return $success;

			}

		}

		public static function createSession($aUserName, $aUserCode){

			session_start();

			session_regenerate_id(true);

			$_SESSION["session"] = $aUserName;

			$_SESSION["code"] = $aUserCode;

			$_SESSION["timeout"] = time();

		}

		public static function logout(){

			session_start();

			session_unset();

			session_destroy();			

		}

		public static function checkSession($aIndex = false){

			$location = 2;

			session_start();

			if(isset($_SESSION["session"])){			

				$inactivity_time = 900;

				$sessionTTL = time() - $_SESSION["timeout"];

				if($sessionTTL > $inactivity_time){

					session_unset();

					session_destroy();

					$location = 1;

				} else if($aIndex){

					$location = 0;

				} else {

					$_SESSION["timeout"] = time();

				}

			} else if(!$aIndex) {

				$location = 1;

			}

			return $location;

		}

		public static function getCode(){

			return $_SESSION["code"];

		}

		// Metodos de cookies
		public static function setRolCookie($aRol){

			$time = time();

			setcookie("rol_cookie", $aRol, time() + 604800, "/proyectos/Comivia/view/");

		}

		public static function destroyRolCookie($aRol){

			$time = time();

			setcookie("rol_cookie", $aRol, time() - 1, "/proyectos/Comivia/view/");

		}		

		// Metodos "CRUD" - Create
		public static function createUser(User $aUser){

			try {

				$password = $aUser->getPassword();

				$encrypted_password = password_hash($password, PASSWORD_DEFAULT);

				$sql = "INSERT INTO USERS (name_user, lastname_user, email_user, password_user, cellphone_user) VALUES(:name, :lastname, :email, :password, :cellphone)";

				$result = self::$connection->prepare($sql);

				$result->execute(array(":name"=>$aUser->getName(), ":lastname"=>$aUser->getLastName(), ":email"=>$aUser->getEmail(), ":password"=>$encrypted_password, ":cellphone"=>$aUser->getCellphoneNumber()));

				
			} catch (Exception $e) {
				
				echo $e->getMessage();

			} finally {

				$result->closeCursor();

			}

		}

		public static function createOrder(Order $aOrder){

			$sql = "INSERT INTO ORDERS (code_user, code_item, value_order, details_order, status_order) VALUES (:uCode, :iCode, :value, :details, :status)";

			try {

				$result = self::$connection->prepare($sql);

				$result->execute(array(":uCode"=>$aOrder->getUserCode(), ":iCode"=>$aOrder->getItemCode(), ":value"=>$aOrder->getValue(), ":details"=>$aOrder->getDetails(), ":status"=>$aOrder->getStatus()));				
				
			} catch (Exception $e) {
				
				echo $e->getMessage();

			} finally {

				$result->closeCursor();

			}

		}		

		// Metodos "CRUD" - Read 
		public static function readNumberRestaurants(){

			$sql = "SELECT name_restaurant FROM RESTAURANTS JOIN ITEMS ON RESTAURANTS.code_restaurant = ITEMS.code_restaurant ORDER BY name_restaurant";

			try {

				$result = self::$connection->prepare($sql);

				$result->execute(array());

				$number_restaurants = 0;

				while ($record = $result->fetch(PDO::FETCH_ASSOC)) {
					
					if(!(isset($restaurant_name))){

						$restaurant_name = $record["name_restaurant"];

						$number_restaurants++;

					} else if(!($restaurant_name == $record["name_restaurant"])){

						$restaurant_name = $record["name_restaurant"];

						$number_restaurants++;

					}				

				}
				
			} catch (Exception $e) {
				
				$e->getMessage();

			} finally {

				$result->closeCursor();

				return $number_restaurants;

			}			

		}

		public static function readItems($aStart, $aRowsNumber){

			$sql = "SELECT name_restaurant, description_restaurant, code_item, name_item, details_item, price_item FROM RESTAURANTS JOIN ITEMS ON RESTAURANTS.code_restaurant = ITEMS.code_restaurant ORDER BY name_restaurant LIMIT $aStart, $aRowsNumber";

			try{

				$result = self::$connection->prepare($sql);

				$result->execute(array());

				$i = 0;

				while ($record = $result->fetch(PDO::FETCH_ASSOC)) {
					
					$data["record" . strval($i)] = array("name_restaurant"=>$record["name_restaurant"], "description_restaurant"=>$record["description_restaurant"], "code_item"=>$record["code_item"], "name_item"=>$record["name_item"], "details_item"=>$record["details_item"], "price_item"=>$record["price_item"]);

					$i++;

				}

			} catch (PDOException $e){

				echo $e->getMessage();

			} finally {

				$result->closeCursor();

				return $data;

			}		

		}

		public static function readNumberOrders(){

			$sql = "SELECT code_order FROM ORDERS INNER JOIN USERS ON ORDERS.code_user = USERS.code_user INNER JOIN ITEMS ON ORDERS.code_item = ITEMS.code_item WHERE ORDERS.status_order = :status";

			try {

				$result = self::$connection->prepare($sql);

				$result->execute(array(":status"=>"SOLICITADO"));

				$orders_number = $result->rowCount();
				
			} catch (Exception $e) {

				echo $e->getMessage();
				
			} finally {

				$result->closeCursor();

				return $orders_number;

			}

		}		

		public static function readOrders($aStart, $aRowsNumber){

			$sql = "SELECT code_order, CONCAT(name_user,' ',lastname_user) AS fullname_user , name_item, ROUND(value_order/price_item) AS quantity_items, value_order, details_order FROM ORDERS INNER JOIN USERS ON ORDERS.code_user = USERS.code_user INNER JOIN ITEMS ON ORDERS.code_item = ITEMS.code_item WHERE ORDERS.status_order = :status LIMIT $aStart, $aRowsNumber";

			try {

				$result = self::$connection->prepare($sql);

				$result->execute(array(":status"=>"SOLICITADO"));

				$i = 0;

				while ($record = $result->fetch(PDO::FETCH_ASSOC)) {

					$data["record" . strval($i)] = array("code_order"=>$record["code_order"], "fullname_user"=>$record["fullname_user"], "name_item"=>$record["name_item"], "quantity_items"=>$record["quantity_items"], "value_order"=>$record["value_order"], "details_order"=>$record["details_order"]);

					$i++;

				}
				
			} catch (Exception $e) {

				echo $e->getMessage();
				
			} finally {

				$result->closeCursor();

				return $data;

			}

		}

		public static function restaurantsPagination($aPage){

			$sql = "SELECT name_restaurant FROM RESTAURANTS JOIN ITEMS ON RESTAURANTS.code_restaurant = ITEMS.code_restaurant ORDER BY name_restaurant";

			try {

				$result = self::$connection->prepare($sql);

				$result->execute(array());

				$number_items = 0;

				$stop = $aPage * 5;

				while ($record = $result->fetch(PDO::FETCH_ASSOC)) {

					if($stop > 0){

						if(!(isset($restaurant_name))) {

							$restaurant_name = $record["name_restaurant"];

							$number_items++;

						} else if ($restaurant_name != $record["name_restaurant"]){

							$restaurant_name = $record["name_restaurant"];

							$stop--;							

							if($stop != 0){ 

								$number_items++;

							}

						} else {

							$number_items++;

						}

					} else {

						break;

					}		

				}
				
			} catch (Exception $e) {
				
				$e->getMessage();

			} finally {

				$result->closeCursor();

				return $number_items;

			}

		}

		// Metodos "CRUD" - Update
		public static function updateOrder($aOrderCode){

			$sql = "UPDATE ORDERS SET status_order = :status WHERE code_order = :order_code";

			try {

				$result = self::$connection->prepare($sql);

				$result->execute(array(":status"=>"CONFIRMADA", ":order_code"=>$aOrderCode));				
				
			} catch (Exception $e) {

				echo $e->getMessage();
				
			} finally {

				$result->closeCursor();			

			}

		}

	}

?>