<?php  
	/**
	 * Nombre de archivo: restaurant_model.php
	 *
	 * Esta clase se encarga de los datos de un objeto "restaurante" registrado en Comivia
	 */
	class Restaurant{
		// Atributos de clase "Restaurante"
		private $code;
		private $name;
		private $description;
		

		/**
		 * Constructor de "Restaurante"
		 */
		function __construct($rCode,$rName,$rDescription){
			$this->code = $rCode;
			$this->name = $rName;
			$this->description = $rDescription;
		}

		// Metodos getters y setters
		public function getCode(){
			return $this->code;
		}

		public function setCode($rCode){
			$this->code = $rCode;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($rName){
			$this->name = $rName;
		}

		public function getDescription(){
			return $this->description;
		}

		public function setDescription($rDescription){
			$this->description = $rDescription;
		}
	}
?>