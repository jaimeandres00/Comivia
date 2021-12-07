<?php

	/**
	 * Nombre de archivo: item_model.php
	 *
	 * Esta clase se encarga de los datos de un objeto "articulo" registrado en Comivia
	 */
	class Item{

		// Atributos de clase "Articulo"
		private $code;
		private $name;
		private $details;
		private $price;
		private $restaurant_code;

		/**
		 * Constructor de "Articulo"
		 */
		function __construct($iCode,$iName,$iDetails,$iPrice,$iRestaurantCode){
			$this->code = $iCode;
			$this->name = $iName;
			$this->details = $iDetails;
			$this->price = $iPrice;
			$this->restaurant_code = $iRestaurantCode;
		}

		// Metodos getters y setters
		public function getCode(){
			return $this->code;
		}

		public function setCode($iCode){
			$this->code = $iCode;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($iName){
			$this->name = $iName;
		}

		public function getDetails(){
			return $this->details;
		}

		public function setDetails($iDetails){
			$this->details = $iDetails;
		}

		public function getPrice(){
			return $this->price;
		}

		public function setPrice($iPrice){
			$this->price = $iPrice;
		}

		public function getRestaurantCode(){
			return $this->restaurant_code;
		}

		public function setRestaurantCode($iRestaurantCode){
			$this->restaurant_code = $iRestaurantCode;
		}												
	}
?>