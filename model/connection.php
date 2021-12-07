<?php  
	// Parametros de conexión
	require_once("config.php");

	/**
	 * Nombre de archivo: connection.php
	 *
	 * Esta clase se encarga de los datos de un objeto "articulo" registrado en Comivia
	 */
	class Connect{
		
		// Atributos de la clase "Conexión"
		protected static $connection;

		/**
		 * Metodo de "Conexión"
		 */
		public static function getConnect(){
			
			try {

				self::$connection = new PDO("mysql:host=" . DATABASE_HOST . "; dbname=" . DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);

				self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				self::$connection->exec("SET CHARACTER SET " . DATABASE_CHARSET);
				
			} catch (Exception $e) {

				echo "Cannot connect to database server: " . $e->getMessage();

			} finally {

				return self::$connection;

			}
		}
	}
